
<div class=" p-3">
    <div class="panel-body" >
        <?php echo e(csrf_field()); ?>

        <div id="post_data"></div>
    </div>
</div>

<script src="<?php echo e(asset('/js/tampilan/loadmore.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function()
    {



        
// var _token = $('input[name="_token"]').val();

// load_data('', _token);



// function load_data(id="", _token)
// {
//     var s = $('#comboSpec').val();
//   var y = $('#comboYear').val();
//   var m = $('#comboMonth').val();
//   var c = $('#comboCity').val();
//   var r = $('#comboRegion option:selected').text()
//   if (r === 'All') {
//     r = ''
//   }

  
 
   
//  $.ajax({
//   url:"load_data",
//   method:"POST",
//   data:{
//       id:id,
//        _token:_token, 
//        spec:s, 
//        year:y,
//        month:m,
//        city:c,
//        region:r
//     },
//   success:function(data)
//   {
//    $('#load_more_button').remove();
//    $('#post_data').append(data);
//   }
//  })
// }
       

// $(document).on('click', '#load_more_button', function(){
//  var id = $(this).data('id');
//  $('#load_more_button').html('<b>Loading...</b>');
//  load_data(id, _token);
// });

});

</script><?php /**PATH D:\Program\web\New folder\simpoku\resources\views/main/data/dataeventload.blade.php ENDPATH**/ ?>