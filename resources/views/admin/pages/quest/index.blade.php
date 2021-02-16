@extends('admin.layouts.app')
@section('title','Manage Quest')
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     All Quests</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>

	</div>

@endsection

@section('amdmin_content')
	<a class="btn btn-primary btn-sm text-white pull-right" type="button" data-toggle="modal" data-target="#addNewQuest"><i class="fa fa-plus"></i> Add Quest</a>
	<br><br>
	<div class="row">
			<div class="col-sm-12">
			  <div class="card">
			    <div class="card-body">
			      <div class="table-responsive">
			        <table class="row-border" id="all-quest-table">
			          <thead>
			            <tr>
			              <th>Title</th>
			              <th>Cover Picture</th>
			              <th>Status</th>
			              <th>Type</th>
			              <th>Fetured</th>
			              <th>Action</th>
			            
			            </tr>
			          </thead>
			          <tbody>
			          @foreach ($quests as $quest)
			            <tr>
			             <td>{{$quest->title}}</td>
			              <td><img src="{{ asset($quest->cover_picture) }}" style="width: 200px;height: 100px;border-radius: 8px"></td>
			              <td>
			              	<div class="media-body text-left icon-state">
		                          <label class="switch " >
		                            <input class="changeQueestStatus" type="checkbox" {{$quest->status==1 ? 'checked' : ''}} data-target="{{$quest->id}}" data-action="{{ route('quest.status') }}">
		                            <span class="switch-state bg-secondary"></span>
		                          </label>
		                     </div>
			              </td>
			              <td><a class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#changeQuestType{{$quest->id}}">Type</a></td>
			              <td>
			              	<div class="media-body text-left icon-state">
		                          <label class="switch " >
		                            <input class="changeQueestFeature" type="checkbox" {{$quest->is_featured==1 ? 'checked' : ''}} data-target="{{$quest->id}}" data-action="{{ route('quest.feature') }}">
		                            <span class="switch-state bg-info"></span>
		                          </label>
		                     </div>
			              </td>
			              
			              <td>
			              	<a class="btn btn-success btn-sm text-white" href="{{ route('quest.detail',$quest->id) }}"><i class="fa fa-eye"></i> View</a>
			              	<a class="btn btn-danger btn-sm text-white" href="{{ route('quest.delete',$quest->id) }}" id="deleteitem"><i class="fa fa-trash"></i> Delete</a>
			              </td>
			            </tr>


			                <div class="modal fade" id="changeQuestType{{$quest->id}}" tabindex="-1" role="dialog" aria-hidden="true">
			                <div class="modal-dialog" role="document">
			                  <div class="modal-content">
			                    <div class="modal-header">
			                      <h5 class="modal-title">Update Type</h5>
			                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			                    </div>
			                    <div class="modal-body">
			                    	<form action="{{ route('quest.type') }}" method="POST">
			                    		@csrf
			                    		<input type="hidden" name="id" value="{{$quest->id}}">
			                    		<div class="col-sm-12">
			                    		  <div class="media">
			                    		    <label class="col-form-label m-r-10">Social Links</label>
			                    		    <div class="media-body text-right icon-state">
			                    		      <label class="switch">
			                    		        <input type="radio" {{$quest->type==1 ? 'checked' : ''}} value="1" name="type"><span class="switch-state bg-primary" ></span>
			                    		      </label>
			                    		    </div>
			                    		  </div>
			                    		  <div class="media">
			                    		    <label class="col-form-label m-r-10">Likes</label>
			                    		    <div class="media-body text-right icon-state">
			                    		      <label class="switch">
			                    		        <input type="radio"  {{$quest->type==2 ? 'checked' : ''}} value="2" name="type"><span class="switch-state bg-secondary"></span>
			                    		      </label>
			                    		    </div>
			                    		  </div>
			                    		  <div class="media">
			                    		    <label class="col-form-label m-r-10">Profile Info</label>
			                    		    <div class="media-body text-right icon-state">
			                    		      <label class="switch">
			                    		        <input type="radio" {{$quest->type==3 ? 'checked' : ''}} value="3" name="type"><span class="switch-state bg-success"></span>
			                    		      </label>
			                    		    </div>
			                    		  </div>
			                    		  <div class="media">
			                    		    <label class="col-form-label m-r-10">Product</label>
			                    		    <div class="media-body text-right icon-state">
			                    		      <label class="switch">
			                    		        <input type="radio" {{$quest->type==4 ? 'checked' : ''}} value="4" name="type"><span class="switch-state bg-info"></span>
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
			             <th>Title</th>
			             <th>Cover Picture</th>
			             <th>Status</th>
			             <th>Type</th>
			             <th>Fetured</th>
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
		$('#all-quest-table').DataTable();
	</script>
@endsection
@section('all_modal')
      <div class="modal fade" id="addNewQuest" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Quest</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
          	<form action="{{ route('quest.store') }}" method="POST" enctype="multipart/form-data">
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
          			  <label class="col-form-label">Type</label>
          			  <select class="form-control form-control-primary btn-square" name="type">

          			        <option value="1">Social Links</option>
          			        <option value="2">Likes</option>
          			        <option value="3" >Profile Info</option>
          			        <option value="4" >Product</option>
          			    </select>
          			  
          			</div>
          			<div class="form-group">
          			  <label class="col-form-label">Cover Image</label><br>
          			  <input type="file" name="cover_picture" class="dropify" required="">
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