@extends('umum.header')




@section('content')


<div class="container bawah">
    
    <div class="row list-event">
            
        <div class="row" style="width: 100%; border-bottom: 1px solid rgba(0, 0, 0, 0.1)">
                <h4 class="col-md-3">List Event</h4>
                <div class="col-sm-2 offset-md-7 offset-sm-2 row justify-content-end ">
                    <select class="form-control form-control-sm">
                        <option>Terbaru</option>
                        <option value="">lama</option>
                    </select>
                </div>
        </div>
        
        
   
        
        <a class="row col-12 mt-2 pt-2 pb-2 list" style="" href="/dataevent">
            <div class="bg-primary img-list-event">
                    <img class="" src="http://admin.makro.id/media/post_img_sm/dpr-setujui-penambahan-anggaran-bp-batam-rp565-miliar-1531258457.jpeg" alt="">
            </div> 
            <div class="pl-3">
                <h5 class="tittle-list-event">dasdasdasdasdasd</h5>
                <p>Keterangan</p>
                <span class="small">Date :</span>
                <br>
                <span class="small pb-0"><i class="fa fa-map-marker "></i> asd</span>
            </div>       
                     
        </a>
       
        <div class="row col-12 pt-2 pb-2 list" style="">
            <div class="bg-primary img-list-event">
                asd
            </div> 
            <div class="pl-3">
                <h5 class="tittle-list-event">dasdasdasdasdasd</h5>
                <p>Keterangan</p>
                <span class="small">Date :</span>
                <br>
                <span class="small pb-0"><i class="fa fa-map-marker "></i> asd</span>
            </div>                
        </div>
        <div class="row col-12 pt-2 pb-2 list" style="">
                <div class="bg-primary img-list-event">
                    asd
                </div> 
                <div class="pl-3">
                    <h5 class="tittle-list-event">dasdasdasdasdasd</h5>
                    <p>Keterangan</p>
                    <span class="small">Date :</span>
                    <br>
                    <span class="small pb-0"><i class="fa fa-map-marker "></i> asd</span>
                </div>                
            </div>
    </div>
    
</div>


    
@endsection




