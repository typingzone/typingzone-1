<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<<<<<<< HEAD
    <meta name="description" content="TrackLog is an all-in-one platform for typing centers to manage applications, documents, and expenses effortlessly. Streamline your workflow, track document expiries, and monitor financials with ease.">
    <meta name="keywords" content="TrackLog, typing center management, document tracking, expense management, application processing, document expiry reminders, workflow management, typing services, business management software">
    <meta name="author" content="TrackLog">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - TrackLog</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/build/img/favicon.png')}}">

    @include('layout.partials.head')
</head>

=======
    <meta name="description" content="TypingZone is an all-in-one platform for typing centers to manage applications, documents, and expenses effortlessly. Streamline your workflow, track document expiries, and monitor financials with ease.">
    <meta name="keywords" content="TypingZone, typing center management, document tracking, expense management, application processing, document expiry reminders, workflow management, typing services, business management software">
    <meta name="author" content="TypingZone">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>{{ ucwords(str_replace(['-', '_'], ' ', basename(Request::path()))) }} - TypingZone</title>
   
    @php $company = \App\Models\Company::first(); @endphp
    <link rel="shortcut icon" type="image/x-icon" href="{{ $company && $company->company_icon ? asset('storage/' . $company->company_icon) : asset('/build/img/logo-small.jpeg') }}">
    @include('layout.partials.head')
</head>
<style>
    .custom-badge {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 20px;
    text-align: center;
}
</style>
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0

@if (!Route::is(['chat', 'under-maintenance', 'coming-soon', 'error-404', 'error-500','two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3']))

    <body>
@endif
@if (Route::is(['under-maintenance', 'coming-soon', 'error-404', 'error-500']))

    <body class="error-page">
@endif
@if (Route::is(['two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3']))

    <body class="account-page">
@endif
@component('components.loader')
@endcomponent
<!-- Main Wrapper -->
@if (!Route::is(['lock-screen']))
    <div class="main-wrapper">
@endif
@if (Route::is(['lock-screen']))
    <div class="main-wrapper login-body">
@endif
@if (!Route::is(['under-maintenance', 'coming-soon','error-404','error-500','two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3','lock-screen']))
<<<<<<< HEAD
    @include('layout.partials.header')
@endif
@if (!Route::is(['pos', 'under-maintenance', 'coming-soon','error-404','error-500','two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3','lock-screen']))
    @include('layout.partials.sidebar')
    @include('layout.partials.collapsed-sidebar')
    @include('layout.partials.horizontal-sidebar')
=======
    @if(auth()->user())
        @include('layout.partials.header')
    @endif

@endif
@if (!Route::is(['pos', 'under-maintenance', 'coming-soon','error-404','error-500','two-step-verification-3','two-step-verification-2','two-step-verification','email-verification-3','email-verification-2','email-verification','reset-password-3','reset-password-2','reset-password','forgot-password-3','forgot-password-2','forgot-password','register-3','register-2','register','signin-3','signin-2','signin','success','success-2','success-3','lock-screen']))
    @if(auth()->user())
        @include('layout.partials.sidebar')
        @include('layout.partials.collapsed-sidebar')
        @include('layout.partials.horizontal-sidebar')
        @include('layout.partials.pusher-script')
    @endif
>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
@endif
@yield('content')
</div>
<!-- /Main Wrapper -->
<<<<<<< HEAD
@include('layout.partials.theme-settings')
@component('components.modalpopup')
@endcomponent
@include('layout.partials.footer-scripts')
=======
@if(!Route::is(['login']))
    @include('layout.partials.theme-settings')
@endif
@component('components.modalpopup')
@endcomponent
@include('layout.partials.footer-scripts')

>>>>>>> 023abcbfc092666fd811ecc2b6e7e0a49bdf5ac0
</body>

</html>
