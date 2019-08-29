@extends('main.header')




@section('content')


<div class="container bawah ">



    <div class="row col-12" style="width: 100%;">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="" style="">
                <!--
                <div class="input-group-prepend">
                    <span class="input-group-text border-right-0" id="basic-addon1" style="background-color: white"><i
                            class="fa fa-search" aria-hidden="true"></i></span>
                </div>
                
                <input type="text" id="txtCari" class=" form-control border-left-0 form-control-sm"
                    placeholder="Cari Event / Deskripsi..." aria-label="Username" aria-describedby="basic-addon1"
                    style="">
                -->
                <div class="row">
                    <div class=" col-md-5">
                        <label for="comboSpec" class=" col-form-label">Specialist : </label>
                        <select name="comboSpec" id="comboSpec" class="form-control">
                            @foreach ($spec as $item)
                            <option value="{{$item->spec}}">{{$item->spec}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="comboYear" class=" col-form-label">Year : </label>
                        <select name="comboYear" id="comboYear" class="form-control">
                            @foreach ($year as $item)
                            <option value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-lg-2">
                        <label for="comboMonth" class=" col-form-label">Month : </label>
                        <select name="comboMonth" id="comboMonth" class="form-control">
                                @foreach ($month as $item)
                                <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label for="combo" class=" col-form-label">Region : </label>
                       
                        <select name="" id="" class="form-control">
                            <option value="">asd</option>
                            <option value="">asd</option>
                            <option value="">asd</option>
                        </select>
                    </div>
                    <div class="col-lg-1 align-self-end col-form-label">
                        <button class="btn floaat-bottom" onclick="comboCariEven()">Submit</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <hr>

    <div class="">
        <section id="tampilanListEven" class="">
            <option value=""></option>
        </section>
    </div>


    


    <!--
        
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
        -->


</div>



@endsection


@section('script')
<script>
    $('#txtCari').val(sessionStorage.getItem('cari'));
        sessionStorage.setItem('cari','');
        function tampilListEven() {
            
            $.ajax({
                type : 'GET',
                url : '/tampilListEven',
                success : function(data){
                    $('#tampilanListEven').html(data.html);
                }
            })
        }

       function comboCariEven(){
           var s = $('#comboSpec').val();
           var y = $('#comboYear').val();
           var m = $('#comboMonth').val();
           $.ajax({
               type :'GET',
               url : '/comboCariEven',
               data : {
                   spec : s,
                   year : y,
                   month : m
               },
               success : function(data){
                   alert(s + ' ' +m + ' ' +y);
                }

           })
       }

        
        $(document).ready(function () {
            var t = $('#txtCari').val();
            cariEven();
            


            
        });

    $(window).on("load", function() {
        
        
        
    });

   

</script>

@endsection