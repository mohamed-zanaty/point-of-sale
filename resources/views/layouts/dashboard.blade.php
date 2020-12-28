<!DOCTYPE html>
<html class="loading" dir="{{LaravelLocalization::getCurrentLocaleDirection()}}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('admin/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashboard/images/ico/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">


    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/plugins/animate/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/vendors.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboard/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/pages/chat-application.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboard/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/pages/timeline.css')}}">

    @else

        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/plugins/animate/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/vendors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/pages/chat-application.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/app.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/custom-rtl.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('dashboard/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css/pages/timeline.css')}}">
    @endif
<!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/charts/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/forms/selects/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('dashboard/vendors/css/forms/toggle/bootstrap-switch.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/forms/toggle/switchery.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/extensions/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/vendors/css/extensions/timedropper.min.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    {{--morris--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard/js/plugins/icheck/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard/css-rtl/style-rtl.css')}}">
    {{--morris--}}
    <link rel="stylesheet" href="{{ asset('dashboard/css/plugins/morris/morris.css') }}">
    <!-- END Custom CSS-->
    @yield('style')
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }
    </style>
</head>
<body
    class="vertical-layout vertical-menu 2-columns  @if(Request::is('admin/users/tickets/reply*')) chat-application @endif menu-expanded fixed-navbar"
    data-open="click" data-menu="vertical-menu" data-col="2-columns">
<!-- fixed-top-->
@include('sweetalert::alert')
@include('dashboard.includes.header')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.includes.sidebar')

@yield('content')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.includes.footer')

<!-- BEGIN VENDOR JS-->
<script src="{{asset('dashboard/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script src="{{asset('dashboard/vendors/js/tables/datatable/datatables.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('dashboard/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('dashboard/vendors/js/forms/toggle/bootstrap-switch.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('dashboard/vendors/js/forms/toggle/bootstrap-checkbox.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('dashboard/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/scripts/forms/switch.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>

<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('dashboard/vendors/js/charts/chart.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/vendors/js/charts/echarts/echarts.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard/vendors/js/extensions/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/vendors/js/extensions/timedropper.min.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard/vendors/js/forms/icheck/icheck.min.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/scripts/pages/chat-application.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{asset('dashboard/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('dashboard/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->


<script src="{{asset('dashboard/js/scripts/tables/datatables/datatable-basic.js')}}"
        type="text/javascript"></script>
<script src="{{asset('dashboard/js/scripts/extensions/date-time-dropper.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('dashboard/js/scripts/forms/checkbox-radio.js')}}" type="text/javascript"></script>

<script src="{{asset('dashboard/js/scripts/modal/components-modal.js')}}" type="text/javascript"></script>

{{--ckeditor standard--}}
<script src="{{ asset('dashboard/js/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/morris/morris.min.js') }}"></script>


{{--custom js--}}
<script src="{{ asset('dashboard/js/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('dashboard/js/js/jquery.number.min.js') }}"></script>
<script src="{{ asset('dashboard/js/js/custom/product.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/printThis.js') }}"></script>
<script src="{{url('public/noty/noty.min.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->
<script src="{{url('public/js/editadmin.js')}}"></script>
@stack('scripts')
<script>
    $('#meridians1').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians2').timeDropper({
        meridians: true, setCurrentTime: false

    });
    $('#meridians3').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians4').timeDropper({
        meridians: true,
        setCurrentTime: false
    });
    $('#meridians5').timeDropper({
        meridians: true, setCurrentTime: false

    });
    $('#meridians6').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians7').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians8').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians9').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians10').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians11').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians12').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians13').timeDropper({
        meridians: true, setCurrentTime: false
    });
    $('#meridians14').timeDropper({
        meridians: true, setCurrentTime: false
    });
</script>

</body>
</html>
