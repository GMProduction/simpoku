@extends('main.header')

@section('content')
<style>
    .txtEdit{
        background-color: white !important
    }
</style>
<div class="container bawah">
    <div class="row justify-content-center">
        <div class="row col-lg-7 justify-content-center border">
            <div class="row col-lg-12 justify-content-end pt-2"><a onclick="editProfile()"
                    style="cursor: pointer; color: white" id="edit" class="btn btn-primary btn-sm"><span
                        class="fa fa-pencil" id="iconEdit"></span> <span id="lbEdit">edit</span> </a></div>
            <div class="col-lg-5 pt-2 " style="">
                <div class="" style=" height: 250px;">
                    <div class="row col align-self-center justify-content-center pt-4">
                        <img src="{{asset ('/assets/foto/event1.jpg')}}" style="" class="rounded-circle"
                            alt="Cinque Terre" width="200">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="">
                    <div class="row pt-2">
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan" style="">
                                        <span class="fa fa-user"></span>
                                    </div>
                                </div>
                                <input type="text" id="name" class="form-control bordertext txtEdit " disabled
                                    placeholder="Full name">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan" style="">
                                        <span class="fa fa-user-md"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control bordertext txtEdit" disabled placeholder="profesi">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan" style="">
                                        <span class="fa fa-building"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control bordertext txtEdit " disabled placeholder="instansi">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan txtEdit" style="">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                </div>
                                <input type="text" class="form-control bordertext txtEdit " disabled placeholder="phone">

                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan">
                                        <span class="fa fa-calendar"></span>
                                    </div>
                                </div>
                                <input type="date" class="form-control bordertext txtEdit" disabled style="" placeholder="">

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <div class="input-group-text transparan">
                                        <span class="fa fa-home"></span>
                                    </div>
                                </div>
                                <textarea name="" id="" cols="30" rows="3" disabled class="form-control bordertext txtEdit"
                                    placeholder="Address"></textarea>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
        $(document).ready(function () {
            
        });
        function editProfile(){
                if($('#lbEdit').html() == 'edit'){
                    $('.txtEdit').removeAttr('disabled');
                    $('#iconEdit').removeClass('fa-pencil');
                    $('#iconEdit').addClass('fa-save');
                    $('#lbEdit').html('save');
                    
                }else{
                    $('.txtEdit').attr('disabled','');
                    $('#iconEdit').addClass('fa-pencil');
                    $('#iconEdit').removeClass('fa-save');
                    $('#lbEdit').html('edit');
                }
            }
    </script>
@endsection