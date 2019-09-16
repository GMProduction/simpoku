<?php

namespace App\Http\Controllers\Auth\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Jobs\sendVerificationEmail;
use Carbon\Carbon;
use Alert;
use Auth;

class RegisterController extends Controller
{
    //
    use RegistersUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showRegistrationForm()
    {
        return view('auth.member.register');
    }

    private function isValidGeneral(Request $r)
    {
        $messages = [];

        $rules = [
            'fullname' => 'required|max:191',
            'email' => 'required|max:191|unique:tb_member,email',
            'password' => 'required|string|min:6|confirmed',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function showDetailRegistration(Request $r)
    {
        if ($this->isValidGeneral($r)->fails()) {
            $errors = $this->isValidGeneral($r)->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        } else {
            $data = [
                'fullname' => $r->fullname,
                'email' => $r->email,
                'password' =>  Hash::make($r->password),
                'provider' => 'simpoku',
                'avatar' => 'default'
            ];
            return view('auth.member.registerDetail')->with(['data' => $data]);
        }
    }

    private function isValidDetail(Request $r)
    {
        $messages = [];

        $rules = [
            'job' => 'required',
            'institute' => 'required',
            'dateofbirth' => 'required',
            'phone' => 'required|numeric|digits_between:1,15',
            'address' => 'required',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function register(Request $r)
    {
        if ($this->isValidDetail($r)->fails()) {
            $errors = $this->isValidDetail($r)->errors();
            Alert::error('Sory, Failed to Register', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
        } else {
            if ($r->provider != 'google') {
                return $this->registerBySimpoku($r);
            } else {
                return $this->registerByGoogle($r);
            }
        }
    }

    private function registerBySimpoku(Request $r)
    {
        // return $r;
        try {
            $member = new memberModel();
            $member->email = $r->email;
            $member->gmail = NULL;
            $member->fullname = $r->fullname;
            $member->password = $r->password;
            $member->address = $r->address;
            $member->phone = $r->phone;
            $member->institute = $r->institute;
            $member->avatar = $r->avatar;
            $member->job = $r->job;
            $member->dateofbirth = $r->dateofbirth;
            $member->email_verified_at = NULL;
            $member->remember_token = str_random(60);
            $member->save();
            if ($member->save()) {
                dispatch(new SendVerificationEmail($member));
                if (Auth::guard('member')->loginUsingId($member->id)) {
                    Alert::success('Congratulation', 'Your Registration Successfull');
                    return redirect('/');
                }
            }
        } catch (\Exception  $e) {
            $exData = explode('(', $e->getMessage());
            Alert::error('Failed To Register\n' . $exData[0], 'Ooops');
            return response()->json($exData);
        }
    }

    private function registerByGoogle(Request $r)
    {
        try {
            $member = new memberModel();
            $member->email = NULL;
            $member->gmail = $r->email;
            $member->fullname = $r->fullname;
            $member->password = NULL;
            $member->address = $r->address;
            $member->phone = $r->phone;
            $member->job = $r->job;
            $member->dateofbirth = $r->dateofbirth;
            $member->institute = $r->institute;
            $member->avatar = $r->avatar;
            $member->email_verified_at = Carbon::now()->format('Y-m-d');
            $member->remember_token = str_random(60);
            $member->save();
            if ($member->save()) {
                if (Auth::guard('member')->loginUsingId($member->id)) {
                    Alert::success('Congratulation', 'Your Registration Successfull');
                    return redirect('/');
                }
            }
        } catch (\Exception  $e) {
            $exData = explode('(', $e->getMessage());
            Alert::error('Failed To Register\n' . $exData[0], 'Ooops');
            return response()->json($exData);
        }
    }



    public function verify($token)
    {
        $this->middleware('auth');
        $member = memberModel::where('remember_token', $token)->first();
        $member->email_verified_at = Carbon::now();
        if ($member->save()) {
            return redirect()->intended('/');
        }
    }

    public function resend($id)
    {
        $this->middleware('auth');
        $member = memberModel::where('id', $id)->firstOrFail();
        dispatch(new SendVerificationEmail($member));
        return redirect()->back();
    }
}
