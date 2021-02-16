@extends('admin.layouts.app')
@section('title','Details User')
@section('breadcrumb')
	<div class="col-6">
	  <h3>
	     Details View</h3>
	   <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="javascript:history.back();">Back</a></li>
	  </ol>
	</div>
@endsection
@section('amdmin_content')
	<div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="tab-content" id="top-tabContent">
                      <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="row">
                          <div class="col-xl-4 col-lg-6">
                            <div class="project-box">
                              <a type="button" data-toggle="modal" data-target="#updatePersonalInfo"><span class="badge badge-danger"><i class="fa fa-edit"></i></span></a>
                              <h6>Personal Information</h6>
                            
                              <div class="row details">

                              	@if ($user->name !=null)
                              	 <div class="col-4"><span>Name:</span></div>
                                 <div class="col-8 text-primary">{{$user->name}}</div>
                                @endif
                                <div class="col-4"> <span>Username</span></div>
                                <div class="col-8 text-primary">{{$user->username}}</div>
                                <div class="col-4"> <span>Email</span></div>
                                <div class="col-8 text-primary">{{$user->email}}</div>
                                @if ($user->phone !=null)
                                	<div class="col-4"> <span>Phone</span></div>
                                	<div class="col-8 text-primary">{{$user->phone}}</div>
                                @endif
                               
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-lg-6">
                            <div class="project-box">
                              <a type="button" data-toggle="modal" data-target="#updateBasicInfo"><span class="badge badge-danger"><i class="fa fa-edit"></i></span></a>
                          
                              <h6>Basic Information</h6>
                              <div class="row details">
                              	@if ($user->country !=null)
                              	 <div class="col-6"><span>Country:</span></div>
                                 <div class="col-6 text-primary">{{$user->country}}</div>
                                @endif
                                @if ($user->city !=null)
                                	<div class="col-6"> <span>City</span></div>
                                	<div class="col-6 text-primary">{{$user->city}}</div>
                                @endif

                                @if ($user->dob !=null)
                                	<div class="col-6"> <span>DOB</span></div>
                                	<div class="col-6 text-primary">{{$user->dob}}</div>
                                @endif

                                @if ($user->birth_place !=null)
                                	<div class="col-6"> <span>Birth Place</span></div>
                                	<div class="col-6 text-primary">{{$user->birth_place}}</div>
                                @endif


                                @if ($user->occupation !=null)
                                	<div class="col-6"> <span>Occupation</span></div>
                                	<div class="col-6 text-primary">{{$user->occupation}}</div>
                                @endif

                                @if ($user->website !=null)
                                	<div class="col-6"> <span>Website</span></div>
                                	<div class="col-6 text-primary">{{$user->website}}</div>
                                @endif

                            	<div class="col-6"> <span>Life Status</span></div>
                            	<div class="col-6 text-primary">{{App\helpers\Help::relationStatus($user->life_status)}}</div>
                             
                              </div>
                            </div>
                          </div>

                          <div class="col-xl-4 col-lg-6">
                            <div class="project-box">
                                <a type="button" data-toggle="modal" data-target="#updateBusinessInfo"><span class="badge badge-danger"><i class="fa fa-edit"></i></span></a>
                              <h6>Business Information</h6>
                              <div class="row details">
                         
                              	 <div class="col-6"><span>Affiliate:</span></div>
                                 <div class="col-6 text-primary">{{App\helpers\Help::affiliateStatus($user->is_affiliate)}}</div>
                               
                                @if ($user->affiliate_id !=null)
                                	<div class="col-6"> <span>Affilite ID</span></div>
                                	<div class="col-6 text-primary">{{$user->affiliate_id}}</div>
                                @endif

                            	<div class="col-6"> <span>Credit</span></div>
                            	<div class="col-6 text-primary">{{$user->credit}}</div>

                            	<div class="col-6"> <span>Balance</span></div>
                            	<div class="col-6 text-primary">{{number_format($user->balance,2)}} USD</div>

                            	@if ($user->payment_method !=null)
                            		<div class="col-6"> <span>Payment Method</span></div>
                            		<div class="col-6 text-primary">{{$user->payment_method}}</div>
                            	@endif

                            	@if ($user->payment_email !=null)
                            		<div class="col-6"> <span>Payment Email</span></div>
                            		<div class="col-6 text-primary">{{$user->payment_email}}</div>
                            	@endif

                            	@if ($user->parent_id !=null)
                            		<div class="col-6"> <span>Referred By</span></div>
                            		<div class="col-6 text-primary">{{$user->parent->username}}</div>
                            	@endif
                            	
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>
                         <div class="row">
                            <div class="col-xl-12 col-lg-12">
                              <div class="project-box">
                                  <a type="button" data-toggle="modal" data-target="#updateAboutlInfo"><span class="badge badge-danger"><i class="fa fa-edit"></i></span></a>
                                <h6>About User</h6>
                                <div class="row details">
                                  <div class="col-2"><span>Description</span></div>
                                  <div class="col-10 text-primary">{{$user->about}}</div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-xl-4 col-lg-6">
                            <div class="project-box">
                              <h6>Provided Reaction On Post</h6>
                              <div class="row details">
                       
                             	<div class="col-8"><span>Total Like React</span></div>
                                <div class="col-4 text-primary">{{$like}}</div>

                                <div class="col-8"><span>Total Dislike React</span></div>
                                <div class="col-4 text-primary">{{$dislike}}</div>

                                <div class="col-8"><span>Total Happy React</span></div>
                                <div class="col-4 text-primary">{{$happy}}</div>

                                <div class="col-8"><span>Total Funny React</span></div>
                                <div class="col-4 text-primary">{{$funny}}</div>

                                <div class="col-8"><span>Total Angry React</span></div>
                                <div class="col-4 text-primary">{{$angry}}</div>

                                 <div class="col-8"><span>Total Wow React</span></div>
                                 <div class="col-4 text-primary">{{$wow}}</div>

                                 <div class="col-8"><span>Total Comment</span></div>
                                 <div class="col-4 text-primary">{{$wow}}</div>

                              </div>
                            </div>
                          </div>


                          <div class="col-xl-4 col-lg-6">
                            <div class="project-box">
                              <h6>Provided Comment's</h6>
                              <div class="row details">
                       
                             	<div class="col-8"><span>Total Post's Comment</span></div>
                                <div class="col-4 text-primary">{{$post_comment}}</div>

                                <div class="col-8"><span>Total Prouddut's Comment</span></div>
                                <div class="col-4 text-primary">{{$pro_comment}}</div>

                              </div>
                            </div>
                          </div>


                            <div class="col-xl-4 col-lg-6">
                              <div class="project-box">
                                <h6>Quest & Badge</h6>
                                <div class="row details">
                                  
                                  <div class="col-8"><span>Total Quests</span></div>
                                  <div class="col-4 text-primary">{{$quest}}</div>

                                  <div class="col-8"><span>Total Badges</span></div>
                                  <div class="col-4 text-primary">{{$badge}}</div>
                                 
                                </div>
                              </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                          @if (count($interests)>0)
                            <div class="col-xl-8 col-lg-12">
                              <div class="project-box">
                                <h6>Social Infomation</h6>
                                <div class="row details">
                                  @foreach ($interests as $interest)
                                  <div class="col-2"><span>{{strtoupper($interest->meta_key)}}</span></div>
                                  <div class="col-10 text-primary">{{$interest->meta_value}}</div>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                           @endif

                            @if (count($socials)>0)
                            <div class="col-xl-4 col-lg-6">
                              <div class="project-box">
                                <h6>Social Infomation</h6>
                                <div class="row details">
                                  @foreach ($socials as $social)
                                  <div class="col-8"><span>{{strtoupper($social->meta_key)}}</span></div>
                                  <div class="col-4 text-primary">{{$social->meta_value}}</div>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                           @endif
                        </div>
                        
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>


@endsection
@section("all_modal")
{{-- modal for Basic Infomation --}}
	<div class="modal fade" id="updateBasicInfo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update User's Basic Information</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('admin.user.basic.information') }}">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
              <label class="col-form-label">Country</label>
              <input class="form-control" name="country" type="text" value="{{$user->country}}" required="">
            </div>

            <div class="form-group">
              <label class="col-form-label">City</label>
              <input class="form-control" name="city" type="text" value="{{$user->city}}" required="">
            </div>

            <div class="form-group">
              <label class="col-form-label">DOB</label>
              <input class="form-control" name="dob" type="text" value="{{$user->dob}}" required="">
            </div>

            <div class="form-group">
              <label class="col-form-label">Birth Place</label>
              <input class="form-control" name="birth_place" type="text" value="{{$user->birth_place}}" required="">
            </div>
            <div class="form-group">
              <label class="col-form-label">Occupation</label>
              <input class="form-control" name="occupation" type="text" value="{{$user->occupation}}" required="">
            </div>

            <div class="form-group">
              <label class="col-form-label">Website</label>
              <input class="form-control" name="website" type="text" value="{{$user->website}}" required="">
            </div>

            <div class="form-group">
              <label class="col-form-label">Life Status</label>
              <select class="form-control form-control-primary btn-square" name="life_status">

                    <option value="1" {{$user->life_status==1 ? 'selected' : ''}}>Single</option>
                    <option value="2" {{$user->life_status==2 ? 'selected' : ''}}>Engaged</option>
                    <option value="3" {{$user->life_status==3 ? 'selected' : ''}}>Married</option>
                    <option value="4" {{$user->life_status==4 ? 'selected' : ''}}>Devorced</option>
                    <option value="5" {{$user->life_status==5 ? 'selected' : ''}}>In a relationship  </option>
                </select>
              
            </div>

             <button class="btn btn-info" type="submit">Save Changes</button>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>
{{-- modal for Personal Info Infomation --}}
    <div class="modal fade" id="updatePersonalInfo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update User's personal Information</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form method="post" action="{{ route('admin.user.personal.information') }}">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
              <label class="col-form-label">Name</label>
              <input class="form-control" name="name" type="text" value="{{$user->name}}" required="">
            </div>

            <div class="form-group">
              <label class="col-form-label">Phone</label>
              <input class="form-control" name="phone" type="text" value="{{$user->phone}}" required="">

            </div>

             <button class="btn btn-info" type="submit">Save Changes</button>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>

  {{-- modal for description Infomation --}}
      <div class="modal fade" id="updateAboutlInfo" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update About user's</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('admin.user.about.information') }}">
              @csrf
              <input type="hidden" name="id" value="{{$user->id}}">
              <div class="form-group">
                <label class="col-form-label">Description</label>
                <textarea class="form-control" rows="5" cols="50" name="about">{!! $user->about !!}</textarea>
              </div>

               <button class="btn btn-info" type="submit">Save Changes</button>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
      
        </div>
      </div>
    </div>
  </div>

   {{-- modal for business Infomation --}}
      <div class="modal fade" id="updateBusinessInfo" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Business Informtion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('admin.user.business.information') }}">
              @csrf
              <input type="hidden" name="id" value="{{$user->id}}">
              <div class="form-group">
                 <label class="col-form-label">Add Credit <span><strong>Current Credit: {{$user->credit}}</strong></span></label>
                <input class="form-control" name="credit" type="number" min="1">
              </div>

              <div class="form-group">
                <label class="col-form-label">Affiliate Status</label>
                <select class="form-control form-control-primary btn-square" name="is_affiliate">

                      <option value="">Change Status</option>
                      <option value="2" {{$user->is_affiliate==2 ? 'selected' : ''}}>Pending</option>
                      <option value="3" {{$user->is_affiliate==3 ? 'selected' : ''}}>Approved</option>
                      <option value="4" {{$user->is_affiliate==4 ? 'selected' : ''}}>Canceled</option>
                    
                  </select>
                
              </div>

               <button class="btn btn-info" type="submit">Save Changes</button>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
      
        </div>
      </div>
    </div>
  </div>
@endsection