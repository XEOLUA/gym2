<!-- Price box minimal--><!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>

    <link rel="stylesheet" href="{{url('bootstrap4/css/bootstrap.css')}}">
</head>
<body>
<span title="text title" id="btn-tooltip" class="btn btn-danger">yyy</span>


<button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
    Tooltip on top
</button>
</body>
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('/bootstrap4/js/bootstrap.js')}}"></script>
<script src="{{url('bootstrap4/js/bootstrap.bundle.js')}}"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</html>