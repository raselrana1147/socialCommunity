@extends('admin.layouts.app')
@section('title','Manage Post')
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     All Posts</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>

	</div>

@endsection

@section('amdmin_content')
	<br><br>
	<div class="row">
			<div class="col-sm-12">
			  <div class="card">
			    <div class="card-body">
			      <div class="table-responsive">
			        <table class="row-border" id="all-post-table">
			          <thead>
			            <tr>
			              <th>Photo</th>
			              <th>Posted By</th>
			              <th>Posted At</th>
			              <th>Post Content</th>
			              <th>Status</th>
			              <th>Action</th>
			            
			            </tr>
			          </thead>
			          <tbody>
			          @foreach ($posts as $post)
			            <tr>
			            
			              <td>
			              	@if ($post->image!=null)
			              		<img src="{{ asset('front/image/post/'.$post->image) }}" style="width: 150px;height: 100px">
			              		@else
			              		<span class="badge badge-danger">No Image Upload</span>
			              	@endif
			              </td>
			              <td>{{$post->user->name}}</td>
			               <td>{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
			                <td><a class="btn btn-success btn-sm text-white" data-toggle="modal" data-target="#viewPost{{$post->id}}"><i class="fa fa-eye"></i> View Post</a></td>
			              <td>
			              	<div class="media-body text-left icon-state">
		                          <label class="switch " >
		                            <input class="changePostStatus" type="checkbox" {{$post->status==1 ? 'checked' : ''}} data-target="{{$post->id}}" data-action="{{ route('admin.post.status') }}">
		                            <span class="switch-state bg-secondary"></span>
		                          </label>
		                     </div>
			              </td>
			              <td>
			              
			              	<a class="btn btn-danger btn-sm text-white" href="{{ route('admin.post.delete',$post->id) }}" id="deleteitem"><i class="fa fa-trash"></i></a>
			              </td>
			            </tr>

			           {{--  view post --}}
			               <div class="modal fade" id="viewPost{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">View Post Details</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                          	@if ($post->image !=null)
                          			<img src="{{ asset('front/image/post/'.$post->image) }}" class="view-image">
                          	@endif
                           <h6>Post Content</h6>
                            <p class="text-justify">{!! $post->post_text !!}</p>
                            
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
			              <th>Photo</th>
			              <th>Posted By</th>
			              <th>Posted At</th>
			              <th>Post Content</th>
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
		$('#all-post-table').DataTable();
	</script>
@endsection
