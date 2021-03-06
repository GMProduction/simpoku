<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Alert;
use App\Master\slideModel;
use App\Master\specModel;
use Image;
use App\Master\eventModel;

class bannerController extends Controller
{
    //

    public function index()
    {
        return view('admin.master.banner.page');
    }

    public function showForm()
    {
        return view('admin.master.banner.form');
    }

    public function store(Request $r)
    {
        $banner = slideModel::where('id', '=', $r->id)->firstOrFail();
        return view('admin.master.banner.update')->with(['banner' => $banner]);
    }

    public function getData()
    {
        $banner = slideModel::query()
            ->select('id', 'judul', 'gambar', 'terlihat', 'jenis')
            ->get();

        return DataTables::of($banner)
            ->addIndexColumn()
            ->addColumn('action', function ($banner) {
                return '
                <a class="btn-sm btn-warning" data-toggle="tooltip" title="Edit Data" id="btn-edit" href="/dashboardadmin/banner/store?id='.$banner->id.'"><i class="fa fa-edit"></i></a>
                 <a class="btn-sm btn-danger" data-toggle="tooltip" title="Hapus Data" id="btn-delete" href="#" onclick="hapus(\'' . $banner->id . '\',event)"><i class="fa fa-trash"></i></a>
                 ';
            })
            ->editColumn('terlihat', function ($banner) {
                if ($banner->terlihat == 'ya') {
                    return '<a class="btn-sm btn-success" href="/dashboardadmin/banner/update?id=' . $banner->id . '"><i class="fa fa-eye"></i></a>';
                }
                return '<a class="btn-sm btn-danger" href="/dashboardadmin/banner/update?id=' . $banner->id . '"><i class="fa fa-eye-slash"></i></a>';
            })
            ->editColumn('gambar', function ($banner) {
                return '<a href="/assets/banner/' . $banner->gambar . '" target="_blank">Banner Image</a>';
            })
            ->rawColumns(['action', 'gambar', 'terlihat'])
            ->make(true);
    }

    public function getDataEvent()
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($event)
            ->addIndexColumn()
            ->addColumn('action', function ($event) {
                return '
                 <a class="btn-sm btn-success" data-toggle="tooltip" title="Hapus Data" id="btn-delete" href="#" onclick="pilih(\'' . $event->id . '\',event)">Pilih</a>
                 ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    private function isValid(Request $r)
    {
        $messages = [];

        $rules = [
            'judul' => 'required',
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
            if ($r->hasFile('gambar')) {
                $image = $r->file('gambar');
                $namaFoto = $r->judul . '.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1318, 401);
                $image_resize->save(public_path('assets/banner/' . $namaFoto));
            } else {
                $namaFoto = '';
            }
            try {
                $banner = new slideModel();
                $banner->judul = $r->judul;
                $banner->gambar = $namaFoto;
                $banner->terlihat = $r->terlihat;
                $banner->idEvent = $r->idEvent;
                $banner->url = '';
                $banner->jenis = $r->jenis;
                $banner->save();
                Alert::success('Success', 'Data Saved');
                return redirect()->back();
            } catch (\Exception  $e) {
                $exData = explode('(', $e->getMessage());
                Alert::error('Failed Add Data \n' . $exData[0], 'Ooops');
                return $exData;
            }
        }
    }

    public function update(Request $r)
    {

        if ($this->isValid($r)->fails()) {
            $errors = $this->isValid($r)->errors();
            Alert::error('Gagal Menambahkan Data', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
        }else {
        try {
            $id = $r->oldid;
            $data = [
                'judul' => $r->judul,
                'terlihat' => $r->terlihat,
                'idEvent' => $r->idEvent,
                'jenis' => $r->jenis,
            ];

            if ($r->hasFile('gambar')) {
                $image = $r->file('gambar');
                $namaFoto = $r->judul . '.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(1111, 370);
                $image_resize->save(public_path('assets/banner/' . $namaFoto));
                $data = array_add($data, 'gambar', $namaFoto);
            }

            slideModel::query()
                ->where('id', '=', $id)
                ->update($data);
            Alert::success('Success', 'Berhasil Merubah Data');
            return redirect('/dashboardadmin/banner');
        } catch (\Exception  $e) {
            $exData = explode('(', $e->getMessage());
            Alert::error('Gagal Merubah Data \n' . $exData[0], 'Ooops');
            return redirect()->back()->withInput();
        }
    }
    }

    public function edit(Request $r)
    {

        try {
            $id = $r->id;
            $banner = slideModel::where('id', '=', $r->id)->firstOrFail();
            $visibility = 'tidak';
            if ($banner['terlihat'] == 'tidak') {
                $visibility = 'ya';
            }
            $data = [
                'terlihat' => $visibility,
            ];

            slideModel::query()
                ->where('id', '=', $id)
                ->update($data);
            Alert::success('Success', 'Berhasil Merubah Data');
            return redirect('/dashboardadmin/banner');
        } catch (\Exception  $e) {
            $exData = explode('(', $e->getMessage());
            Alert::error('Gagal Merubah Data \n' . $exData[0], 'Ooops');
            return redirect()->back()->withInput();
        }
    }

    public function delete(Request $r)
    {
        $id = $r->input('id');
        try {
            slideModel::query()
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
