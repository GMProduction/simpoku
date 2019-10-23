
    function showImgAcount(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgAccount')
                    .attr('src', e.target.result)
            .width(200)
            .height(200);
        };
        reader.readAsDataURL(input.files[0]);
        showSave();
    }

    function showSave() {
        if($('#poto').val !== null){
            $('#btnSaveFoto').removeAttr('hidden');
        }else{
            $('#btnSaveFoto').attr('hidden','');
        }
    }

}

function saveFoto() {

    
}

function editProfile(){
            if($('#lbEdit').html() == 'edit'){
                $('.txtEdit').removeAttr('disabled');
                $('#iconEdit').removeClass('fa-pencil');
                $('#iconEdit').addClass('fa-save');
                $('#lbEdit').html('save');
                $('.input-group-append div').removeClass('divIcon');
                $('#btClose').removeAttr('hidden');
            }else{
                document.getElementById('formMember').action = 'updateMember';
                document.getElementById('formMember').method = 'POST';
                document.getElementById('formMember').submit();

                // $('.txtEdit').attr('disabled','');
                // $('#iconEdit').addClass('fa-pencil');
                // $('#iconEdit').removeClass('fa-save');
                // $('#lbEdit').html('edit');
                // $('.input-group-append div').addClass('divIcon');
                // $('#btClose').attr('hidden','');
            }
        }
        function editClear() {
            window.location = 'member';
        } 