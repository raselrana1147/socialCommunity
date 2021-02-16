
@if (Session::has('send_message'))
   <div class="alert alert-success"><i class="fa fa-exclamation-triangle"></i>{{Session::get('send_message')}}</div>
@endif