<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\memberModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Alert;

class memberController extends Controller
{
    //

    public function index()
    {
        return view('admin.master.member.page');
    }

    public function showForm()
    {
        return view('admin.master.member.form');
    }

    public function store(Request $r)
    {
        $member = memberModel::where('id', '=', $r->id)->firstOrFail();
        return view('admin.master.member.update')->with(['member' => $member]);
    }

    public function getData()
    {
        $member = memberModel::query()
            ->select('id', 'email', 'gmail', 'fullname', 'password', 'address', 'phone', 'job', 'dateofbirth', 'institute', 'email_verified_at', 'remember_token')
            ->get();

        return DataTables::of($member)
            ->addIndexColumn()
            ->addColumn('action', function ($member) {
                return '
                 <a class="btn-sm btn-danger" data-toggle="tooltip" title="Hapus Data" id="btn-delete" href="#" onclick="hapus(\'' . $member->id . '\',event)"><i class="fa fa-trash"></i></a>
                 <a class="btn-sm btn-info details-control" id="btn-detail" href="#"><i class="fa fa-folder-open"></i></a>
                 ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    private function isValid(Request $r)
    {
        $messages = [];

        $rules = [
            'email' => 'required|max:191|unique:tb_member,email',
            'gmail' => 'max:191|unique:tb_member,gmail|nullable',
            'fullname' => 'required|max:191',
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'required|numeric|digits_between:1,15',
            'address' => 'required',
            'job' => 'required',
            'dateofbirth' => 'required',
            'institute' => 'required',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function add(Request $r)
    {
        if ($this->isValid($r)->fails()) {
            $errors = $this->isValid($r)->errors();
            Alert::error('Gagal Menambahkan Data', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
        } else {
            $password = NULL;
            if ($r->password != NULL) {
                $password = Hash::make($r->password);
            }
            try {
                $member = new memberModel();
                $member->email = $r->email;
                $member->gmail = $r->gmail;
                $member->fullname = $r->fullname;
                $member->password = $password;
                $member->address = $r->address;
                $member->phone = $r->phone;
                $member->job = $r->job;
                $member->dateofbirth = $r->dateofbirth;
                $member->institute = $r->institute;
                $member->email_verified_at = Carbon::now()->format('Y-m-d');
                $member->remember_token = str_random(60);
                $member->save();
                Alert::success('Success', 'Berhasil Menambahkan Data');
                return redirect()->back();
            } catch (\Exception  $e) {
                $exData = explode('(', $e->getMessage());
                Alert::error('Gagal Menambahkan Data \n' . $exData[0], 'Ooops');
                return $exData;
            }
        }
    }

    private function isValidEdit(Request $r)
    {
        $messages = [];

        $rules = [
            'email' => 'required|max:191|unique:tb_member,email,' . $r->email . ',email',
            'gmail' => 'required|max:191|unique:tb_member,gmail,' . $r->gmail . ',gmail',
            'fullname' => 'required|max:191',
            'password' => 'string|min:6|confirmed',
            'phone' => 'required|numeric|digits_between:1,15',
            'address' => 'required',
            'job' => 'required',
            'dateofbirth' => 'required',
            'institute' => 'required'
        ];

        if ($r->password != null) {
            $rules = array_add($rules, 'password', 'string|min:6|confirmed');
        }

        return Validator::make($r->all(), $rules, $messages);
    }

    public function edit(Request $r)
    {
        if ($this->isValidEdit($r)->fails()) {
            $errors = $this->isValidEdit($r)->errors();
            Alert::error('Gagal Menambahkan Data', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
        } else {
            try {
                $id = $r->oldusername;
                $data = [
                    'email' => $r->email,
                    'gmail' => $r->gmail,
                    'fullname' => $r->fullname,
                    'password' => $r->password,
                    'phone' => $r->phone,
                    'address' => $r->address,
                    'job' => $r->job,
                    'dateofbirth' => $r->dateofbirth,
                    'institute' => $r->institute,
                ];

                if ($r->password != null) {
                    $data = array_add($data, 'password', Hash::make($r->password));
                }

                memberModel::query()
                    ->where('id', '=', $id)
                    ->update($data);
                Alert::success('Success', 'Berhasil Merubah Data');
                return redirect('/admin/member');
            } catch (\Exception  $e) {
                $exData = explode('(', $e->getMessage());
                Alert::error('Gagal Merubah Data \n' . $exData[0], 'Ooops');
                return redirect()->back()->withInput();
            }
        }
    }

    public function delete(Request $r)
    {
        $id = $r->input('id');
        try {
            memberModel::query()
                ->where('id', '=', $id)
                ->delete();
            return response()->json([
                'sukses' => 'Berhasil Di hapus' . $id,
                'sqlResponse' => true,
            ]);
        } catch (\Exception  $e) {
            $exData = explode('(', $e->getMessage());
            return response()->json([
                'gagal' => 'Gagal Menghapus\n',
                'data' =>  $exData[0],
                'sqlResponse' => false,
            ]);
        }
    }
}
