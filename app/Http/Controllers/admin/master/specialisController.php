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
use App\Master\specModel;

class specialisController extends Controller
{
    //

    public function index()
    {
        return view('admin.master.specialis.page');
    }

    public function showForm()
    {
        return view('admin.master.specialis.form');
    }

    public function store(Request $r)
    {
        $specialis = specModel::where('id', '=', $r->id)->firstOrFail();
        return view('admin.master.specialis.update')->with(['specialis' => $specialis]);
    }

    public function getData()
    {
        $specialis = specModel::query()
            ->select('id', 'spec')
            ->get();

        return DataTables::of($specialis)
            ->addIndexColumn()
            ->addColumn('action', function ($specialis) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="/dashboardadmin/specialist/store?id=' . $specialis->id . '"><i class="fa fa-edit"></i></a>
                 <a class="btn-sm btn-danger" data-toggle="tooltip" title="Hapus Data" id="btn-delete" href="#" onclick="hapus(\'' . $specialis->id . '\',event)"><i class="fa fa-trash"></i></a>
                 ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    private function isValid(Request $r)
    {
        $messages = [];

        $rules = [
            'spec' => 'required',
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
            try {
                $specialis = new specModel();
                $specialis->spec = $r->spec;
                $specialis->save();
                Alert::success('Success', 'Data Saved');
                return redirect()->back();
            } catch (\Exception  $e) {
                $exData = explode('(', $e->getMessage());
                Alert::error('Failed Add Data \n' . $exData[0], 'Ooops');
                return $exData;
            }
        }
    }

    private function isValidEdit(Request $r)
    {
        $messages = [];

        $rules = [
            'spec' => 'required'
        ];
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
                    'spec' => $r->spec,
                ];

                specModel::query()
                    ->where('id', '=', $id)
                    ->update($data);
                Alert::success('Success', 'Berhasil Merubah Data');
                return redirect('/dashboardadmin/specialist');
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
            specModel::query()
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
