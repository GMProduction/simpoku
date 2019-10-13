<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Jobs\sendVerificationEmail;
use Illuminate\Support\Facades\Hash;

class userControl extends Controller

{
    public function index()
    {
        return view('');
    }

    // BY APP
    public function apiLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $getUser = memberModel::where('email', $email)->first();
        if ($getUser != null) {
            $getPassword = $getUser->password;
            $getNama = $getUser->fullname;
            $getemail = $getUser->email;
            $getAddress = $getUser->address;
            $getPhone = $getUser->phone;
            $getJob = $getUser->job;
            $remember_token = $getUser->remember_token;
            $getTanggalLahir = $getUser->dateofbirth;
            $getVerifikasi = $getUser->email_verified_at;
            $getId = $getUser->id;
            if (Hash::check($password, $getPassword)) {
                if ($getVerifikasi == null) {
                    return response()->json(['password' => $getPassword, 'value' => 'belum']);
                } else {
                    return response()->json([
                        'password' => $getPassword,
                        'value' => 'sukses',
                        'id' => $getId,
                        'fullname' => $getNama,
                        'address' => $getAddress,
                        'phone' => $getPhone,
                        'job' => $getJob,
                        'remember_token' => $remember_token,
                        'dateofbirth' => $getTanggalLahir,
                        'email' => $getemail
                    ]);
                }
            } else {
                return response()->json(['password' => $getPassword, 'value' => 'gagal']);
            }
        } else {
            return response()->json(['value' => "user tidak terdaftar"]);
        }
    }

    public function apiSimpanPendaftaran(Request $r)
    {

        $data2 = memberModel::where('email', $r->email)->first();

        if ($data2 != null) {
            return response()->json(['value' => "email has been taken by another account simpoku"]);
        } else {
            try {
                $getToken = str_random(60);
                $member = new memberModel();
                $member->email = $r->email;
                $member->gmail = NULL;
                $member->fullname = $r->fullname;
                $member->password = Hash::make($r->password);;
                $member->address = $r->address;
                $member->phone = $r->phone;
                $member->job = $r->job;
                $member->institute = $r->institute;
                $member->dateofbirth = $r->dateofbirth;
                $member->email_verified_at = NULL;
                $member->remember_token = $getToken;
                $member->save();

                if ($member->save()) {
                    return response()->json([
                        'value' => 'success',
                        'remember_token' => $getToken,
                        'email' => $r->email,
                        'fullname' => $r->fullname,
                        'address' => $r->address,
                        'phone' => $r->phone,
                        'job' => $r->job,
                        'dateofbirth' => $r->dateofbirth
                    ]);

                    dispatch(new SendVerificationEmail($member));
                }
            } catch (\Exception $th) {
                return response()->json([
                    'value' => $th
                ]);
            }
        }
    }

    public function getPasswordUser($email)
    {
        $getUser = memberModel::where('email', $email)->first();
        if ($getUser != null) {
            $getPassword = $getUser->password;

            $getemail = $getUser->email;
            $getVerifikasi = $getUser->email_verified_at;

            if ($getVerifikasi == null) {
                return response()->json(['password' => $getPassword, 'value' => 'belum']);
            } else {
                return response()->json(['password' => $getPassword, 'value' => 'sukses', 'email' => $getemail]);
            }
        } else {
            return response()->json(['value' => "user tidak terdaftar"]);
        }
    }

    // BY GOOGLE

    public function cekAvailableAccount($email)
    {
        $getUserG = memberModel::where('gmail', $email)->first();
        $getUser = memberModel::where('email', $email)->first();
        if ($getUserG != null) {

            $getToken = $getUserG->remember_token;
            $getEmail = $getUserG->gmail;
            $getId = $getUserG->id;
            $getNama = $getUserG->fullname;
            $getAddress = $getUserG->address;
            $getPhone = $getUserG->phone;
            $getJob = $getUserG->job;
            $getDateOfBirth = $getUserG->dateofbirth;

            return response()->json([
                'value' => 'success',
                'remember_token' => $getToken,
                'email' => $getEmail,
                'fullname' => $getNama,
                'address' => $getAddress,
                'phone' => $getPhone,
                'job' => $getJob,
                'dateofbirth' => $getDateOfBirth,
                'id' => $getId
            ]);
        } else if ($getUser != null) {

            $getToken = $getUser->remember_token;
            $getEmail = $getUser->email;
            $getNama = $getUser->fullname;
            $getAddress = $getUser->address;
            $getPhone = $getUser->phone;
            $getId = $getUser->id;
            $getJob = $getUser->job;
            $getDateOfBirth = $getUser->dateofbirth;

            return response()->json([
                'value' => 'success',
                'remember_token' => $getToken,
                'email' => $getEmail,
                'fullname' => $getNama,
                'address' => $getAddress,
                'phone' => $getPhone,
                'job' => $getJob,
                'id' => $getId,
                'dateofbirth' => $getDateOfBirth
            ]);
        } else {
            return response()->json(['value' => "no account found"]);
        }
    }

    public function apiSimpanAkunGoogle(Request $request)
    {

        $data2 = memberModel::where('gmail', $request->gmail)->first();

        if ($data2 != null) {
            return response()->json(['value' => "terdaftar"]);
        } else {

            $remember_token = str_random(60);
            try {
                $user = new memberModel;
                $user->gmail = $request->gmail;
                $user->fullname = $request->fullname;
                $user->address = $request->address;
                $user->phone = $request->phone;
                $user->institute = $request->institute;
                $user->job = $request->job;
                $user->dateofbirth = $request->dateofbirth;
                $user->email_verified_at = Carbon::now()->format('Y-m-d');
                $user->remember_token = $remember_token;
                $user->save();

                if ($user->save()) {
                    dispatch(new SendVerificationEmail($user));

                    return response()->json([
                        'value' => "success",
                        'fullname' => $request->fullname,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'job' => $request->job,
                        'institute' => $request->institute,
                        'remember_token' => $remember_token,
                        'dateofbirth' => $request->dateofbirth,
                        'email' => $request->gmail
                    ]);
                }
            } catch (\Exception $th) {
                return response()->json([
                    'value' => 'ada kesalahan input data, coba cek kembali data anda ' . $th

                ]);
            }
        }
    }
}
