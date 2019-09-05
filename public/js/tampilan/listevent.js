$('#txtCari').val(sessionStorage.getItem('cari'))
sessionStorage.setItem('cari', '')
function tampilListEven () {
  $.ajax({
    type: 'GET',
    url: '/listevent',
    success: function (data) {
      $('#tampilanListEven').html(data.html)
    }
  })
}

function reset(){
    $('#comboSpec').val('');
    $('#comboYear').val('');
    $('#comboMonth').val('');
    $('#comboCity').val('');
    $('#comboRegion').val('');
    $('#txtCari1').val('');

    comboCariEven ();
}

function comboCariEven () {
  var s = $('#comboSpec').val()
  var y = $('#comboYear').val()
  var m = $('#comboMonth').val()
  var c = $('#comboCity').val()
  var r = $('#comboRegion option:selected').text()
  var a = $('#txtCari1').val()
  var d = ''
  if (a !== '') {
    s = a
    d = a
  }
  if (r === 'All') {
    r = ''
  }


  $.ajax({
    type: 'GET',
    url: '/comboCariEven',
    data: {
      spec: s,
      year: y,
      month: m,
      city: c,
      region: r,
      descrip: d
    },
    success: function (data) {
      $('#tampilanListEven').html(data.html)
    }

  })
}


$(document).ready(function () {
  var return_first = function () {
    var tmp = null
    $.ajax({
      'async': false,
      'type': 'get',
      'global': false,
      'dataType': 'json',
      'url': 'https://x.rajaapi.com/poe',
      'success': function (data) {
        tmp = data.token
      }
    })
    return tmp
  }()

  var t = $('#txtCari1').val()
  comboCariEven()


  $.ajax({
    url: 'https://x.rajaapi.com/MeP7c5ne' + return_first + '/m/wilayah/provinsi',
    type: 'GET',
    dataType: 'json',
    success: function (json) {
      if (json.code == 200) {
        for (i = 0; i < Object.keys(json.data).length; i++) {
          $('#comboRegion').append($('<option>').text(json.data[i].name).attr('value', json.data[i].id))
        }
      } else {
        $('#comboCity').append($('<option>').text('Data tidak di temukan').attr('value', 'Data tidak di temukan'))
      }
    }
  })

  $('#comboRegion').change(function () {
    var propinsi = $('#comboRegion').val()
    $.ajax({
      url: 'https://x.rajaapi.com/MeP7c5ne' + return_first + '/m/wilayah/kabupaten',
      data: 'idpropinsi=' + propinsi,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function (json) {
        $('#comboCity').html('')
        if (json.code == 200) {
          $('#comboCity').append($('<option>').text('All').attr('value', ''))
          for (i = 0; i < Object.keys(json.data).length; i++) {
            $('#comboCity').append($('<option>').text(json.data[i].name).attr('value', json.data[i].name))
          }
        } else {
          $('#comboCity').append($('<option>').text('All').attr('value', ''))
        }
      }
    })
  })


  var _token = $('input[name=_token]').val()

  // load_data('',_token)

  function load_data (id = '' , _token) {
    $.ajax({
      url: '/loadmore/load_data',
      methot: 'POST',
      data: {id: id, _token: _token},
      success: function (data) {
        $('#load_more_button').remove()
        $('#post_data').append(data)
      }
    })
  }

  $(document).on('click', '#load_more_button', function () {
    var id = $(this).data('id')
    $('#load_more_button').html('<b>Loading...</b>')
    load_data(id, _token, t)
  })

  $('#txtCari1').on('input', function () {
    var id = $(this).data('id')
    var s = $('#txtCari1').val().length
    if (s >= 3) {
      comboCariEven();
    }else if(s == 0){
        comboCariEven();
    }
  })
})
