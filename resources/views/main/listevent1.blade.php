@extends('main.header')




@section('content')
<link rel="stylesheet" href="{{ asset('/css/carousell.css')}}" type="text/css" media="screen" />



<div class="container bawah ">




    <div class="row pb-3 border" style="border-radius: 1rem !important">
        <div class=" col-lg-6">
            <label for="comboSpec" class=" col-form-label">Specialist : </label>
            <select name="comboSpec" id="comboSpec" class="form-control form-control-sm" onchange="">
                <option value="">All</option>
                @foreach ($spec as $item)
                <option value="{{$item->spec}}">{{$item->spec}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-2">
            <label for="comboYear" class=" col-form-label">Year : </label>
            <select name="comboYear" id="comboYear" class="form-control form-control-sm" onchange="">
                <option value="">All</option>
                @foreach ($year as $item)
                <option value="{{$item}}">{{$item}}</option>
                @endforeach
            </select>

        </div>
        <div class="col-lg-2">
            <label for="comboMonth" class=" col-form-label">Month : </label>
            <select name="comboMonth" id="comboMonth" class="form-control  form-control-sm" onchange="">
                <option value="">All</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="combo" class=" col-form-label">Regional : </label>
            <select name="" id="comboRegion" class="form-control  form-control-sm" onchange="">
                <option value="">All</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="combo" class=" col-form-label">City : </label>
            <select name="" id="comboCity" class="form-control form-control-sm" onchange="">
                <option value="">All</option>
            </select>
        </div>

        <div class="col-lg-1 align-self-end col-form-label">
            <button class="btn floaat-bottom btn-primary btn-sm" onclick="cari()"><i class="fa fa-search"
                    aria-hidden="true"></i> Search</button>
        </div>
        <div class="col-lg-1 align-self-end col-form-label">
            <button class="btn floaat-bottom btn-danger btn-sm" onclick="reset()"><i class="fa fa-times"
                    aria-hidden="true"></i> Reset</button>
        </div>






    </div>
    <hr>

    <div class="" id="dataEvent" >
        

    </div>

    <br>





</div>



@endsection


@section('script')

<script src="{{ asset('/js/tampilan/listevent1.js') }}"></script>


<script>
    $(document).ready(function(){
    $('#dataEvent').load('/dataLoad');
   
})

function cari(){
    $('#dataEvent').load('/dataLoad');
}
</script>

@endsection