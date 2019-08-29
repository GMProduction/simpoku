<?php

namespace App\Http\Controllers;

use App\Master\eventModel;
use App\Master\slideModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'tglMulai', 'tglAkhir', 'contact', 'spec', 'gambar', 'filepdf')
            ->take(8)
            ->get();

        $slide = slideModel::query()
            ->select('id', 'judul', 'gambar', 'terlihat')
            ->get();

        $homeCarousell = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'tglMulai', 'tglAkhir', 'contact', 'spec', 'gambar', 'filepdf')
            ->take(4)
            ->get();


        $data = [
            'event' => $event,
            'slide' => $slide,
            'homeCarousell' => $homeCarousell
        ];

        return view('main.home')->with($data);
    }
}
