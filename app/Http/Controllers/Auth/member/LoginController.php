<?php

namespace App\Http\Controllers\Auth\member;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Alert;
use App\Master\memberModel;

class LoginController extends Controller
{
    //

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function showLoginForm()
    {

        return view('auth.member.login');
    }

    public function redirectToGoogle()
    {
        $this->middleware('guest');
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {

        $this->middleware('guest');
        $user = Socialite::driver('google')->stateless()->user();

        $data = [
            'fullname' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => '',
            'provider' => 'google'
        ];
        $member = memberModel::where('gmail', $user->getEmail())->first();
        if ($member != null) {
            if (Auth::guard('member')->loginUsingId($member->id)) {
                Alert::success('Selamat', 'Login Berhasil');
                return redirect('/');
            }
        } else {
            return view('auth.member.registerDetail')->with(['data' => $data]);
        }

        // return $data;
    }
    function postlogin(Request $request)
    {
        $this->middleware('guest');
        if (Auth::guard('member')->attempt($request->only('email', 'password'))) {
            return redirect('/');
        } else {
            Alert::error('Periksa username atau password anda', 'Gagal');
            return redirect()->back()->withInput();
        }
    }

    function logout()
    {
        Auth::guard('member')->logout();
        return redirect('/');
    }
}
