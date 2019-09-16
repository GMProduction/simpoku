<?php

namespace App\Http\Controllers\Auth\Member;

use App\Http\Controllers\Controller;
use App\Master\memberModel;
use App\Jobs\sendVerificationEmail;
use Carbon\Carbon;

class VerificationController extends Controller
{

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
        $member = memberModel::where('id', $id)->firstOrFail();
        dispatch(new SendVerificationEmail($member));
        return redirect()->back();
    }
}
