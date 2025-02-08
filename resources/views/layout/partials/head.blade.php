

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('build/css/bootstrap.min.css') }}">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{ asset('build/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('build/plugins/fontawesome/css/all.min.css') }}">

<!-- Feathericon CSS -->
<link rel="stylesheet" href="{{ asset('build/css/feather.css') }}">

<!-- Datatable CSS -->
<link rel="stylesheet" href="{{ asset('build/css/dataTables.bootstrap5.min.css') }}">

@if (Route::is(['sales-dashboard']))
    <!-- Map CSS -->
    <link rel="stylesheet" href="{{ asset('build/plugins/jvectormap/jquery-jvectormap-2.0.5.css') }}">
@endif

@if (Route::is(['calendar']))
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
@endif

<script src="{{ URL::asset('/build/js/theme-script.js') }}"></script>

 @if (Route::is(['ui-rangeslider']))
     <!-- Rangeslider CSS -->
     <link rel="stylesheet" href="{{ url('build/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
 @endif

 <!-- Main CSS -->
 <link rel="stylesheet" href="{{ url('build/css/style.css') }}">
 <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>

 @if (Route::is(['email-templates']))
 <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
 @endif