@extends('admin.layouts.app')
@section('title','Manage Location')
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     All Locations</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>

	</div>

@endsection

@section('amdmin_content')
	<a class="btn btn-primary btn-sm text-white pull-right" type="button" data-toggle="modal" data-target="#addLocation"><i class="fa fa-plus"></i> Add Location</a>
	<br><br>
	<div class="row">
			<div class="col-sm-12">
			
			  <div class="card">
			    <div class="card-body">
			      <div class="table-responsive">
			        <table class="row-border" id="all-location-table">
			          <thead>
			            <tr>
			              <th>#Serial</th>
			               <th>Name</th>
			              <th>Status</th>
			              <th>Action</th>
			            
			            </tr>
			          </thead>
			          <tbody>
			          @foreach ($locations as $location)
			            <tr>
			             <td>#{{$loop->index+1}}</td>
			              <td>{{$location->location}}</td>
			              <td>
			              	<div class="media-body text-left icon-state">
		                          <label class="switch " >
		                            <input class="changeLocationStatus" type="checkbox" {{$location->status==1 ? 'checked' : ''}} locaId="{{$location->id}}" data-action="{{ route('location.status') }}">
		                            <span class="switch-state bg-secondary"></span>
		                          </label>
		                     </div>
		                 </td>
			              <td>
			              	<a class="btn btn-primary btn-sm text-white" type="button" data-toggle="modal" data-target="#updateLocation{{$location->id}}"><i class="fa fa-pencil"></i> Edit</a>
			              	<a class="btn btn-danger  btn-sm" href="{{ route('location.delete',$location->id) }}" id="deleteitem"><i class="fa fa-trash"></i>Delete</a>
			              </td>
			            </tr>

			           {{--  modal-dialog --}}
			                <div class="modal fade" id="updateLocation{{$location->id}}" tabindex="-1" role="dialog" aria-hidden="true">
			                <div class="modal-dialog" role="document">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <h5 class="modal-title">Update Location</h5>
			                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			                    </div>
			                    <div class="modal-body">
			                    	<form action="{{ route('location.update') }}" method="POST">
			                    		@csrf
			         					<input type="hidden" name="id" value="{{$location->id}}">
			                    		<div class="col-sm-12">
			                    			<div class="form-group">
			                    			  <label class="col-form-label">Location Name</label>
			                    			  <input class="form-control" name="location" type="text" value="{{$location->location}}" required="">

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
			              <th>#Serial</th>
			              <th>Name</th>
			              <th>Status</th>
			              <th>Action</th>
			            </tr>
			          </tfoot>
			        </table>
			      </div>
			    </div>
			  </div>

			</div>
	</div>
	

@endsection


@section("extra_script")
	<script >
		$('#all-location-table').DataTable();
	</script>
@endsection
@section('all_modal')
    <div class="modal fade" id="addLocation" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Location</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        	<form action="{{ route('location.store') }}" method="POST">
        		@csrf
        		<div class="col-sm-12">
        			<div class="form-group">
        			  <label class="col-form-label">Location Name</label>
        			  <input class="form-control" name="location" type="text" required="">

        			</div>
        		   <button class="btn btn-info" type="submit">Save</button>
        		
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