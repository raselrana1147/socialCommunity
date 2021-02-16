<!-- app -->
<script src="{{asset('front/style/js/jquery.js')}}"></script>
<script src="{{asset('front/js/utils/app.js')}}"></script>
<!-- page loader -->
<script src="{{asset('front/js/utils/page-loader.js')}}"></script>
<!-- simplebar -->
<script src="{{asset('front/js/vendor/simplebar.min.js')}}"></script>
<!-- liquidify -->
<script src="{{asset('front/js/utils/liquidify.js')}}"></script>
<!-- XM_Plugins -->
<script src="{{asset('front/js/vendor/xm_plugins.min.js')}}"></script>
<!-- tiny-slider -->
<script src="{{asset('front/js/vendor/tiny-slider.min.js')}}"></script>
<!-- chartJS -->
<script src="{{asset('front/js/vendor/Chart.bundle.min.js')}}"></script>
<!-- global.hexagons -->
<script src="{{asset('front/js/global/global.hexagons.js')}}"></script>
<!-- global.tooltips -->
<script src="{{asset('front/js/global/global.tooltips.js')}}"></script>
<!-- global.accordions -->
<script src="{{asset('front/js/global/global.accordions.js')}}"></script>
<!-- global.popups -->
<script src="{{asset('front/js/global/global.popups.js')}}"></script>
<!-- global.charts -->
<script src="{{asset('front/js/global/global.charts.js')}}"></script>
<!-- header -->
<script src="{{asset('front/js/header/header.js')}}"></script>
<!-- sidebar -->
<script src="{{asset('front/js/sidebar/sidebar.js')}}"></script>
<!-- content -->
<script src="{{asset('front/js/content/content.js')}}"></script>
<!-- form.utils -->
<script src="{{asset('front/js/form/form.utils.js')}}"></script>
<!-- SVG icons -->
 <script src="{{asset('front/js/utils/svg-loader.js')}}"></script>
 <script src="{{asset('front/style/js/toastr.js')}}"></script>
 <script src="{{asset('front/style/js/sweet.js')}}"></script>
 <script src="{{asset('node_modules/dropify/dist/js/dropify.js')}}"></script>
 {{-- <?php echo URL::asset('assets/js/angular.min.js'); ?> --}}


 @include('layouts.inc.toastr_sweet')
 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
 <script src="{{asset('front/style/js/custom.js')}}" type="text/javascript"></script>
 @yield('scripts')