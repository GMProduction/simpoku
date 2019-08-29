@extends('main.header')


@section('content')

<style>
    .detailInf {
        margin-top: 1rem;
        padding-bottom: 5px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }

    tr {
        height: 55px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);

    }

    td {
        vertical-align: middle !important;
        
        font-weight: bolder;
        opacity: 0.8;
    }

    .judul {
        font-weight: bolder;
    }
</style>

@foreach ($event as $even)


<div class="container bawah rounded" style="">
    <div class="">
        <div class="p-3">

            <div class="row list-event">
                <div class="col-lg-6 p-3 justify-content-center">
                    <img class="img-event" src="{{asset ('/assets/foto/'.$even->gambar)}}" alt="" width="400">
                </div>
                <div class="col-lg-6 p-3">
                    <h2 class="judul">{{$even->judul}}</h2>


                    <table class="table table-sm table-borderless">
                        <tr>
                            <td class="" style=""><i class="fa fa-clipboard text-burgundy" aria-hidden="true"></i></td>
                            <td class="text-burgundy">{{$even->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td class="" style="width: 30px"><span class="fa fa-calendar text-burgundy "></span></td>
                            <td class="text-burgundy">{{date('D, d M', strtotime($even->tglMulai))}} - {{date('D, d M Y', strtotime($even->tglAhkir))}}</td>
                           
                        </tr>
                        <tr>
                            <td class="" style=""><i class="fa fa-location-arrow text-burgundy" aria-hidden="true"></i>
                            </td>
                            <td class="text-burgundy">{{$even->region}}</td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-phone text-burgundy" aria-hidden="true"></i></td>
                            <td class="text-burgundy">{{$even->contact}}</td>
                        </tr>
                        <tr>
                            <td class="" style=""><i class="fa fa-user-md text-burgundy" aria-hidden="true"></i></td>
                            <td class="text-burgundy">{{$even->spec}}</td>
                        </tr>



                    </table>
                    <a class="btn btn-primary rounded">Download pdf</a>


                </div>
            </div>

        </div>
    </div>
</div>
@endforeach

<script>
    function bokmark(){
    
        $('#iconBookmark').removeClass('fa-bookmark-o');
        $('#iconBookmark').addClass('fa-bookmark');
    
}
</script>
@endsection