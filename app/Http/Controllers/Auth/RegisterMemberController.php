<?php

namespace App\Http\Controllers\Auth;

use App\Master\memberModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Jobs\sendVerificationEmail;
use Mail;
use Carbon\Carbon;

class RegisterMemberController extends Controller
{
    //

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.member.register');
    }

    private function isValid(Request $r)
    {
        $messages = [
            
        ];

        $rules = [
            'username' => 'required|max:191|unique:tb_member,username',
            'firstname' => 'required',
            'lastname' => 'required',
            'job' => 'required',
            'address' => 'required',
            'email' => 'required|max:191',
            'phone' => 'required|numeric|digits_between:1,15',
            'dateofbirth' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function register(Request $r)
    {
        if ($this->isValid($r)->fails()) {
            $errors = $this->isValid($r)->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }else{
            try {
                $member = new memberModel();
                $member->username = $r->username;
                $member->email = $r->email;
                $member->firstname = $r->firstname;
                $member->lastname = $r->lastname;
                $member->address = $r->address;
                $member->phone = $r->phone;
                $member->job = $r->job;
                $member->dateofbirth = $r->dateofbirth;
                $member->email_verified_at = NULL;
                $member->remember_token = str_random(60);
                $member->password = Hash::make($r->password);
                if ($member->save()) {
                    dispatch(new SendVerificationEmail($member)); 
                    $credentials = $r->only('email', 'password');
                    if (Auth::guard('member')->attempt($credentials)) {
                        return redirect()->intended('/');
                    }
                }
            } catch (\Exception  $e) {
                $exData = explode('(', $e->getMessage());
                return $exData;
            }
        }
        
    }

    public function verify($token)
    {
        $member = memberModel::where('remember_token', $token)->first();
        $member->email_verified_at = Carbon::now();
        if ($member->save()) {
            return redirect()->intended('/');
        }
    }
}
