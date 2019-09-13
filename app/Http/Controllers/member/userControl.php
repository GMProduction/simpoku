<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class userControl extends Controller

{
    public function index()
    {
        return view('');
    }

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
            $remember_token = $getUser->remember_token;
            $getTanggalLahir = $getUser->dateofbirth;
            $getVerifikasi = $getUser->email_verified_at;
            $getId = $getUser->id;
            if (Hash::check($password, $getPassword)) {
                if ($getVerifikasi == null) {
                    return response()->json(['password' => $getPassword, 'value' => 'belum']);
                } else {
                    return response()->json(['password' => $getPassword,
                    'value' => 'sukses',
                    'id' => $getId,
                    'nama' => $getNama,
                    'address' => $getAddress,
                    'phone' => $getPhone,
                    'job' => $getJob,
                    'remember_token' => $remember_token,
                    'dateofbirth' => $getTanggalLahir,
                    'email' => $getemail]);
                }
            } else {
                return response()->json(['password' => $getPassword, 'value' => 'gagal']);
            }
        } else {
            return response()->json(['value' => "user tidak terdaftar"]);
        }
    }

    public function apiSimpanPendaftaran(Request $request)
    {

         $data2 = memberModel::where('email', $request->email)->first();

        if ($data2 != null) {
            return response()->json(['value' => "email sudah terdaftar"]);
        } else {
            try {
                $user = new memberModel;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->nama = $request->nama;
                $user->tgl_lahir = $request->tgl_lahir;
                $user->no_telp = $request->no_telp;
                $user->pekerjaan = $request->pekerjaan;
                $user->verifikasi = "sudah";
                $user->save();


                return response()->json(['value' => "success"]);
            } catch (\Exception $th) {
                return response()->json([
                    'value' => 'ada kesalahan input data, coba cek kembali data anda'

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
    
     public function cekAvailableAccountGoogle($email)
    {
        $getUser = memberModel::where('gmail', $email)->first();
        if ($getUser != null) {
            
            $getToken = $getUser->remember_token;
            $getEmail = $getUser->gmail;
            $getNama = $getUser->fullname;
             $getAddress = $getUser->address;
              $getPhone = $getUser->phone;
               $getJob = $getUser->job;
                $getDateOfBirth = $getUser->dateofbirth;
            
                    return response()->json([
                    'value' => 'success', 
                    'remember_token' => $getToken, 
                    'email' => $getEmail,
                    'nama' => $getNama,
                    'address' => $getAddress,
                    'phone' => $getPhone,
                    'job' => $getJob,
                    'dateofbirth' => $getDateOfBirth]);
                
            
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
                $user->job = $request->job;
                $user->dateofbirth = $request->dateofbirth;
                $user->email_verified_at = Carbon::now()->format('Y-m-d');
                $user->remember_token = $remember_token;
                $user->save();


                return response()->json(['value' => "success",
                    'nama' => $request->fullname,
                    'address' =>$request->address,
                    'phone' => $request->phone,
                    'job' => $request->job,
                    'remember_token' => $remember_token,
                    'dateofbirth' => $request->dateofbirth,
                    'email' => $request->gmail]);
            } catch (\Exception $th) {
                return response()->json([
                    'value' => 'ada kesalahan input data, coba cek kembali data anda'

                ]);
            }
        }
    }
}
