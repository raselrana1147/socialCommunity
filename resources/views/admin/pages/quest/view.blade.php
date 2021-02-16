@extends('admin.layouts.app')
@section('title','Details Quest')
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     Details Quest</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>

	</div>

@endsection
@section('amdmin_content')
	
<div class="row">
  <div class="col-xl-9 xl-60">
    <div class="blog-single">
      <h4>Cover Photo</h4>
      <div class="blog-box blog-details"><img class="img-fluid w-100" src="{{asset($quest->cover_picture)}}" alt="blog-main">
      	
        <div class="blog-details">
        	
         <h4>Description</h4>
          <div class="single-blog-content-top">
            <p>{{$quest->description}}</p>
          
          </div>
        </div>
      </div>
    </div>

   
  </div>
  <div class="col-xl-3 xl-40">
  	   <a class="btn btn-info btn-sm text-white mb-2" data-toggle="modal" data-target="#updatequestBasic"><i class="fa fa-edit"></i> Update</a>
    <div class="default-according style-1 faq-accordion job-accordion" id="accordionoc">

      <div class="row">
        <div class="col-xl-12">

          <div class="card">

            <div class="card-header">
              <h5 class="mb-0">

                <button class="btn btn-link pl-0">Basic Information</button>
              </h5>
            </div>
            <div class="collapse show" id="collapseicon" aria-labelledby="collapseicon" data-parent="#accordion">
              <div class="card-body filter-cards-view animate-chk">
                
                <div class="checkbox-animated">
                  <div class="learning-header"><span class="f-w-600">Title</span><span style="margin-left: 40px;">{{$quest->title}}</span></div>
                  <div class="learning-header"><span class="f-w-600">Quantity</span><span style="margin-left: 40px;">{{$quest->qty}}</span></div>
                 <div class="learning-header"><span class="f-w-600">Credit</span><span style="margin-left: 40px;">{{$quest->credit}}</span></div>
                 <div class="learning-header"><span class="f-w-600">Icon</span><span style="margin-left: 40px;"><img src="{{asset($quest->icon)}}" style="width: 80px;height: 80px;"></span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
       
      </div>
    </div>
  </div>
</div>
@endsection



@section('all_modal')
    <div class="modal fade" id="updatequestBasic" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Quest</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
        	<form action="{{ route('quest.update') }}" method="POST" enctype="multipart/form-data">
        		@csrf
        		<input type="hidden" name="id" value="{{$quest->id}}">
        		<div class="col-sm-12">
        			<div class="form-group">
        			  <label class="col-form-label">Title</label>
        			  <input class="form-control" name="title" type="text" required="" value="{{$quest->title}}">
        			</div>

        			<div class="form-group">
        			  <label class="col-form-label">Quantity</label>
        			  <input class="form-control" name="qty" type="number" required="" value="{{$quest->qty}}">
        			</div>

        			<div class="form-group">
        			  <label class="col-form-label">Credit</label>
        			  <input class="form-control" name="credit" type="number" required="" value="{{$quest->credit}}">
        			</div>
        			<div class="form-group">
        			  <label class="col-form-label">Description</label>
        			  <textarea name="description" rows="5" cols="50" class="form-control">{{$quest->description}}</textarea>
        			</div>
        			<div class="form-group">
        			  <label class="col-form-label">Cover Image</label><br>
        			  <input type="file" name="cover_picture" class="dropify">
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