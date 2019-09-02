@extends('main.header')




@section('content')

<?php
    

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "key: 7366bbad708dcf7d2f1b3d69e5f4219f"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $listKota = array(); //bikin array untuk nampung list kota

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {

        $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array
      
        $tempListKota = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja

        //looping array temporary untuk masukin object yang kita butuhin
        foreach ($tempListKota as $value) {
            //bikin object baru
            $kota = new stdClass();
            $kota->id = $value['city_id']; //id kotanya
            $kota->nama = $value['city_name']; //nama kotanya
            $kota->prov = $value['province']; //nama kotanya

            array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota

        }

        //$listKota : udah berisi list kota yang kita butuhin

        /*ini untuk ngecek aja isi $list kota udah bener apa belum
        foreach ($listKota as $kota) {
          echo ("<br>");
          echo "id : ". $kota->id . " - " . "nama : ". $kota->nama;

        }
     */

    }

?>


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
                            @foreach ($listKota as $kota)
                        <option value="{{$kota->id}}">{{ $kota->nama }}</option>
                            @endforeach
                            
                            
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

  

   

</script>

@endsection