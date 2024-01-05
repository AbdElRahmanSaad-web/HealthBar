@php
    use Illuminate\Support\Facades\Form;
@endphp
@if (app()->getLocale() == 'en')
{{--    {{dd(app()->getLocale())}}--}}
    <!doctype html>
<html lang="en">

<head>
    <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/LogoHealthBar.png') }}" type="image/png"/>
    <!--plugins-->

    <link href="assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/>
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>


    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
    <link href="assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>
    <link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet"/>
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>

    <link href="assets/plugins/schedule/dist/jquery.schedule.css" rel="stylesheet"/>
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet"/>
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/dark-theme.css"/>
    <link rel="stylesheet" href="assets/css/semi-dark.css"/>
    <link rel="stylesheet" href="assets/css/header-colors.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"/>
    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
    @else
        {{--            {{dd(app()->getLocale())}}--}}

        <!doctype html>
        <html lang="ar" dir="rtl">

        <head>
            <base href="/public">
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!--favicon-->
            <link rel="icon" href="{{ asset('assets/images/LogoHealthBar.png') }}" type="image/png"/>
            <!--plugins-->

            <link href="rtl/assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/>
            <link href="rtl/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
            <link href="rtl/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
            <link href="assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet" />
            <link href="rtl/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
            <link href="rtl/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
            <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
            <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>
            <link href="assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet"/>
            <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet"/>
            <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
            <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
            <!-- loader-->
            <link href="rtl/assets/css/pace.min.css" rel="stylesheet"/>
            <script src="rtl/assets/js/pace.min.js"></script>
            <!-- Bootstrap CSS -->
            <link href="rtl/assets/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
            <link href="rtl/assets/css/app.css" rel="stylesheet">
            <link href="rtl/assets/css/icons.css" rel="stylesheet">
            <!-- Theme Style CSS -->
            <link rel="stylesheet" href="rtl/assets/css/dark-theme.css"/>
            <link rel="stylesheet" href="rtl/assets/css/semi-dark.css"/>
            <link rel="stylesheet" href="rtl/assets/css/header-colors.css"/>
            <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"/>
            <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
            <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
            <script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>

            @endif
            <title>@yield('subtitle')</title>
			
			@yield('style')

            <style>
                #previewImage1,
                #previewImage2 {
                    display: block;
                    max-width: 200px;
                    min-height: 150px;
                    max-height: 200px;
                    margin: 0 auto;
                    padding-top: 10px;
                }
            </style>

        </head>


<body class="d-flex justify-content-center">
<!--wrapper-->
<div class="spinner-border text-primary preloader" style="margin-top: 50vh" role="status">
    <span class="visually-hidden">Loading...</span>
</div>
<div class="wrapper">
    @include('dashboard.include.sidebar')

    @include('dashboard.include.header')

    @yield('content')
    {{-- </div> --}}
</div>
<!--end page wrapper -->
			
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->
<footer class="page-footer">
    <p class="mb-0">Copyright © 2021. All right reserved.</p>
</footer>
</div>
<!--end wrapper-->


@include('dashboard.include.switcher')
<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

<!--plugins-->

<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="assets/plugins/select2/js/select2.min.js"></script>
<!--notification js -->
<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="assets/plugins/notifications/js/notifications.min.js"></script>
<script src="assets/plugins/fullcalendar/js/main.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="assets/plugins/schedule/dist/jquery.schedule.js"></script>
<script src="assets/js/index.js"></script>

<script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ40liRNz-T7DuMca_5BP3KH02-owTWJM&libraries=places,geometry&callback=initMap"
    async defer></script>
{{--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsKPIY5WKthvOAhKju1mU4vKBEBHAR_ws&libraries=geometry&callback=initMap"--}}
{{--    async defer></script>--}}

<!--app JS-->


<script>
    function confirmDelete(event) {
      event.preventDefault(); // Cancel the default link behavior

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = event.target.href; // Proceed with the link action
        }
      });

    }
  </script>
@yield('scripts')

<script>

    $(document).ready(function () {
        $('#example').DataTable();

        // $('#example').DataTable();
    });

    $(window).on('load', function () {
        $('.preloader').fadeOut('slow');
        // $('.wrapper').fadeIn('slow');
        $('.wrapper').removeClass('d-none');
    });
</script>
<script src="assets/js/app.js"></script>
</body>
</html>

{{--    AIzaSyDF3aj5xiKr4Z9POwAehwPGDed10z3zlUs--}}

