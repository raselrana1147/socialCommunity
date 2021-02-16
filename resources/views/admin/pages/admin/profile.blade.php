@extends('admin.layouts.app')
@section('title','My Profile')
@section('extra_css')
@endsection
@section('extra_script')
	
@endsection
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     My Profile</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>
	</div>
@endsection
@section('amdmin_content')
	<div class="edit-profile">
		@php
			$admin=Auth::guard('admin')->user();
		@endphp
	  <div class="row">
	    <div class="col-lg-4">
	      <div class="card">
	        <div class="card-header">
	          <h4 class="card-title mb-0">My Profile</h4>
	          <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
	        </div>
	        <div class="card-body">
	          <form action="{{ route('admin.change.password') }}" method="POST">
	          	@csrf
	          	<input type="hidden" name="id" value="{{$admin->id}}">
	            <div class="row mb-2">
	              <div class="col-auto" type="button" data-toggle="modal" data-target="#chnageAdminAvatar">

	              	<img class="img-70 rounded-circle" alt="" src="{{((Auth::guard('admin')->user()->avatar !=null) ? asset('/assets/admin/style/image/admin/'.Auth::guard('admin')->user()->avatar) : asset('assets/admin/style/image/admin/profile.png')) }}"data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Profile Photo">
	              </div>
	              <div class="col">
	                <h3 class="mb-1">{{$admin->name}}</h3>
	              </div>
	            </div>
	            
	            <div class="form-group mb-3">
	              <label class="form-label">Current Password</label>
	              <input class="form-control" type="password" required="" name="current_password">
	            </div>

	            <div class="form-group mb-3">
	              <label class="form-label">New Password</label>
	              <input class="form-control" type="password" required="" name="new_password">
	            </div>

	            <div class="form-group mb-3">
	              <label class="form-label">Confirm Password</label>
	              <input class="form-control" type="password" required="" name="password_confirmation">
	            </div>

	            <div class="form-footer">
	              <button class="btn btn-primary btn-block">Save</button>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	    <div class="col-lg-8">
	      <form class="card" action="{{ route('admin.profile.update') }}" method="post">
	      	@csrf
	      	<input type="hidden" name="id" value="{{$admin->id}}">
	        <div class="card-header">
	          <h4 class="card-title mb-0">Edit Profile</h4>
	          <div class="card-options"><a class="card-options-collapse" href="#" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-toggle="card-remove"><i class="fe fe-x"></i></a></div>
	        </div>
	        <div class="card-body">
	          <div class="row">
	            <div class="col-md-5">
	              <div class="form-group mb-3">
	                <label class="form-label">Name</label>
	                <input class="form-control" type="text" value="{{$admin->name}}" name="name">
	              </div>
	            </div>
	           
	            <div class="col-sm-6 col-md-4">
	              <div class="form-group mb-3">
	                <label class="form-label">Email</label>
	                <input class="form-control" type="email" value="{{$admin->email}}" name="email">
	              </div>
	            </div>
	            <div class="col-md-12">
	              <div class="form-group mb-3">
	                <label class="form-label">Address</label>
	                <input class="form-control" type="text" name="address" value="{{$admin->address}}">
	              </div>
	            </div>
	            
	            <div class="col-md-12">
	              <div class="form-group mb-3 mb-0">
	                <label class="form-label">About Me</label>
	                <textarea class="form-control" rows="5" name="description">{{$admin->description}}</textarea>
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="card-footer text-right">
	          <button class="btn btn-primary" type="submit">Update Profile</button>
	        </div>
	      </form>
	    </div>
	   
	  </div>
	</div>

	    <div class="modal fade" id="chnageAdminAvatar" tabindex="-1" role="dialog" aria-hidden="true">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title">Change Avatar</h5>
	          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	        </div>
	        <div class="modal-body">
	        	<form action="{{ route('admin.avatar.update') }}" method="POST" enctype="multipart/form-data">
	        		@csrf
	        		<input type="hidden" name="id" value="{{$admin->id}}">
	        		<div class="col-sm-12">
	        		  <div class="media">
	        		    <div class="media-body text-right icon-state">
	        		      <div class="form-row">
	        		       <input type="file" class="dropify" data-default-file="" name="avatar" />
	        		      </div><br>
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

@endsection

	  