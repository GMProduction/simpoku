var lok = window.location.pathname.replace('/', '')
$(window).on('load', function () {
  if (lok === '') {
    $('#home').addClass('garis-aktive')
    $('#txtCariHeader').attr('hidden', '')
  }else {
    $('#' + lok).addClass('garis-aktive')
    if (lok === 'event') {
      $('#txtCariHeader').attr('hidden')
    }else {
      $('#txtCariHeader').removeAttr('hidden')
    }
  }

  $('.anJudul').addClass('jmuncul')
  $('.anIsi').addClass('jmuncul')
  $('.anBtn').addClass('jmuncul')
  $('.anImgB').addClass('jmuncul')
  $('.anImg1').addClass('jmuncul')
  $('.anImg2').addClass('jmuncul')
  $('.anImg3').addClass('jmuncul')
  $('.anImg4').addClass('jmuncul')
  $('.bgtekshome').addClass('bgmuncul')
})

$(document).ready(function () {
  $('.linkfeat').hover(
    function () {
      $('.textfeat').show(500)
    },
    function () {
      $('.textfeat').hide(500)
    }
  )

  $('#txtCari').on('input', function () {
    var t = $('#txtCari').val()
    cariEven(t)
  })



  function CariHeader (a) {
    var t = $('.txtCariHeader').val()
    cariEven(t)
  }




  $(window).scroll(function () {
    if ($(window).scrollTop() > 100) {
      $('#navMenu').addClass('fixed-top')
      $('#navMenu').addClass('bg-putih')
      $('#navMenu').removeClass('')
      $('#navMenu').addClass('z-depth-2')
      $('.bawah').addClass('conten-fixed')
      $('.atas').addClass('conten-atas')


      if (lok === 'event') {
        $('#txtCariHeader').attr('hidden')
      }else {
        $('#txtCariHeader').removeAttr('hidden')
      }
    }else {
      $('#navMenu').removeClass('fixed-top')

      $('#navMenu').removeClass('bg-putih')
      $('#navMenu').addClass('')
      $('#navMenu').removeClass('z-depth-2')
      $('.bawah').removeClass('conten-fixed')
      $('.atas').removeClass('conten-atas')
      $('#txtCariHeader').attr('hidden', '')
    }
  })
})
