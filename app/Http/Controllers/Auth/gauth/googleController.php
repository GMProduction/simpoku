<?php

namespace App\Http\Controllers\Auth\gauth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Alert;
use App\Master\memberModel;

class googleController extends Controller
{
    //

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        $this->middleware('guest');
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $data = [
            'fullname' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => '',
            'provider' => 'google',
            'avatar' => $user->getAvatar()
        ];
        $member = memberModel::where('gmail', $user->getEmail())->first();
        if ($member != null) {
            if (Auth::guard('member')->loginUsingId($member->id)) {
                return redirect('/');
            }
        } else {
            return view('auth.member.registerDetail')->with(['data' => $data]);
        }
    }
}
