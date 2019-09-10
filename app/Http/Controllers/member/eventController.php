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
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->take(8)
            ->get();

        $carousel = CarouselModel::query()
            ->select('id', 'judul', 'gambar', 'terlihat')
            ->get();

        $homeCarousell = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
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
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->where([
                ['DATE_FORMAT', '(', 'tgl', '"%Y"', ')', '=', '2018']
            ])
            ->get();
        return view('main/home')->with('eventSlick', $eventSlick);
    }

    public function listEvent()
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->get();
        //return view('layouts/dataListEvent')->with('event',$event);
        $returnHtml = view('main/data/dataListEvent')->with('event', $event)->render();
        return response()->json(array('success' => true, 'html' => $returnHtml));
    }

    public function dataEvent(Request $req)
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->where([
                ['id', '=', $req->id]
            ])
            ->get();

        return view('main/dataevent')->with('event', $event);
    }

    public function comboCarievent(Request $req)
    {
        $event = eventModel::whereYear('tglMulai', 'like','%' . $req->year . '%')
            ->where([               
                ['city', 'like', '%' . $req->city . '%'],
                ['region', 'like', '%' . $req->region . '%']                    
            ])
            ->where(function($as) use ($req) {
                $as->where('spec', 'like', '%' . $req->spec . '%')
                   ->orwhere('deskripsi', 'like', '%' . $req->spec . '%')
                   ->orwhere('judul', 'like', '%' . $req->spec . '%')
                   ->orwhereMonth('tglMulai', 'like', '%' . $req->spec . '%')
                   ->orwhereYear('tglMulai', 'like','%' . $req->spec . '%')
                   ->orwhere('city', 'like', '%' . $req->spec . '%')
                   ->orwhere('region', 'like', '%' . $req->spec . '%');
            })
            ->where(function ($mo) use ($req){
                if($req->month == ""){
                    $mo->whereMonth('tglMulai', 'like','%' . $req->month . '%');
                }else{
                    $mo->whereMonth('tglMulai', '=',  $req->month );
                }
            })
           
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

    public function cariEvent(Request $req)
    {
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
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

    public function load_data(Request $request)
    {
        if ($request->ajax()) {
            if ($request->id > 0) {
                $data = eventModel::query()
                    ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
                    ->where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(2)
                    ->get();
            } else {
                $data = eventModel::query()
                    ->orderBy('id', 'DESC')
                    ->limit(2)
                    ->get();
            }
            $output = '';
            $last_id = '';
            if (!$data->isEmpty()) {
                foreach ($data as $even) {
                    $output .= '
                     <a href="/dataevent?id=' . $even->id . '" class="media p-2 border-B listHover">
                     <div class="media">
                         <div class="last-media-img ml-1 mt-1 mr-2"
                             style="background-image: url(\'assets/foto/' . $even->gambar . '\')">
                             asdasd
                         </div>
                         <div class="media-body pt-1">
                             <div class="time-cat pb-1 pl-0">
                                 <span class="badge">' . $even->region . '</span>
                                 <small class="text-time">' . date("d M", strtotime($even->tglMulai)) . ' s/d
                                     ' . date("d M Y", strtotime($even->tglAkhir)) . '</small>
                             </div>
                             <p class="mb-0 text-burgundy" id="title-lm">' . $even->judul . ' </p>
                             <p class="d-none d-lg-block ">' . $even->deskripsi . '</p>
                             <p class="d-none d-lg-block ">Specialist : ' . $even->spec . '</p>
                         </div>
                     </div>
                 </a>
                     ';
                    $last_id = $even->id;
                }
                $output .= '
                <div id="load_more">
                    <button type="button" nama="load_more_button" id="load_more_button" class="btn btn-info form-control" data-id="' . $last_id . '">Load More</button>
                </div>
            ';
            } else {
                $output .= '
                    <div id="load_more">
                        <button type="button" nama="load_more_button" class="btn btn-info form-control">No Data Found</button>
                    </div>
                ';
            }
            echo $output;
        }
    }
}
