<?php

namespace App\Http\Controllers\member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\eventModel;
use App\Master\CarouselModel;
use App\Master\specModel;
use Carbon\Carbon;

class eventController extends Controller
{
    //
    public function index()
    {
        $mytime = Carbon::now();
        $hari =  $mytime->format('d');

        $dt = Carbon::now();
        $bulan = $dt->toDateString();

        $event = eventModel::query()
            ->select('id','judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->orderBy('tglMulai', 'ASC')
            ->where('tglMulai', '>', $bulan)
            ->take(8)
            ->get();

        $carousel = CarouselModel::query()
            ->select('tb_slide.idEvent', 'tb_slide.judul', 'tb_slide.gambar', 'tb_slide.id','terlihat','tglMulai', 'deskripsi','city','region','url','jenis')
            ->leftJoin('tb_event','tb_slide.idEvent', 'tb_event.id')
            ->where('terlihat', '=', 'ya')
            ->get();


        $homeCarousell = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->orderBy('tglMulai', 'ASC')
            ->whereDay('tglMulai', '>', $hari)
            ->take(4)
            ->get();



        $data = [
            'event' => $event,
            'carousel' => $carousel,
            'homeCarousell' => $homeCarousell
        ];

        return view('main/home')->with($data);
        //return($carousel);
    }

    public function evenHome(){
        $dt = Carbon::now();
        $bulan = $dt->toDateString();
        $event = eventModel::query()
        ->select('id','judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
        ->orderBy('tglMulai', 'ASC')
        ->where('tglMulai', '>', $bulan)
        ->take(8)
        ->get();
        $data = [
            'event' => $event
        ];
        return view('main/data/evenHome')->with($data);
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
            'month' => $months,

        ];

        // return view('main/listevent')->with($data);
        return view('main/listevent1')->with($data);
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
        //return $event;
    }

    public function dataIklan(Request $req)
    {
        $carousel = CarouselModel::query()
        ->select('judul','gambar','url','jenis')
        ->where('url','=',$req->id)
        ->get();

        return view('main/dataiklan')->with('carousel', $carousel);
        //return $event;
    }

    public function comboCarievent(Request $req)
    {
        $event = eventModel::whereYear('tglMulai', 'like', '%' . $req->year . '%')
            ->where([
                ['city', 'like', '%' . $req->city . '%'],
                ['region', 'like', '%' . $req->region . '%']
            ])
            ->where(function ($as) use ($req) {
                $as->where('spec', 'like', '%' . $req->spec . '%')
                    ->orwhere('deskripsi', 'like', '%' . $req->spec . '%')
                    ->orwhere('judul', 'like', '%' . $req->spec . '%')
                    ->orwhereMonth('tglMulai', 'like', '%' . $req->spec . '%')
                    ->orwhereYear('tglMulai', 'like', '%' . $req->spec . '%')
                    ->orwhere('city', 'like', '%' . $req->spec . '%')
                    ->orwhere('region', 'like', '%' . $req->spec . '%');
            })
            ->where(function ($mo) use ($req) {
                if ($req->month == "") {
                    $mo->whereMonth('tglMulai', 'like', '%' . $req->month . '%');
                } else {
                    $mo->whereMonth('tglMulai', '=',  $req->month);
                }
            })
            ->get();





        $jum = $event->first();
        if ($jum != null) {
            //return view('main/data/dataListEvent', with('event', $event));
            $returnHtml = view('main/data/dataListEvent')->with('event', $event)->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
            //return $event;
        } else {
            //return view('main/data/listEventKosong', compact('event'));
            $returnHtml = view('main/data/listEventKosong');
        }
    }

    public function comboPagination(Request $req)
    {
        $event = eventModel::whereYear('tglMulai', 'like', '%' . $req->year . '%')
            ->where([
                ['city', 'like', '%' . $req->city . '%'],
                ['region', 'like', '%' . $req->region . '%']
            ])
            ->where(function ($as) use ($req) {
                $as->where('spec', 'like', '%' . $req->spec . '%')
                    ->orwhere('deskripsi', 'like', '%' . $req->spec . '%')
                    ->orwhere('judul', 'like', '%' . $req->spec . '%')
                    ->orwhere('tglMulai', 'like', '%' . $req->spec . '%')
                    ->orwhereYear('tglMulai', 'like', '%' . $req->spec . '%')
                    ->orwhere('city', 'like', '%' . $req->spec . '%')
                    ->orwhere('region', 'like', '%' . $req->spec . '%');
            })
            ->where(function ($mo) use ($req) {
                if ($req->month == "") {
                    $mo->whereMonth('tglMulai', 'like', '%' . $req->month . '%');
                } else {
                    $mo->whereMonth('tglMulai', '=',  $req->month);
                }
            })
            ->paginate(5);

        $years = [];
        for ($year = now()->year; $year >= 2010; $year--) $years[$year] = $year;


        $sp = specModel::query()
            ->select('gelar', 'spec')
            ->get();

        $data = [
            'year' => $years,
            'spec' => $sp,
            'event' => $event


        ];


        if ($req->ajax()) {
            return view('main/data/dataListEvent', with($data));
            //$returnHtml = view('main/data/dataListEvent')->with('eventList', $event)->render();
            //return response()->json(array('success' => true, 'html' => $returnHtml));
        }

        $jum = $event->first();
        if ($jum != null) {
            return view('main/listevent', with($data));
            //$returnHtml = view('main/data/pagination')->with('eventList', $event)->render();
            //return response()->json(array('success' => true, 'html' => $returnHtml));
        } else {
            //return view('main/data/listEventKosong', compact('event'));
            $returnHtml = view('main/data/listEventKosong');
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
            $returnHtml = view('main/data/dataListEvent')->with('event', $event)->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        } else {
            $returnHtml = view('main/data/listEventKosong')->render();
            return response()->json(array('success' => true, 'html' => $returnHtml));
        }
    }

    public function searchEvent(Request $req)
    {
        $bul = '';
        $event = eventModel::query()
            ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
            ->where('judul', 'like', '%' . $req->par . '%')
            ->orwhere('deskripsi', 'like', '%' . $req->par . '%')
            ->orwhere('spec', 'like', '%' . $req->par . '%')
            ->orwhereDate('tglMulai', 'like', '%' . $req->par . '%')
            ->orwhereYear('tglMulai', 'like', '%' . $req->par . '%')
            ->orwhere('city', 'like', '%' . $req->par . '%')
            ->orwhere('region', 'like', '%' . $req->par . '%')
            ->get();


        //    return $event;

        $data = [
            'event' => $event,
            'param' => $req->par
        ];
         return view('main/carievent')->with($data)->render();

        // $jum = $event->first();


        // if ($jum != null) {
        //     $returnHtml = view('main/data/dataListEvent')->with('event', $event)->render();
        //     return response()->json(array('success' => true, 'html' => $returnHtml));
        // } else {
        //     $returnHtml = view('main/data/listEventKosong')->render();
        //     return response()->json(array('success' => true, 'html' => $returnHtml));
        // }
    }

    public function load_data(Request $req)
    {
        $mytime = Carbon::now();
        $hari = $mytime->toDateString();

        if ($req->ajax()) {
            if ($req->id > 0) {
                /*
                $data = eventModel::query()
                    ->select('id', 'judul', 'deskripsi', 'tempat', 'region', 'city', 'tglMulai', 'tglAkhir', 'noContact', 'namaContact', 'spec', 'gambar', 'filepdf')
                    ->where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(2)
                    ->get();
                    */
                $data = eventModel::where('tglMulai', '>', $req->date)
                ->whereYear('tglMulai', 'like', '%' . $req->year . '%')
                ->where([
                    ['city', 'like', '%' . $req->city . '%'],
                    ['region', 'like', '%' . $req->region . '%']
                ])
                ->where(function ($as) use ($req) {
                    $as->where('spec', 'like', '%' . $req->spec . '%')
                        ->orwhere('deskripsi', 'like', '%' . $req->des . '%')
                        ->orwhere('judul', 'like', '%' . $req->judul . '%')
                        ->orwhereMonth('tglMulai', 'like', '%' . $req->month . '%')
                        ->orwhereYear('tglMulai', 'like', '%' . $req->year . '%')
                        ->orwhere('city', 'like', '%' . $req->city . '%')
                        ->orwhere('region', 'like', '%' . $req->region . '%');
                })
                ->where(function ($mo) use ($req) {
                    if ($req->month == "") {
                        $mo->whereMonth('tglMulai', 'like', '%' . $req->month . '%');
                    } else {
                        $mo->whereMonth('tglMulai', '=',  $req->month);
                    }
                })
                ->orderBy('tglMulai', 'ASC')
                ->where('tglMulai', '>', $hari)
                ->limit(30)
                ->get();
                    // ->whereYear('tglMulai', 'like', '%' . $req->year . '%')
                    // ->where([
                    //     ['city', 'like', '%' . $req->city . '%'],
                    //     ['region', 'like', '%' . $req->region . '%']
                    // ])
                    // ->where(function ($as) use ($req) {
                    //     $as->where('spec', 'like', '%' . $req->spec . '%')
                    //         ->orwhere('deskripsi', 'like', '%' . $req->des . '%')
                    //         ->orwhere('judul', 'like', '%' . $req->judul . '%')
                    //         ->orwhereMonth('tglMulai', 'like', '%' . $req->month . '%')
                    //         ->orwhereYear('tglMulai', 'like', '%' . $req->year . '%')
                    //         ->orwhere('city', 'like', '%' . $req->city . '%')
                    //         ->orwhere('region', 'like', '%' . $req->region . '%');
                    // })
                    // ->where(function ($mo) use ($req) {
                    //     if ($req->month == "") {
                    //         $mo->whereMonth('tglMulai', 'like', '%' . $req->month . '%');
                    //     } else {
                    //         $mo->whereMonth('tglMulai', '=',  $req->month);
                    //     }
                    // })
                    // ->orderBy('tglMulai', 'ASC')
                    // ->where('tglMulai', '>', $hari)
                    // ->limit(3)
                    // ->get();
            } else {
                /*
                $data = eventModel::query()
                    ->orderBy('id', 'DESC')
                    ->limit(3)
                    ->get();
                    */
                $data = eventModel::whereYear('tglMulai', 'like', '%' . $req->year . '%')
                    ->where([
                        ['city', 'like', '%' . $req->city . '%'],
                        ['region', 'like', '%' . $req->region . '%']
                    ])
                    ->where(function ($as) use ($req) {
                        $as->where('spec', 'like', '%' . $req->spec . '%')
                            ->orwhere('deskripsi', 'like', '%' . $req->des . '%')
                            ->orwhere('judul', 'like', '%' . $req->judul . '%')
                            ->orwhereMonth('tglMulai', 'like', '%' . $req->month . '%')
                            ->orwhereYear('tglMulai', 'like', '%' . $req->year . '%')
                            ->orwhere('city', 'like', '%' . $req->city . '%')
                            ->orwhere('region', 'like', '%' . $req->region . '%');
                    })
                    ->where(function ($mo) use ($req) {
                        if ($req->month == "") {
                            $mo->whereMonth('tglMulai', 'like', '%' . $req->month . '%');
                        } else {
                            $mo->whereMonth('tglMulai', '=',  $req->month);
                        }
                    })
                    ->orderBy('tglMulai', 'ASC')
                    ->where('tglMulai', '>', $hari)
                    ->limit(30)
                    ->get();
            }
            $output = '';
            $last_id = '';
            $last_date = '';
            if (!$data->isEmpty()) {
                foreach ($data as $even) {
                    $output .= '
                     <a href="/dataevent?id=' . $even->id . '" class="media p-2 border-B listHover">
                     <div class="media">
                         <div class="last-media-img ml-1 mt-1 mr-2"
                             style="background-image: url(\'assets/thumbnails/' . $even->gambar . '\')">

                         </div>
                         <div class="media-body pt-1">
                             <div class="time-cat pb-1 pl-0">
                                 <span class="badge">' . $even->city .', '.  $even->region . '</span>
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
                    $last_date = $even->tglMulai;
                }
                $output .= '
                <div id="load_more" class="pt-2">
                    <button type="button" name="load_more_button" id="load_more_button" class="btn btn-light form-control load" data-id="' . $last_id . '" data-date="'.$last_date.'">Load More</button>
                </div>
            ';
            } else {
                $output .= '
                    <div id="load_more" class="pt-2">
                        <button type="button" name="load_more_button" class="btn btn-light form-control">No Data Found</button>
                    </div>
                ';
            }
            echo $output;
        }
    }

    public function download_pdf(Request $req){

         $file= public_path(). '/assets/pdf/'.$req->pdf;

         $headers = array(

            'Content-Type: application/pdf',

          );
            return Response()->download($file, 'filename.pdf', $headers);



    }
}
