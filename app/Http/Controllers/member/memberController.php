<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Alert;
use Image;

class memberController extends Controller
{
    //
    use RegistersUsers;

    private function isValidEdit(Request $r)
    {
        $messages = [];

        $rules = [
            'fullname' => 'required|max:191',
            'phone' => 'required|numeric|digits_between:1,15',
            'alamat' => 'required',
            'job' => 'required',
            'tgl' => 'required',
            'instansi' => 'required'
        ];

     
        return Validator::make($r->all(), $rules, $messages);
    }

    public function editMember(Request $r){
        if ($this->isValidEdit($r)->fails()) {
            $errors = $this->isValidEdit($r)->errors();
            Alert::error('Gagal Menambahkan Data', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
            //echo $errors;
        }else{
            try {
                $id = $r->id;
                $data = [
                    'fullname' => $r->fullname,
                    'job' => $r->job,
                    'institute' => $r->instansi,
                    'phone' => $r->phone,
                    'dateofbirth' => $r->tgl,
                    'address' => $r->alamat,
                ];
                memberModel::query()
                    ->where('id', '=', $id)
                    ->update($data);
                    return redirect('/member');
            } catch (\Throwable $e) {
                $exData = explode('(', $e->getMessage());
                Alert::error('Gagal Merubah Data \n' . $exData[0], 'Ooops');
                return redirect()->back()->withInput();
                //return redirect('/memberC');
            }
            
        }
        
    }

    public function editFoto(Request $r){
        if ($r->hasFile('foto')) {
            $image = $r->file('foto');
            $namaFoto = $r->id . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize16 = Image::make($image->getRealPath());
            $image_resize->resize(200, 200);
            $image_resize16->resize(20, 20);
            $image_resize->save(public_path('assets/account/' . $namaFoto));
            $image_resize16->save(public_path('assets/account/avatar/' . $namaFoto));
        } else {
            $namaFoto = '';
        }
        try {
            $id = $r->id;
            $data = [
                'avatar' => $namaFoto,
                
            ];
            memberModel::query()
                ->where('id', '=', $id)
                ->update($data);
                return redirect('/member');
        } catch (\Throwable $e) {
            $exData = explode('(', $e->getMessage());
                Alert::error('Gagal Merubah Data \n' . $exData[0], 'Ooops');
                // return redirect()->back()->withInput();
                echo 'asd';
            //throw $th;
        }
    }
}
