<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginMemberController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function logout()
    {
        Auth::guard('member')->logout();
        return redirect('/');
    }

    function postlogin(Request $request)
    {
        $login_type = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';

        $request->merge([
            $login_type => $request->input('username')
        ]);

        if (Auth::guard('member')->attempt($request->only($login_type, 'password'))) {
            return redirect('/');
        } else {
            return redirect()->back()->with('gagal', 'user id/password salah');
        }
 
    }

    public function showLoginForm()
    {
        return view('auth.member.login');
    }

}
