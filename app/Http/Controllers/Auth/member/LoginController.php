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

    public function showLoginForm()
    {

        return view('auth.member.login');
    }

    function postlogin(Request $request)
    {
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
