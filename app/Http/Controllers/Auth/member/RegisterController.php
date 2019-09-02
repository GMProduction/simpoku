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
    { }

    public function showRegistrationForm()
    {
        $this->middleware('guest');
        return view('auth.member.register');
    }

    private function isValidGeneral(Request $r)
    {
        $this->middleware('guest');
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

        $this->middleware('guest');
        if ($this->isValidGeneral($r)->fails()) {
            $errors = $this->isValidGeneral($r)->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        } else {
            $data = [
                'fullname' => $r->fullname,
                'email' => $r->email,
                'password' =>  Hash::make($r->password),
                'provider' => 'simpoku'
            ];
            return view('auth.member.registerDetail')->with(['data' => $data]);
        }
    }

    private function isValid(Request $r)
    {
        $this->middleware('guest');
        $messages = [];

        $rules = [
            'fullname' => 'required|max:191',
            'email' => 'required|max:191',
            'password' => 'required',
            'phone' => 'required|numeric|digits_between:1,15',
            'address' => 'required',
            'job' => 'required',
            'dateofbirth' => 'required',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function register(Request $r, $provider)
    {
        $this->middleware('guest');

        if ($provider != 'google') {
            if ($this->isValid($r)->fails()) {
                $errors = $this->isValid($r)->errors();
                Alert::error('Registrasi Anda Gagal', 'Ooops');
                return redirect()->back()->withErrors($errors)->withInput();
            } else {
                try {
                    $member = new memberModel();
                    $member->email = $r->email;
                    $member->gmail = NULL;
                    $member->fullname = $r->fullname;
                    $member->password = $r->password;
                    $member->address = $r->address;
                    $member->phone = $r->phone;
                    $member->job = $r->job;
                    $member->dateofbirth = $r->dateofbirth;
                    $member->email_verified_at = NULL;
                    $member->remember_token = str_random(60);
                    $member->save();
                    if ($member->save()) {
                        dispatch(new SendVerificationEmail($member));
                        if (Auth::guard('member')->loginUsingId($member->id)) {
                            Alert::success('Selamat', 'Registrasi Anda Berhasil');
                            return redirect('/');
                        }
                    }
                } catch (\Exception  $e) {
                    $exData = explode('(', $e->getMessage());
                    Alert::error('Gagal Menambahkan Data \n' . $exData[0], 'Ooops');
                    return $exData;
                }
            }
        } else {
            if ($this->isValidGoogle($r)->fails()) {
                $errors = $this->isValidGoogle($r)->errors();
                Alert::error('Registrasi Anda Gagal', 'Ooops');
                return redirect()->back()->withErrors($errors)->withInput();
            } else {
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
                    $member->email_verified_at = Carbon::now()->format('Y-m-d');
                    $member->remember_token = str_random(60);
                    $member->save();
                    if ($member->save()) {
                        if (Auth::guard('member')->loginUsingId($member->id)) {
                            Alert::success('Selamat', 'Registrasi Anda Berhasil');
                            return redirect('/');
                        }
                    }
                } catch (\Exception  $e) {
                    $exData = explode('(', $e->getMessage());
                    Alert::error('Gagal Menambahkan Data \n' . $exData[0], 'Ooops');
                    return $exData;
                }
            }
        }
    }

    private function isValidGoogle(Request $r)
    {
        $this->middleware('guest');
        $messages = [];

        $rules = [
            'fullname' => 'required|max:191',
            'email' => 'required|max:191',
            'phone' => 'required|numeric|digits_between:1,15',
            'address' => 'required',
            'job' => 'required',
            'dateofbirth' => 'required',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function registerByGoogle(Request $r)
    {

        $this->middleware('guest');
        if ($this->isValidGoogle($r)->fails()) {
            $errors = $this->isValidGoogle($r)->errors();
            Alert::error('Registrasi Anda Gagal', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
        } else {
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
                $member->email_verified_at = Carbon::now()->format('Y-m-d');
                $member->remember_token = str_random(60);
                $member->save();
            } catch (\Exception  $e) {
                $exData = explode('(', $e->getMessage());
                Alert::error('Gagal Menambahkan Data \n' . $exData[0], 'Ooops');
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

    public function resend($id)
    {
        $member = memberModel::where('id', $id)->first();
        dispatch(new SendVerificationEmail($member));
        return redirect()->back();
    }
}
