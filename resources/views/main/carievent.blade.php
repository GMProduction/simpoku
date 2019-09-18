@extends('main.header')

@section('content')
<link rel="stylesheet" href="{{ asset('/css/carousell.css')}}" type="text/css" media="screen" />
<div class="container bawah">
    <div class="card-body m-0  postList box-putih p-3" style="">
           
        @forelse ($event as $even)
       @if ($loop->first)
       <h4> Search result for '{{$param}}' </h4>
       @endif
       
           
        <a href="/dataevent?id={{$even->id}}" class="media p-2 border-B listHover">
            <div class="media">
                <div class="last-media-img ml-1 mt-1 mr-2"
                    style="background-image: url({{asset ('/assets/foto/'.$even->gambar)}})">
                </div>
                <div class="media-body pt-1">
                    <div class="time-cat pb-1 pl-0">
                        <span class="badge">{{$even->city}}, {{$even->region}}</span>
                        <small class="text-time">{{date('d M', strtotime($even->tglMulai))}} s/d
                            {{date('d M Y', strtotime($even->tglAkhir))}}</small>
                    </div>
                    <p class="mb-0 text-burgundy" id="title-lm">{{$even->judul}} </p>
                    <p class="d-none d-lg-block ">{{$even->deskripsi}}</p>
                    <p class="d-none d-lg-block ">Specialist : {{$even->spec}}</p>
                </div>
            </div>
        </a>
        @empty
        <div class="row d-flex justify-content-center" style="min-height: 400px">
            <div class="col-12 align-self-end ">
                <h4 class="text-center "><i class="fa fa-search fa-3x" aria-hidden="true"></i></h4>
            </div>
            <div class="col-12" >
                <h4 class="text-center">No result found for '{{$param}}'</h4>
            </div>


        </div>


        @endforelse



    </div>
</div>

@endsection