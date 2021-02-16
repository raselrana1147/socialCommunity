@extends('admin.layouts.app')
@section('title','Admin Users')
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     All Users</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>
	</div>
@endsection
@section('amdmin_content')
	<div class="col-sm-12">
	  <div class="card">
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="row-border" id="all-users-table">
	          <thead>
	            <tr>
	              <th>Name</th>
	              <th>Avatar</th>
	              <th>Details</th>
	              <th>Status</th>
	              <th>Member Since</th>
	            </tr>
	          </thead>
	          <tbody>
	          @foreach ($users as $user)
	            <tr>
	              <td>{{$user->name !=null ? $user->name:$user->username}}</td>
	              <td><img class="user-avatar"src="{{$user->avatar !=null ?  asset('front/image/user/avatar/'.$user->avatar): asset('front/image/user/profile.jpg')}}"></td>
	              <td><a href="{{ route('admin.user.detail',$user->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Details</a></td>
	               <td><a type="button" data-toggle="modal" data-target="#updateStatus{{$user->id}}" class="btn btn-danger text-white"><i class="fa fa-edit"></i> Status</a></td>
	               
	              <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
	            </tr>

	                <div class="modal fade" id="updateStatus{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
	                <div class="modal-dialog" role="document">
	                  <div class="modal-content">
	                    <div class="modal-header">
	                      <h5 class="modal-title">Update Status</h5>
	                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                    </div>
	                    <div class="modal-body">
	                    	<form action="{{ route('admin.user.status.information') }}" method="POST">
	                    		@csrf
	                    		<input type="hidden" name="id" value="{{$user->id}}">
	                    		<div class="col-sm-12">
	                    		  <div class="media">
	                    		    <label class="col-form-label m-r-10">Pending</label>
	                    		    <div class="media-body text-right icon-state">
	                    		      <label class="switch">
	                    		        <input type="radio" {{$user->status==1 ? 'checked' : ''}} value="1" name="status"><span class="switch-state bg-primary" ></span>
	                    		      </label>
	                    		    </div>
	                    		  </div>
	                    		  <div class="media">
	                    		    <label class="col-form-label m-r-10">Active</label>
	                    		    <div class="media-body text-right icon-state">
	                    		      <label class="switch">
	                    		        <input type="radio"  {{$user->status==2 ? 'checked' : ''}} value="2" name="status"><span class="switch-state bg-secondary"></span>
	                    		      </label>
	                    		    </div>
	                    		  </div>
	                    		  <div class="media">
	                    		    <label class="col-form-label m-r-10">Inactive</label>
	                    		    <div class="media-body text-right icon-state">
	                    		      <label class="switch">
	                    		        <input type="radio" {{$user->status==3 ? 'checked' : ''}} value="3" name="status"><span class="switch-state bg-success"></span>
	                    		      </label>
	                    		    </div>
	                    		  </div>
	                    		  <div class="media">
	                    		    <label class="col-form-label m-r-10">Loacked</label>
	                    		    <div class="media-body text-right icon-state">
	                    		      <label class="switch">
	                    		        <input type="radio" {{$user->status==4 ? 'checked' : ''}} value="4" name="status"><span class="switch-state bg-info"></span>
	                    		      </label>
	                    		    </div>
	                    		  </div>
	                    		  <div class="media">
	                    		    <label class="col-form-label m-r-10">Suspend</label>
	                    		    <div class="media-body text-right icon-state">
	                    		      <label class="switch">
	                    		        <input type="radio" {{$user->status==5 ? 'checked' : ''}} value="5" name="status"><span class="switch-state bg-warning"></span>
	                    		      </label>
	                    		    </div>
	                    		  </div>
	                    		   <button class="btn btn-info" type="submit">Save Changes</button>
	                    		
	                    		</div>
	                    	</form>

	                    </div>
	                    <div class="modal-footer">
	                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
	                  </div>
	                </div>
	              </div>
	            </div>
	          @endforeach
	          </tbody>
	          <tfoot>
	            <tr>
	              <th>Name</th>
	              <th>Avatar</th>
	              <th>Details</th>
	              <th>Status</th>
	              <th>Member Since</th>
	            </tr>
	          </tfoot>
	        </table>
	      </div>
	    </div>
	  </div>
	</div>

@endsection


@section("extra_script")
	<script >
		$('#all-users-table').DataTable();
	</script>
@endsection