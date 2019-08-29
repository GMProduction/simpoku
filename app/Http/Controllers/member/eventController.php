<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use Illuminate\Http\FormBuilder;
use App\Http\Controllers\Controller;
use App\Master\eventModel;
use App\Master\CarouselModel;
use App\Master\specModel;

class eventController extends Controller
{
    //
    public function index()
    {

        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city','tglMulai', 'tglAkhir', 'noContact','namaContact', 'spec', 'gambar', 'filepdf')
            ->take(8)
            ->get();

        $carousel = CarouselModel::query()
            ->select('id', 'judul', 'gambar', 'terlihat')
            ->get();

        $homeCarousell = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city','tglMulai', 'tglAkhir', 'noContact','namaContact', 'spec', 'gambar', 'filepdf')
            ->take(4)
            ->get();


        $data = [
            'event' => $event,
            'carousel' => $carousel,
            'homeCarousell' => $homeCarousell
        ];

        return view('main/home')->with($data);
    }

    public function listEventAll()
    {
        $years = [];
        for ($year = now()->year; $year >= 2010; $year--) $years[$year] = $year;

        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];


        $sp = specModel::query()
            ->select('gelar', 'spec')
            ->get();

        $data = [
            'year' => $years,
            'spec' => $sp,
            'month' => $months

        ];

        return view('main/listevent')->with($data);
        //return($years);


    }

    public function eventTahun(Request $tahun)
    {
        $event = eventModel::whereyear('tglMulai', '=', $tahun->tahun)
            ->get();

        $jum = $event->first();

        if ($jum != null) {
            $returnHtml = view('main/data/sliderTahun')->with('event', $event)->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        } else {
            $returnHtml = view('main/data/listEventKosong')->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        }
    }

    public function eventSpec(Request $req)
    {
        $event = eventModel::where('spec', '=', $req->spec)
            ->get();

        $jum = $event->first();

        if ($jum != null) {
            $returnHtml = view('main/data/sliderTahun')->with('event', $event)->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        } else {
            $returnHtml = view('main/data/listEventKosong')->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        }
    }

    public function slickEven()
    {
        $eventSlick = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city','tglMulai', 'tglAkhir', 'noContact','namaContact', 'spec', 'gambar', 'filepdf')
            ->where([
                ['DATE_FORMAT', '(', 'tgl', '"%Y"', ')', '=', '2018']
            ])
            ->get();
        return view('main/home')->with('eventSlick', $eventSlick);
    }

    public function listEvent()
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region','city', 'tglMulai', 'tglAkhir', 'noContact','namaContact', 'spec', 'gambar', 'filepdf')
            ->get();
        //return view('layouts/dataListEvent')->with('event',$event);
        $returnHtml = view('main/data/dataListEvent')->with('event', $event)->render();
        return response()->json(array('success' => true, 'html' => $returnHtml));
    }

    public function dataEvent(Request $req)
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region','city', 'tglMulai', 'tglAkhir', 'noContact','namaContact','spec', 'gambar', 'filepdf')
            ->where([
                ['id', '=', $req->id]
            ])
            ->get();

        return view('main/dataevent')->with('event', $event);
    }

    public function comboCarievent(Request $req)
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region','city', 'tglMulai', 'tglAkhir', 'noContact','namaContact', 'spec', 'gambar', 'filepdf')
            ->where([
                ['spec', 'like', '%' . $req->sp . '%']
            ])
            ->get();
        $jum = $event->first();

        if ($jum != null) {
            $returnHtml = view('main/data/dataListEvent')->with('event', $event)->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        } else {
            $returnHtml = view('main/data/listEventKosong')->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        }
    }

    public function cariEvent(Request $req)
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region','city', 'tglMulai', 'tglAkhir','noContact','namaContact','spec', 'gambar', 'filepdf')
            ->where([
                ['judul', 'like', '%' . $req->nama . '%']
            ])
            ->orwhere([
                ['deskripsi', 'like', '%' . $req->nama . '%']
            ])
            ->get();

        $jum = $event->first();


        if ($jum != null) {
            $returnHtml = view('main/data/dataListEvent')->with('eventList', $event)->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        } else {
            $returnHtml = view('main/data/listEventKosong')->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        }
    }
}
