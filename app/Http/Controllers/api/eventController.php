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
        try {
            $data = eventModel::orderBy('tglMulai', 'desc')->paginate(20);
            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data event',
                'event' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' => 'failure',
                'message' => 'terjadi kesalahan ' . $e
            ], 500);
        }
    }

    public  function eventIncoming()
    {
        try {
            $current = Carbon::now();
            $data = eventModel::where('tglMulai', '>', $current)->orderBy('tglMulai', 'asc')->paginate(20);
            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data event',
                'event' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' => 'failure',
                'message' => 'terjadi kesalahan ' . $e
            ], 500);
        }
    }


    public  function detailEvent($id)
    {
        try {
            $data = eventModel::where('id', $id)->first();
            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data event',
                'event' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' => 'failure',
                'message' => 'terjadi kesalahan ' . $e
            ], 500);
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

    public  function dataSlider()
    {
        try {
            $data = slideModel::where('terlihat', '=', 'ya')->orderBy('gambar', 'asc')->get();
            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data slider',
                'slider' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' => 'failure',
                'message' => 'terjadi kesalahan ' . $e
            ], 500);
        }
    }

    public  function insertFavorit(Request $r)
    {
        //PR AUTH DISINI
        try {
            $data = new favoriteModel();
            $data->idUser = $r->idUser;
            $data->idEvent = $r->idEvent;
            $data->save();
            return response()->json([
                'respon' => "success",
                'message' => 'berhasil set ke favorit'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' =>  'failure',
                'message' => 'terjadi kesalahan ' . $e
            ]);
        }
    }

    public  function deleteFavorit(Request $r)
    {
        //PR AUTH DISINI
        try {
            favoriteModel::where('idUser', $r->idUser)
                ->where('idEvent', $r->idEvent)->delete();

            return response()->json([
                'respon' => "success",
                'message' => 'berhasil set ke favorit'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' =>  'failure',
                'message' => 'terjadi kesalahan ' . $e
            ]);
        }
    }

    public function cekFavorite($idUser, $idEvent)
    {
        try {
            $data = favoriteModel::where('idUser', $idUser)
                ->where('idEvent', $idEvent)->first();
            if ($data != null) {
                return response()->json([
                    'respon' =>  'success',
                    'value' => "ada"
                ]);
            } else {
                return response()->json([
                    'respon' =>  'success',
                    'value' => "kosong"
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'respon' =>  'failure',
                'message' => 'terjadi kesalahan ' . $e
            ]);
        }
    }

    public function tampilFavorite($idUser)
    {
        try {
            $data = favoriteModel::join('tb_event', 'tb_favorite.idEvent', 'tb_event.id')
                ->where('idUser', $idUser)->get();

            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data favorite',
                'event' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' =>  'failure',
                'message' => 'terjadi kesalahan ' . $e
            ]);
        }
    }

    public  function eventMonth($month)
    {
        try {
            $data = eventModel::whereMonth('tglMulai', '=', $month)
                ->orderBy('tglMulai', 'asc')->get();

            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data event',
                'event' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' =>  'failure',
                'message' => 'terjadi kesalahan ' . $e
            ]);
        }
    }

    public function tampilSpec()
    {
        try {
            $data = specModel::all();

            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data specialist',
                'specialist' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' =>  'failure',
                'message' => 'terjadi kesalahan ' . $e
            ]);
        }
    }

    public  function eventSpec($spec)
    {
        try {
            $data = eventModel::where('spec', 'LIKE', '%' . $spec . '%')
                ->orderBy('tglMulai', 'asc')->get();

            return response()->json([
                'respon' => 'success',
                'message' => 'success fetch data event',
                'event' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'respon' =>  'failure',
                'message' => 'terjadi kesalahan ' . $e
            ]);
        }
    }
}
