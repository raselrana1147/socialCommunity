    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(
          document.getElementById('map'),
          {center: new google.maps.LatLng(-33.91700, 151.233), zoom: 18});
      
        var iconBase =
          '{{asset('assets/admin/assets/images/dashboard-2/')}}';
      
        var icons = {
          userbig: {
            icon: iconBase + '1.png'
          },
          library: {
            icon: iconBase + '3.png'
          },
          info: {
            icon: iconBase + '2.png'
          }
        };
      
        var features = [
          {
            position: new google.maps.LatLng(-33.91752, 151.23270),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91700, 151.23280),
            type: 'userbig'
          },  {
            position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
            type: 'library'
          }
        ];
      
        // Create markers.
        for (var i = 0; i < features.length; i++) {
          var marker = new google.maps.Marker({
            position: features[i].position,
            icon: icons[features[i].type].icon,
            map: map
          });
        };
      }
    </script>
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw&amp;callback=initMap"></script>
  </div>
</div>
<!-- latest jquery-->
<script src="{{asset('assets/admin/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('assets/admin/assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/bootstrap/bootstrap.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('assets/admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('assets/admin/assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{asset('assets/admin/assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/prism/prism.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/clipboard/clipboard.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/custom-card/custom-card.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/dashboard/dashboard_2.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/tooltip-init.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/script.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/assets/js/theme-customizer/customizer.js')}}"></script>
<script src="{{asset('node_modules/dropify/dist/js/dropify.js')}}"></script>
<script src="{{asset('assets/admin/style/js/toastr.js')}}"></script>
<script src="{{asset('assets/admin/style/js/sweet.js')}}"></script>

@include('admin.layouts.inc.toastr_sweet')
 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
<script src="{{asset('assets/admin/style/js/custom.js')}}"></script>
@yield('extra_script')