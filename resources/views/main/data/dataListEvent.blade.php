<link rel="stylesheet" href="{{ asset('/css/carousell.css')}}" type="text/css" media="screen" />

<style>
    .show_more_main {
        margin: 15px 25px;
    }

    .show_more {
        background-color: #f8f8f8;
        background-image: -webkit-linear-gradient(top, #fcfcfc 0, #f8f8f8 100%);
        background-image: linear-gradient(top, #fcfcfc 0, #f8f8f8 100%);
        border: 1px solid;
        border-color: #d3d3d3;
        color: #333;
        font-size: 12px;
        outline: 0;
    }

    .show_more {
        cursor: pointer;
        display: block;
        padding: 10px 0;
        text-align: center;
        font-weight: bold;
    }

    .loding {
        background-color: #e9e9e9;
        border: 1px solid;
        border-color: #c6c6c6;
        color: #333;
        font-size: 12px;
        display: block;
        text-align: center;
        padding: 10px 0;
        outline: 0;
        font-weight: bold;
    }

    .loding_txt {
        background-image: url(loading.gif);
        background-position: left;
        background-repeat: no-repeat;
        border: 0;
        display: inline-block;
        height: 16px;
        padding-left: 20px;
    }
</style>

<section>
    <div class="card-body m-0 p-0 postList border-0">
        @foreach ($eventList as $even)
        <a href="/dataevent?id={{$even->id}}" class="media p-2 border-B listHover">
            <div class="media">
                <div class="last-media-img ml-1 mt-1 mr-2"
                    style="background-image: url({{asset ('/assets/foto/'.$even->gambar)}})">
                </div>
                <div class="media-body pt-1">
                    <div class="time-cat pb-1 pl-0">
                        <span class="badge">{{$even->region}}</span>
                        <small class="text-time">{{date('d M', strtotime($even->tglMulai))}} s/d
                            {{date('d M Y', strtotime($even->tglAkhir))}}</small>
                    </div>
                    <p class="mb-0 text-burgundy" id="title-lm">{{$even->judul}} </p>
                    <p class="d-none d-lg-block ">{{$even->deskripsi}}</p>
                    <p class="d-none d-lg-block ">Specialist : {{$even->spec}}</p>
                </div>
            </div>
        </a>

        
        @endforeach

       
    </div>

</section>