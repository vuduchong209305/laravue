<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <base href="{{ asset('') }}">
    <meta id="csrf-token" name="csrf-token" value="{{ csrf_token() }}">

    <link rel="stylesheet" href="public/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/admin/css/ionicons.min.css">
    <link rel="stylesheet" href="public/admin/css/AdminLTE.min.css">
    <link rel="stylesheet" href="public/admin/css/_all-skins.min.css">
    <link rel="stylesheet" href="public/admin/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="public/admin/css/daterangepicker.css">
    <link rel="stylesheet" href="public/admin/css/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="public/admin/css/jquery.toast.css">
    <link rel="stylesheet" href="public/admin/css/custom.css">

    <script>
        var BASE_URL = '<?php echo url('/') . '/' ?>'
        var _id = '<?php echo Auth::user()->id ? Auth::user()->id : '' ?>'
        var _name = '<?php echo Auth::user()->name ? Auth::user()->name : '' ?>'
        var _email = '<?php echo Auth::user()->email ? Auth::user()->email : '' ?>'
        var _phone = '<?php echo Auth::user()->phone ? Auth::user()->phone : '' ?>'
        var _address = '<?php echo Auth::user()->address ? Auth::user()->address : '' ?>'
        var _avatar = '<?php echo Auth::user()->avatar ? Auth::user()->avatar : '' ?>'
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div id="app"></div>
    
    <script src="public/js/app.js"></script>

    <script src="public/admin/js/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="public/admin/js/bootstrap.min.js"></script>
    <script src="public/admin/js/raphael.min.js"></script>
    <script src="public/admin/js/jquery.sparkline.min.js"></script>
    <script src="public/admin/js/jquery.knob.min.js"></script>
    <script src="public/admin/js/moment.min.js"></script>
    <script src="public/admin/js/daterangepicker.js"></script>
    <script src="public/admin/js/bootstrap-datepicker.min.js"></script>
    <script src="public/admin/js/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="public/admin/js/jquery.slimscroll.min.js"></script>
    <script src="public/admin/js/fastclick.js"></script>
    <script src="public/admin/js/adminlte.min.js"></script>
    <script src="public/admin/js/dashboard.js"></script>
    <script src="public/admin/js/jquery.toast.js"></script>
    <script src="public/admin/js/demo.js"></script>
    <script src="public/admin/js/custom.js"></script>
</body>
</html>