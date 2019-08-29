
<link rel="stylesheet" href="{{ asset('/css/carousell.css')}}" type="text/css" media="screen" />
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
                    <small class="text-time">{{date('d M', strtotime($even->tglMulai))}} s/d {{date('d M Y', strtotime($even->tglAhkir))}}</small>
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

