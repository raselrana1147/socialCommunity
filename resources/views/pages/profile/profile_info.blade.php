@extends('layouts.app')
@section('title',((Auth::user()->name !=null)? Auth::user()->name : Auth::user()->username))
@section('main_content')
	<div class="content-grid">
	  <!-- SECTION BANNER -->
	  <div class="section-banner">
	    <!-- SECTION BANNER ICON -->
	    <img class="section-banner-icon" src="{{ asset('front/img/banner/accounthub-icon.png') }}" alt="accounthub-icon">
	    <!-- /SECTION BANNER ICON -->
	
	    <!-- SECTION BANNER TITLE -->
	    <p class="section-banner-title">Account Hub</p>
	    <!-- /SECTION BANNER TITLE -->
	
	    <!-- SECTION BANNER TEXT -->
	    <p class="section-banner-text">Profile info, messages, settings and much more!</p>
	    <!-- /SECTION BANNER TEXT -->
	  </div>
	  <!-- /SECTION BANNER -->

	  <!-- GRID -->
	  <div class="grid grid-3-9 medium-space">
	    <!-- GRID COLUMN -->
	    @include('layouts.inc.profile-sidebar')
	    <!-- /GRID COLUMN -->

	    <!-- GRID COLUMN -->
	    <div class="account-hub-content">
	      <!-- SECTION HEADER -->
	      <div class="section-header">
	        <!-- SECTION HEADER INFO -->
	        <div class="section-header-info">
	          <!-- SECTION PRETITLE -->
	          <p class="section-pretitle">My Profile</p>
	          <!-- /SECTION PRETITLE -->

	          <!-- SECTION TITLE -->
	          <h2 class="section-title">Profile Info</h2>
	          <!-- /SECTION TITLE -->
	        </div>
	        <!-- /SECTION HEADER INFO -->
	      </div>
	      <!-- /SECTION HEADER -->

	      <!-- GRID COLUMN -->
	      <div class="grid-column">
	        <!-- GRID -->
	        <div class="grid grid-3-3-3 centered">
	          <!-- USER PREVIEW -->
	          <div class="user-preview small fixed-height">
	            <!-- USER PREVIEW COVER -->
	            <figure class="user-preview-cover liquid">
	              <img src="{{(Auth::user()->cover_photo ==null) ? asset('front/image/user/cover.jpg') : asset('front/image/user/cover/'.Auth::user()->cover_photo) }}" alt="cover-01">
	            </figure>
	            <!-- /USER PREVIEW COVER -->
	        
	            <!-- USER PREVIEW INFO -->
	            <div class="user-preview-info">
	              <!-- USER SHORT DESCRIPTION -->
	              <div class="user-short-description small">
	                <!-- USER SHORT DESCRIPTION AVATAR -->
	                <div class="user-short-description-avatar user-avatar">
	                  <!-- USER AVATAR BORDER -->
	                  <div class="user-avatar-border">
	                    <!-- HEXAGON -->
	                    <div class="hexagon-100-110"></div>
	                    <!-- /HEXAGON -->
	                  </div>
	                  <!-- /USER AVATAR BORDER -->
	              
	                  <!-- USER AVATAR CONTENT -->
	                  <div class="user-avatar-content">
	                    <!-- HEXAGON -->
	                    <div class="hexagon-image-68-74" data-src="{{(Auth::user()->avatar ==null) ? asset('front/image/user/profile.jpg') : asset('front/image/user/avatar/'.Auth::user()->avatar) }}" ></div>
	                    <!-- /HEXAGON -->
	                  </div>
	                  <!-- /USER AVATAR CONTENT -->
	              
	                  <!-- USER AVATAR PROGRESS -->
	                  <div class="user-avatar-progress">
	                    <!-- HEXAGON -->
	                    <div class="hexagon-progress-84-92"></div>
	                    <!-- /HEXAGON -->
	                  </div>
	                  <!-- /USER AVATAR PROGRESS -->
	              
	                  <!-- USER AVATAR PROGRESS BORDER -->
	                  <div class="user-avatar-progress-border">
	                    <!-- HEXAGON -->
	                    <div class="hexagon-border-84-92"></div>
	                    <!-- /HEXAGON -->
	                  </div>
	                  <!-- /USER AVATAR PROGRESS BORDER -->
	              
	                  <!-- USER AVATAR BADGE -->
	                  <div class="user-avatar-badge">
	                    <!-- USER AVATAR BADGE BORDER -->
	                    <div class="user-avatar-badge-border">
	                      <!-- HEXAGON -->
	                      <div class="hexagon-28-32"></div>
	                      <!-- /HEXAGON -->
	                    </div>
	                    <!-- /USER AVATAR BADGE BORDER -->
	              
	                    <!-- USER AVATAR BADGE CONTENT -->
	                    <div class="user-avatar-badge-content">
	                      <!-- HEXAGON -->
	                      <div class="hexagon-dark-22-24"></div>
	                      <!-- /HEXAGON -->
	                    </div>
	                    <!-- /USER AVATAR BADGE CONTENT -->
	              
	                    <!-- USER AVATAR BADGE TEXT -->
	                    <p class="user-avatar-badge-text">24</p>
	                    <!-- /USER AVATAR BADGE TEXT -->
	                  </div>
	                  <!-- /USER AVATAR BADGE -->
	                </div>
	                <!-- /USER SHORT DESCRIPTION AVATAR -->
	              </div>
	              <!-- /USER SHORT DESCRIPTION -->
	            </div>
	            <!-- /USER PREVIEW INFO -->
	          </div>
	          <!-- /USER PREVIEW -->

	          <!-- UPLOAD BOX -->
	          <div class="upload-box change-user-avatar">
	            <!-- UPLOAD BOX ICON -->
	            <svg class="upload-box-icon icon-members">
	              <use xlink:href="#svg-members"></use>
	            </svg>
	            <!-- /UPLOAD BOX ICON -->
	        
	            <!-- UPLOAD BOX TITLE -->
	            <p class="upload-box-title ">Change Avatar</p>
	            <!-- /UPLOAD BOX TITLE -->
	        
	            <!-- UPLOAD BOX TEXT -->
	            <p class="upload-box-text">110x110px size minimum</p>
	            <!-- /UPLOAD BOX TEXT -->
	          </div>
	          <!-- /UPLOAD BOX -->
	        
	          <!-- UPLOAD BOX -->
	          <div class="upload-box change-user-cover-photo">
	            <!-- UPLOAD BOX ICON -->
	            <svg class="upload-box-icon icon-photos">
	              <use xlink:href="#svg-photos"></use>
	            </svg>
	            <!-- /UPLOAD BOX ICON -->
	        
	            <!-- UPLOAD BOX TITLE -->
	            <p class="upload-box-title">Change Cover</p>
	            <!-- /UPLOAD BOX TITLE -->
	        
	            <!-- UPLOAD BOX TEXT -->
	            <p class="upload-box-text">1184x300px size minimum</p>
	            <!-- /UPLOAD BOX TEXT -->
	          </div>
	          <!-- /UPLOAD BOX -->
	        </div>

	        <div class="widget-box">

	          <p class="widget-box-title">About Your Profile</p>
	          <!-- /WIDGET BOX TITLE -->
	      
	          <!-- WIDGET BOX CONTENT -->
	          <div class="widget-box-content">
	            <!-- FORM -->
	            	@php
	            		$user=Auth::user();
	            	@endphp
	            <form class="form" data-action="{{ route('update.profile.basic.info') }}" method="post" id="updateProfileBasic">
	              @csrf
	              <input type="hidden" name="user_id" value="{{$user->id}}">
	              <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small active">
	                    <label for="profile-name">Name</label>
	                    <input type="text" id="user_name" name="name" value="{{$user->name}}" >
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small active">
	                    <label for="profile-tagline">Phone</label>
	                    <input type="text" id="phone" name="phone" value="{{$user->phone}}" >
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->
	              </div>
	              <!-- /FORM ROW -->

	              <!-- FORM ROW -->
	              <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small full">
	                    <textarea id="profile-description" name="about" placeholder="Write a little description about you...">{{$user->about}}</textarea>
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small active">
	                    <label for="profile-public-email">Email</label>
	                    <input type="text" id="profile-email" name="email" value="{{$user->email}}" readonly="">
	                  </div>
	                  <!-- /FORM INPUT -->

	                  <!-- FORM INPUT -->
	                  <div class="form-input small">
	                    <label for="profile-public-website">Website</label>
	                    <input type="text" id="profile-public-website" name="website" value="{{$user->website}}">
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->
	              </div>
	              <!-- /FORM ROW -->

	             <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small active">
	                    <label for="profile-name">City</label>
	                    <input type="text" id="user_city" name="city" value="{{$user->city}}">
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small active">
	                    <label for="profile-tagline">Country</label>
	                    <input type="text" id="user_country" name="country" value="{{$user->country}}">
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->
	              </div>
	              <!-- /FORM ROW -->

	              <!-- FORM ROW -->
	              <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT DECORATED -->
	                  <div class="form-input-decorated">
	                    <!-- FORM INPUT -->
	                    <div class="form-input small active">
	                      <label for="profile-birthday">Birthday</label>
	                      <input type="text" id="profile-birthday" name="dob" value="{{$user->dob}}">
	                    </div>
	                    <!-- /FORM INPUT -->
	        
	                    <!-- FORM INPUT ICON -->
	                    <svg class="form-input-icon icon-events">
	                      <use xlink:href="#svg-events"></use>
	                    </svg>
	                    <!-- /FORM INPUT ICON -->
	                  </div>
	                  <!-- /FORM INPUT DECORATED -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small active">
	                    <label for="profile-occupation">Occupation</label>
	                    <input type="text" id="profile-occupation" name="occupation" value="{{$user->occupation}}">
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->
	              </div>
	              <!-- /FORM ROW -->

	              <!-- FORM ROW -->
	              <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM SELECT -->
	                  <div class="form-select">
	                    <label for="profile-status">Life Status</label>
	                    <select id="profile-status" name="life_status">
	                        <option value="1" {{($user->life_status=='1') ? 'selected' : ''}}>Single</option>
	                        <option value="2" {{($user->life_status=='2') ? 'selected' : ''}}>Engaged</option>
	                        <option value="3" {{($user->life_status=='3') ? 'selected' : ''}}>Marited</option>
	                        <option value="4" {{($user->life_status=='4') ? 'selected' : ''}}>Devorced</option>
	                        <option value="5" {{($user->life_status=='5') ? 'selected' : ''}}>In A Relationship</option>
	                    </select> 
	                    <!-- FORM SELECT ICON -->
	                    <svg class="form-select-icon icon-small-arrow">
	                      <use xlink:href="#svg-small-arrow"></use>
	                    </svg>
	                    <!-- /FORM SELECT ICON -->
	                  </div>
	                  <!-- /FORM SELECT -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small">
	                    <label for="profile-birthplace">Birthplace</label>
	                    <input type="text" id="profile-birthplace" name="birth_place" value="{{$user->birth_place}}">
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->
	              </div>
	              <!-- /FORM ROW -->
	               <div class="form-row split">
	               
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small">
	                  	<input type="submit" class="button primary" value="Save Changes!" style="width: 150px">
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>

	                <!-- /FORM ITEM -->
	              </div>

	             
	            </form>



	            <!-- /FORM -->
	          </div>
	          <!-- WIDGET BOX CONTENT -->
	        </div>
	        <!-- /WIDGET BOX -->

	        <!-- WIDGET BOX -->
	        <div class="widget-box">
	          <!-- WIDGET BOX TITLE -->
	          <p class="widget-box-title">Manage Badges</p>
	          <!-- /WIDGET BOX TITLE -->
	      
	          <!-- WIDGET BOX CONTENT -->
	          <div class="widget-box-content">
	            <!-- DRAGGABLE ITEMS -->
	            <div class="draggable-items">


	              <!-- DRAGGABLE ITEM -->
	              <div class="draggable-item">
				  	@foreach($managed_badges as $badge)
						<!-- BADGE ITEM -->
						<div class="badge-item">
						  <img class="badge-image-small" src="{{ asset($badge->icon) }}" alt="{{ $badge->title }}">
						</div>
						<!-- /BADGE ITEM -->
					@endforeach
	              </div>
	              <!-- /DRAGGABLE ITEM -->
	          
	              <!-- DRAGGABLE ITEM -->
	              <div class="draggable-item empty"></div>
	              <!-- /DRAGGABLE ITEM -->
	          
	              <!-- DRAGGABLE ITEM -->
	              <div class="draggable-item empty"></div>
	              <!-- /DRAGGABLE ITEM -->
	            </div>
	            <!-- /DRAGGABLE ITEMS -->

	            <!-- WIDGET BOX TEXT -->
	            <p class="widget-box-text light">Choose the order in which your badges are shown. Just drag and place them wherever you want!</p>
	            <!-- /WIDGET BOX TEXT -->
	          </div>
	          <!-- WIDGET BOX CONTENT -->
	        </div>
	        <!-- /WIDGET BOX -->

	        <!-- WIDGET BOX -->
	        <div class="widget-box">
	          <!-- WIDGET BOX TITLE -->
	          <p class="widget-box-title">Interests</p>
	          <!-- /WIDGET BOX TITLE -->

	          @php
	          	
	          	$tv_show=App\Models\UserMeta::where('user_id',Auth::user()->id)
	          	->where('meta_type','interest')
	          	->where('meta_key','tv_shows')->first();

	          	$brand_artist=App\Models\UserMeta::where('user_id',Auth::user()->id)
	          	->where('meta_type','interest')
	          	->where('meta_key','brand_artist')->first();

	          	$movie=App\Models\UserMeta::where('user_id',Auth::user()->id)
	          	->where('meta_type','interest')
	          	->where('meta_key','movies')->first();

	          	$book=App\Models\UserMeta::where('user_id',Auth::user()->id)
	          	->where('meta_type','interest')
	          	->where('meta_key','books')->first();

	          	$game=App\Models\UserMeta::where('user_id',Auth::user()->id)
	          	->where('meta_type','interest')
	          	->where('meta_key','games')->first();


	          	$hobby=App\Models\UserMeta::where('user_id',Auth::user()->id)
	          	->where('meta_type','interest')
	          	->where('meta_key','hobbies')->first();
	         
	          @endphp
	      
	          <!-- WIDGET BOX CONTENT -->
	          <div class="widget-box-content">
	            <!-- FORM -->
	            <form  id="updateUserInterest" class="form" data-action="{{ route('user.update.interest') }}" method="post">
	              @csrf
	              <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small mid-textarea active">
	                    <label for="profile-favourite-shows">Favourite TV Shows</label>
	                    <textarea name="tv_show">{{(!is_null($tv_show)) ? $tv_show->meta_value : ''}}</textarea>
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small mid-textarea active">
	                    <label for="profile-favourite-music">Favourite Music Bands / Artists</label>
	                    <textarea name="brand_artist">{{(!is_null($brand_artist)) ? $brand_artist->meta_value : ''}}</textarea>
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->
	              </div>
	              <!-- /FORM ROW -->

	              <!-- FORM ROW -->
	              <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small mid-textarea active">
	                    <label for="profile-favourite-movies">Favourite Movies</label>
	                    <textarea name="movie">{{(!is_null($movie)) ? $movie->meta_value : ''}}</textarea>
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small mid-textarea active">
	                    <label for="profile-favourite-books">Favourite Books</label>
	                    <textarea name="book">{{(!is_null($book)) ? $book->meta_value : ''}}</textarea>
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->
	              </div>
	              <!-- /FORM ROW -->

	              <!-- FORM ROW -->
	              <div class="form-row split">
	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small mid-textarea active">
	                    <label for="profile-favourite-games">Favourite Games</label>
	                    <textarea name="game">{{(!is_null($game)) ? $game->meta_value : ''}}</textarea>
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	                <!-- /FORM ITEM -->

	                <!-- FORM ITEM -->
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small mid-textarea">
	                    <label for="profile-hobbies">My Hobbies</label>
	                    <textarea name="hobby">{{(!is_null($hobby)) ? $hobby->meta_value : ''}}</textarea>
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>


	                <!-- /FORM ITEM -->
	              </div>
	               <div class="form-row split">
	               
	                <div class="form-item">
	                  <!-- FORM INPUT -->
	                  <div class="form-input small">
	                  	<input type="submit" class="button primary" value="Save Changes!" style="width: 150px">
	                  </div>
	                  <!-- /FORM INPUT -->
	                </div>
	              </div>
	              <!-- /FORM ROW -->
	            </form>
	            <!-- /FORM -->
	          </div>
	          <!-- WIDGET BOX CONTENT -->
	        </div>
	        <!-- /WIDGET BOX -->

	        <!-- WIDGET BOX -->
	       
	        <!-- /WIDGET BOX -->
	      </div>
	      <!-- /GRID COLUMN -->
	    </div>
	    <!-- /GRID COLUMN -->
	  </div>
	  <!-- /GRID -->
	</div>
@endsection

@section('all_modal')
	@include('layouts.inc.modals.avatar_cover')
@endsection
@section('scripts')
	<!-- <script src="{{ asset('front/style/drofify/js/dropify.min.js') }}"></script> -->
	<!-- <script src="{{ asset('front/style/drofify/js/dropify.more.js') }}"></script> -->
@endsection