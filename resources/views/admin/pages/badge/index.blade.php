@extends('admin.layouts.app')
@section('title','Manage Badge')
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     All Badge</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>

	</div>

@endsection

@section('amdmin_content')
	<a class="btn btn-primary btn-sm text-white pull-right" type="button" data-toggle="modal" data-target="#addNewBadge"><i class="fa fa-plus"></i> Add Badge</a>
	<br><br>
	<div class="row">
			<div class="col-sm-12">
			  <div class="card">
			    <div class="card-body">
			      <div class="table-responsive">
			        <table class="row-border" id="all-badge-table">
			          <thead>
			            <tr>
			              <th>Icon</th>
			              <th>Title</th>
			              <th>Description</th>
			              <th>Quantity</th>
			              <th>Credit</th>
			              <th>Stataus</th>
			              <th>Action</th>
			            
			            </tr>
			          </thead>
			          <tbody>
			          @foreach ($badges as $badge)
			            <tr>
			            <td><img src="{{ asset($badge->icon) }}" style="width: 80px;height: 50px;border-radius: 8px"></td>
			             <td>{{$badge->title}}</td>
			             
			              <td>
			              	{!! $badge->description!!}
			              </td>
			             
			              <td>
			              		{{$badge->qty}}
			              </td>

			              <td>
			              		{{$badge->credit}}
			              </td>

			              <td>
			              		<div class="media-body text-left icon-state">
		                          <label class="switch " >
		                            <input class="changebadgeStatus" type="checkbox" {{$badge->status==1 ? 'checked' : ''}} data-target="{{$badge->id}}" data-action="{{ route('badge.status') }}">
		                            <span class="switch-state bg-secondary"></span>
		                          </label>
		                     </div>
			              </td>
			              <td>
			              	<a class="btn btn-info btn-sm text-white mb-1" data-toggle="modal" data-target="#editBadge{{$badge->id}}"><i class="fa fa-edit"></i></a>
			              	<a class="btn btn-danger btn-sm text-white" href="{{ route('badge.delete',$badge->id) }}" id="deleteitem"><i class="fa fa-trash"></i></a>
			              </td>
			            </tr>


			               {{-- modal --}}

			                   <div class="modal fade" id="editBadge{{$badge->id}}" tabindex="-1" role="dialog" aria-hidden="true">
			                   <div class="modal-dialog" role="document">
			                     <div class="modal-content">
			                       <div class="modal-header">
			                         <h5 class="modal-title">Update Badge</h5>
			                         <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			                       </div>
			                       <div class="modal-body">
			                       	<form action="{{ route('badge.update') }}" method="POST" enctype="multipart/form-data">
			                       		@csrf
			                       		<input type="hidden" name="id" value="{{$badge->id}}">
			                       		<div class="col-sm-12">
			                       			<div class="form-group">
			                       			  <label class="col-form-label">Title</label>
			                       			  <input class="form-control" name="title" type="text" required="" value="{{$badge->title}}">
			                       			</div>

			                       			<div class="form-group">
			                       			  <label class="col-form-label">Quantity</label>
			                       			  <input class="form-control" name="qty" type="number" required="" value="{{$badge->qty}}">
			                       			</div>

			                       			<div class="form-group">
			                       			  <label class="col-form-label">Credit</label>
			                       			  <input class="form-control" name="credit" type="number" required="" value="{{$badge->credit}}">
			                       			</div>
			                       			<div class="form-group">
			                       			  <label class="col-form-label">Description</label>
			                       			  <textarea name="description" rows="5" cols="50" class="form-control">{{$badge->description}}</textarea>
			                       			</div>

			                       			<div class="form-group">
			                       			  <label class="col-form-label">Icon Image</label><br>
			                       			  <input type="file" name="icon" class="dropify">
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

			                
			          @endforeach
			          </tbody>
			          <tfoot>
			            <tr>
				            <th>Icon</th>
				            <th>Title</th>
				            <th>Description</th>
				            <th>Quantity</th>
				            <th>Credit</th>
				            <th>Stataus</th>
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
		$('#all-badge-table').DataTable();
	</script>
@endsection
@section('all_modal')
      <div class="modal fade" id="addNewBadge" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Badge</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
          	<form action="{{ route('badge.store') }}" method="POST" enctype="multipart/form-data">
          		@csrf
          		<div class="col-sm-12">
          			<div class="form-group">
          			  <label class="col-form-label">Title</label>
          			  <input class="form-control" name="title" type="text" required="">
          			</div>

          			<div class="form-group">
          			  <label class="col-form-label">Quantity</label>
          			  <input class="form-control" name="qty" type="number" required="">
          			</div>

          			<div class="form-group">
          			  <label class="col-form-label">Credit</label>
          			  <input class="form-control" name="credit" type="number" required="">
          			</div>
          			<div class="form-group">
          			  <label class="col-form-label">Description</label>
          			  <textarea name="description" rows="5" cols="50" class="form-control"></textarea>
          			</div>
          			<div class="form-group">
          			  <label class="col-form-label">Icon Image</label><br>
          			  <input type="file" name="icon" class="dropify">
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