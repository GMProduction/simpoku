<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/select2-bootstrap4.min.css')}}">
    <title>Document</title>
</head>
<body>

    <div class="form-group">
        <label>Specialis</label>
            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                    style="width: 100%;" name="spec[]" id="spec">
                <option value="a" selected>a</option>
                <option value="b">b</option>
                <option value="c">c</option>
                <option value="d">d</option>
                <option value="e">e</option>
                <option value="f" selected>f</option>
            </select>
    </div>

<script src=" {{asset ('/js/jquery.min.js')}}"></script>
<script src=" {{asset ('/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/select2/select2.min.js') }}"></script>
<script>

$(document).ready(function () {
    $('.select2').select2({
        theme: 'bootstrap4'
    });

    $('#btnCoba').on('click', function () {
        alert($('.select2').val());
    });
});
</script>
</body>
</html>