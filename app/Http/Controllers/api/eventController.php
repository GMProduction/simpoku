<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Master\eventModel;
use App\Master\slideModel;
use App\Master\favoriteModel;
use App\Master\specModel;
use Carbon\Carbon;

class eventController extends Controller
{

    public function dataEvent()
    {
        $data = eventModel::orderBy('tglMulai', 'desc')->paginate(20);
        if (count($data) > 0) {
            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data baliho',
                'event' => $data
            ]);
        } else {
            return response()->json([
                'respon' => 'success',
                'message' => 'Data tidak di temukan'
            ]);
        }
    }

    public  function apiEventIncoming()
    {
        $current = Carbon::now();
        $data = eventModel::where('tglMulai', '>', $current)->orderBy('tglMulai', 'asc')->get();


        if (count($data) > 0) {
            $res['message'] = "success";
            $res['value'] = "1";
            $res['resultEvent'] = $data;
            return response($res);
        } else {
            $res['message'] = "empty";
            return response($res);
        }
    }


    public  function apiDetailEvent($id)
    {

        $data = eventModel::where('id', $id)->first();

        if ($data != null) {
            $res['value'] = "success";
            $res['id'] = $data->id;
            $res['judul'] = $data->judul;
            $res['deskripsi'] = $data->deskripsi;
            $res['region'] = $data->region;
            $res['tglMulai'] = $data->tglMulai;
            $res['tglAkhir'] = $data->tglAkhir;
            $res['tempat'] = $data->tempat;
            $res['spec'] = $data->spec;
            $res['noContact'] = $data->noContact;
            $res['namaContact'] = $data->namaContact;
            $res['gambar'] = $data->gambar;
            $res['filepdf'] = $data->filepdf;
            return response($res);
        } else {
            $res['value'] = "empty";
            return response($res);
        }
    }

    public  function searchDataEvent($id)
    {
        $data = eventModel::where('judul', 'LIKE', "%" . $id . "%")
            ->orwhere('deskripsi', 'LIKE', "%" . $id . "%")
            ->orwhere('tempat', 'LIKE', "%" . $id . "%")
            ->orwhere('region', 'LIKE', "%" . $id . "%")
            ->orwhere('tglMulai', 'LIKE', "%" . $id . "%")
            ->orwhere('spec', 'LIKE', "%" . $id . "%")
            ->orderBy('tglMulai', 'desc')->get();
        if (count($data) > 0) {
            $res['message'] = "success";
            $res['value'] = "1";
            $res['resultEvent'] = $data;
            return response($res);
        } else {
            $res['message'] = "empty";
            return response($res);
        }
    }

    public  function apiDataSlider()
    {
        $data = slideModel::where('terlihat', '=', 'ya')->orderBy('gambar', 'asc')->get();


        if (count($data) > 0) {
            $res['message'] = "success";
            $res['value'] = "1";
            $res['resultSlider'] = $data;
            return response($res);
        } else {
            $res['message'] = "empty";
            return response($res);
        }
    }

    public  function apiInsertFavorit(Request $r)
    {
        try {

            $data = new favoriteModel();
            $data->idUser = $r->idUser;
            $data->idEvent = $r->idEvent;
            $data->save();

            return response()->json(['value' => "success"]);
        } catch (\Exception $th) {
            return response()->json([
                'value' =>  $th
            ]);
        }
    }

    public  function apiDeleteFavorit(Request $r)
    {
        try {

            $data = favoriteModel::where('idUser', $r->idUser)
                ->where('idEvent', $r->idEvent)->delete();

            return response()->json(['value' => "success"]);
        } catch (\Exception $th) {
            return response()->json([
                'value' => $th

            ]);
        }
    }

    public  function apiCekFavorite($idUser, $idEvent)
    {

        $data = favoriteModel::where('idUser', $idUser)
            ->where('idEvent', $idEvent)->first();

        if ($data != null) {
            return response()->json(['value' => "ada"]);
        } else {
            return response()->json(['value' => "kosong"]);
        }
    }

    public function apiTampilFavorite($idUser)
    {
        $data = favoriteModel::join('tb_event', 'tb_favorite.idEvent', 'tb_event.id')
            ->where('idUser', $idUser)->get();

        if (count($data) > 0) {
            $res['message'] = "success";
            $res['value'] = "1";
            $res['resultEvent'] = $data;
            return response($res);
        } else {
            $res['message'] = "empty";
            return response($res);
        }
    }

    public  function apiEventMonth($month)
    {
        $data = eventModel::whereMonth('tglMulai', '=', $month)
            ->orderBy('tglMulai', 'asc')->get();
        if (count($data) > 0) {
            $res['message'] = "success";
            $res['value'] = "1";
            $res['resultEvent'] = $data;
            return response($res);
        } else {
            $res['message'] = "empty";
            return response($res);
        }
    }

     public function apiTampilSpec()
    {
        $data = specModel::all();

        if (count($data) > 0) {
            $res['message'] = "success";
            $res['value'] = "1";
            $res['resultSpec'] = $data;
            return response($res);
        } else {
            $res['message'] = "empty";
            return response($res);
        }
    }

     public  function apiEventSpec($spec)
    {
        $data = eventModel::where('spec', 'LIKE', '%' .$spec. '%')
            ->orderBy('tglMulai', 'asc')->get();
        if (count($data) > 0) {
            $res['message'] = "success";
            $res['value'] = "1";
            $res['resultEvent'] = $data;
            return response($res);
        } else {
            $res['message'] = "empty";
            return response($res);
        }
    }
}
