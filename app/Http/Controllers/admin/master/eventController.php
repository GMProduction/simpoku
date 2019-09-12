<?php

namespace App\Http\Controllers\admin\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\eventModel;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

use Alert;
use App\Master\specModel;

class eventController extends Controller
{
    //
    public function index()
    {

        return view('admin.master.event.page');
    }

    public function showForm()
    {
        $spec = specModel::query()
            ->select('id', 'spec')
            ->get();

        $token = getToken();
        $provinces = getProvince($token);

        // return $cities;
        return view('admin.master.event.form')->with(['spec' => $spec, 'provinces' => $provinces]);
    }

    public function getCities(Request $r)
    {
        $token = getToken();
        return  getCities($token, $r->idpropinsi);
    }
    public function store(Request $r)
    {
        $spec = specModel::query()
            ->select('id', 'spec')
            ->get();
        $event = eventModel::where('id', '=', $r->id)->firstOrFail();
        return view('admin.master.event.update')->with(['event' => $event, 'spec' => $spec]);
    }

    public function getData()
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->orderBy('id', 'DESC')
            ->get();

        return DataTables::of($event)
            ->addIndexColumn()
            ->addColumn('action', function ($event) {
                return '<a class="btn-sm btn-warning" id="btn-edit" href="/admin/event/store?id=' . $event->id . '"><i class="fa fa-edit"></i></a>
                 <a class="btn-sm btn-danger" data-toggle="tooltip" title="Hapus Data" id="btn-delete" href="#" onclick="hapus(\'' . $event->id . '\',event)"><i class="fa fa-trash"></i></a>
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
            'judul' => 'required',
            'deskripsi' => 'required|',
            'tempat' => 'required|',
            'region' => 'required|',
            'city' => 'required|',
            'tglMulai' => 'required|',
            'tglAkhir' => 'required|',
            'spec' => 'required|',
            'namaContact' => 'required|',
            'noContact' => 'required|numeric|digits_between:1,15',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function add(Request $r)
    {
        // $event = new eventModel();
        // return implode(",", $r->spec);

        if ($this->isValid($r)->fails()) {
            $errors = $this->isValid($r)->errors();
            Alert::error('Gagal Menambahkan Data', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
        } else {

            if ($r->hasFile('gambar')) {
                $upFoto = $r->file('gambar');
                $namaFoto = $r->judul . '.' . $upFoto->getClientOriginalExtension();
                $r->gambar->move(public_path('foto'), $namaFoto);
            } else {
                $namaFoto = '';
            }
            if ($r->hasFile('filepdf')) {
                $uppdf = $r->file('filepdf');
                $namapdf = $r->judul . '.' . $uppdf->getClientOriginalExtension();
                $r->filepdf->move(public_path('pdf'), $namapdf);
            } else {
                $namapdf = '';
            }
            try {
                $event = new eventModel();
                $event->judul = $r->judul;
                $event->deskripsi = $r->deskripsi;
                $event->tempat = $r->tempat;
                $event->region = $r->region;
                $event->city = $r->city;
                $event->tglMulai = $r->tglMulai;
                $event->tglAkhir = $r->tglAkhir;
                $event->noContact = $r->noContact;
                $event->namaContact = $r->namaContact;
                $event->spec = implode(",", $r->spec);
                $event->gambar = $namaFoto;
                $event->filepdf = $namapdf;
                $event->save();
                Alert::success('Success', 'Berhasil Menambahkan Data');
                return redirect()->back();
            } catch (\Exception  $e) {
                $exData = explode('(', $e->getMessage());
                Alert::error('Gagal Merubah Data \n' . $exData[0], 'Ooops');
                return redirect()->back()->withInput();
            }
        }
    }

    public function test(Request $r)
    {
        $event = new eventModel();
        $event->judul = $r->judul;
        $event->deskripsi = $r->deskripsi;
        $event->tempat = $r->tempat;
        $event->region = $r->region;
        $event->city = $r->city;
        $event->tglMulai = $r->tglMulai;
        $event->tglAkhir = $r->tglAkhir;
        $event->noContact = $r->noContact;
        $event->namaContact = $r->namaContact;
        $event->spec = $r->input('id');
        return response()->json($event);
    }

    public function edit(Request $r)
    {
        if ($this->isValid($r)->fails()) {
            $errors = $this->isValid($r)->errors();
            Alert::error('Gagal Merubah Data', 'Ooops');
            return redirect()->back()->withErrors($errors)->withInput();
        } else {
            try {
                $id = $r->oldid;
                $data = [
                    'judul' => $r->judul,
                    'deskripsi' => $r->deskripsi,
                    'tempat' => $r->tempat,
                    'region' => $r->region,
                    'tglMulai' => $r->tglMulai,
                    'tglAkhir' => $r->tglAkhir,
                    'spec' => $r->spec,
                    'contact' => $r->contact,
                ];

                if ($r->hasFile('gambar')) {
                    $upFoto = $r->file('gambar');
                    $namaFoto = $r->judul . '.' . $upFoto->getClientOriginalExtension();
                    $r->gambar->move(public_path('foto'), $namaFoto);
                    $data = array_add($data, 'gambar', $namaFoto);
                }

                if ($r->hasFile('filepdf')) {
                    $uppdf = $r->file('filepdf');
                    $namapdf = $r->judul . '.' . $uppdf->getClientOriginalExtension();
                    $r->filepdf->move(public_path('pdf'), $namapdf);
                    $data = array_add($data, 'filepdf', $namapdf);
                }

                eventModel::query()
                    ->where('id', '=', $id)
                    ->update($data);
                Alert::success('Success', 'Berhasil Merubah Data');
                return redirect('/admin/event');
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
            eventModel::query()
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
