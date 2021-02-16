@if (Session::has('verify_error_message'))
   <div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> {{Session::get('verify_error_message')}}</div>
@endif
@if (Session::has('verify_success_message'))
   <div class="alert alert-success"><i class="fa fa-exclamation-triangle"></i> {{Session::get('verify_success_message')}}</div>
@endif