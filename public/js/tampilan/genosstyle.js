$(window).on('load',function(){
    
    var lok = window.location.pathname.replace('/','');
    
    if(lok === ''){
        $('#home').addClass('garis-aktive');
    }else{
        $('#'+lok).addClass('garis-aktive');
    }

$('.anJudul').addClass('jmuncul');
$('.anIsi').addClass('jmuncul');
$('.anBtn').addClass('jmuncul');
$('.anImgB').addClass('jmuncul');
$('.anImg1').addClass('jmuncul');
$('.anImg2').addClass('jmuncul');
$('.anImg3').addClass('jmuncul');
$('.anImg4').addClass('jmuncul');
$('.bgtekshome').addClass('bgmuncul');

});

$(document).ready(function(){
    $(".linkfeat").hover(
        function () {
            $(".textfeat").show(500);
        },
        function () {
            $(".textfeat").hide(500);
        }
    );

});