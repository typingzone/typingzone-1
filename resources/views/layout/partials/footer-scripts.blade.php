
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif

@if (session('info'))
    <script>
        toastr.info("{{ session('info') }}");
    </script>
@endif

@if (session('warning'))
    <script>
        toastr.warning("{{ session('warning') }}");
    </script>
@endif

@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif

 <!-- Feather Icon JS -->
 <script src="{{ URL::asset('/build/js/feather.min.js') }}"></script>

 <!-- Slimscroll JS -->
 <script src="{{ URL::asset('/build/js/jquery.slimscroll.min.js') }}"></script>

 <!-- Bootstrap Core JS -->
 <script src="{{ URL::asset('/build/js/bootstrap.bundle.min.js') }}"></script>

 @if (Route::is(['todo']))
     <!-- Datetimepicker CSS -->
     <script src="{{ URL::asset('/build/plugins/moment/moment.min.js') }}"></script>
 @endif

 <!-- Datatable JS -->
 <script src="{{ URL::asset('/build/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ URL::asset('/build/js/dataTables.bootstrap5.min.js') }}"></script>

 <!-- Sticky-sidebar -->
 <script src="{{ URL::asset('/build/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
 <script src="{{ URL::asset('/build/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

 @if (Route::is('calendar'))
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js"></script>
 @endif

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <!-- Custom JS -->
 <script src="{{ URL::asset('/build/js/script.js') }}"></script>

 @if (Route::is('email-templates'))
<script>
    const quillAdd = new Quill('#template-email-body', {
        theme: 'snow'
    });
    const quillEdit = new Quill('#edit-template-email-body', {
        theme: 'snow'
    });
</script>
@endif
