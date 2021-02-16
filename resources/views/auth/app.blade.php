<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- bootstrap 4.3.1 -->
  <link rel="stylesheet" href="{{ asset('front/css/vendor/bootstrap.min.css') }}">
  <!-- styles -->
  <link rel="stylesheet" href="{{ asset('front/css/styles.min.css')}}">
 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- favicon -->
  <link rel="stylesheet" href="{{ asset('front/style/css/toastr.css')}}">
  <link rel="icon" href="{{ asset('front/img/favicon.ico')}}">
  <title>@yield('log_title')</title>
</head>
<body>

  <!-- LANDING -->
  <div class="landing">
    <!-- LANDING DECORATION -->
    <div class="landing-decoration"></div>
    <!-- /LANDING DECORATION -->

    <!-- LANDING INFO -->
   @section('login_main')
   @show
    <!-- /LANDING FORM -->
  </div>
  <!-- /LANDING -->

<!-- app -->
<script src="{{ asset('front/style/js/jquery.js')}}"></script>
<script src="{{ asset('front/js/utils/app.js')}}"></script>
<!-- XM_Plugins -->
<script src="{{ asset('front/js/vendor/xm_plugins.min.js')}}"></script>
<!-- form.utils -->
<script src="{{ asset('front/js/form/form.utils.js')}}"></script>
<!-- landing.tabs -->
<script src="{{ asset('front/js/landing/landing.tabs.js')}}"></script>
<!-- SVG icons -->
<script src="{{ asset('front/js/utils/svg-loader.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('front/style/js/toastr.js')}}"></script>
 @include('auth.template.toastr_sweet')
<script src="{{ asset('front/style/js/custom.js')}}"></script>

</body>
</html>