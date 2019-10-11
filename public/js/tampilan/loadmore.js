$(document).ready(function(){
    
  var _token = $('input[name=_token]').val()

  load_data('',_token)

  function load_data (id = '' , _token, date='' ){
          var s = $('#comboSpec').val();
  var y = $('#comboYear').val();
  var m = $('#comboMonth').val();
  var c = $('#comboCity').val();
  var r = $('#comboRegion option:selected').text()
  if (r === 'All') {
    r = ''
  }
    $.ajax({
      url: "dataLoad/load_data",
      methot: 'POST',
      data: { 
               spec:s, 
               year:y,
               month:m,
               city:c,
               region:r,
               id:id,
               date:date,
               _token:_token 
            },
      success: function (data) {
        $('#load_more_button').remove();
        $('#post_data').append(data);
      }
    })
  }

  
  $(document).on('click', '#load_more_button', function () {
    var id = $(this).data('id');
    var date = $(this).data('date');
    $('#load_more_button').html('<b>Loading...</b>');
    load_data(id, _token,date)
  })
});