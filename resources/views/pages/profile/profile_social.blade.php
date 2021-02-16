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
            <h2 class="section-title">Social Networks</h2>
            <!-- /SECTION TITLE -->
          </div>
          <!-- /SECTION HEADER INFO -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID COLUMN -->

        @php
        	
        	$facebook=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','facebook')->first();

        	$twitter=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','twitter')->first();

        	$instagram=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','instagram')->first();

        	$twitch=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','twitch')->first();

        	$googleplus=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','googleplus')->first();

        	$youtube=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','youtube')->first();

        	$patreon=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','patreon')->first();

        	$discord=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','discord')->first();

        	$deviantart=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','deviantart')->first();

        	$behance=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','behance')->first();

        	$dribbble=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','dribbble')->first();

        	$artstation=App\Models\UserMeta::where('user_id',Auth::user()->id)
        	->where('meta_type','social')
        	->where('meta_key','artstation')->first();
        
        @endphp
        <div class="grid-column">
          <!-- WIDGET BOX -->
          <div class="widget-box">
            <!-- WIDGET BOX TITLE -->
            <p class="widget-box-title">Your Social Accounts</p>
            <!-- /WIDGET BOX TITLE -->
        
            <!-- WIDGET BOX CONTENT -->
            <div class="widget-box-content">
              <!-- FORM -->
              <form class="form" data-action="{{ route('user.store.social.link') }}" method="post" id="updateUserSocilLink">
                @csrf
                <div class="form-row split">
                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input social-input small active">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover facebook">
                        <!-- ICON FACEBOOK -->
                        <svg class="icon-facebook">
                          <use xlink:href="#svg-facebook"></use>
                        </svg>
                        <!-- /ICON FACEBOOK -->
                      </div>

                      <label for="social-account-facebook">Facebook Username</label>
                      <input type="text" id="social-account-facebook" name="facebook" value="{{(!is_null($facebook)) ? $facebook->meta_value : ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->

                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input social-input small active">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover twitter">
                        <!-- ICON TWITTER -->
                        <svg class="icon-twitter">
                          <use xlink:href="#svg-twitter"></use>
                        </svg>
                        <!-- /ICON TWITTER -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-twitter">Twitter Username</label>
                      <input type="text" id="social-account-twitter" name="twitter" value="{{(!is_null($twitter)) ? $twitter->meta_value : ''}}">
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
                    <div class="form-input social-input small active">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover instagram">
                        <!-- ICON INSTAGRAM -->
                        <svg class="icon-instagram">
                          <use xlink:href="#svg-instagram"></use>
                        </svg>
                        <!-- /ICON INSTAGRAM -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-instagram">Instagram Username</label>
                      <input type="text" id="social-account-instagram" name="instagram" value="{{(!is_null($instagram)) ? $instagram->meta_value : ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->

                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input social-input small active">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover twitch">
                        <!-- ICON TWITCH -->
                        <svg class="icon-twitch">
                          <use xlink:href="#svg-twitch"></use>
                        </svg>
                        <!-- /ICON TWITCH -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-twitch">Twitch Username</label>
                      <input type="text" id="social-account-twitch" name="twitch" value="{{(!is_null($twitch)) ? $twitch->meta_value : ''}}">
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
                    <div class="form-input social-input small">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover google">
                        <!-- ICON GOOGLE -->
                        <svg class="icon-google">
                          <use xlink:href="#svg-google"></use>
                        </svg>
                        <!-- /ICON GOOGLE -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-google">Google + Username</label>
                      <input type="text" id="social-account-google" name="googleplus" value="{{(!is_null($googleplus)) ? $googleplus->meta_value : ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->

                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input social-input small active">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover youtube">
                        <!-- ICON YOUTUBE -->
                        <svg class="icon-youtube">
                          <use xlink:href="#svg-youtube"></use>
                        </svg>
                        <!-- /ICON YOUTUBE -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-youtube">Youtube Username</label>
                      <input type="text" id="social-account-youtube" name="youtube" value="{{(!is_null($youtube)) ? $youtube->meta_value : ''}}">
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
                    <div class="form-input social-input small active">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover patreon">
                        <!-- ICON PATREON -->
                        <svg class="icon-patreon">
                          <use xlink:href="#svg-patreon"></use>
                        </svg>
                        <!-- /ICON PATREON -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-patreon">Patreon Username</label>
                      <input type="text" id="social-account-patreon" name="patreon" value="{{(!is_null($patreon)) ? $patreon->meta_value : ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->

                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input social-input small active">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover discord">
                        <!-- ICON DISCORD -->
                        <svg class="icon-discord">
                          <use xlink:href="#svg-discord"></use>
                        </svg>
                        <!-- /ICON DISCORD -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-discord">Discord Channel</label>
                      <input type="text" id="social-account-discord" name="discord" value="{{(!is_null($discord)) ? $discord->meta_value : ''}}">
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
                    <div class="form-input social-input small">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover deviantart">
                        <!-- ICON DEVIANTART -->
                        <svg class="icon-deviantart">
                          <use xlink:href="#svg-deviantart"></use>
                        </svg>
                        <!-- /ICON DEVIANTART -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-deviantart">DeviantArt Username</label>
                      <input type="text" id="social-account-deviantart" name="deviantart" value="{{(!is_null($deviantart)) ? $deviantart->meta_value : ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->

                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input social-input small">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover behance">
                        <!-- ICON BEHANCE -->
                        <svg class="icon-behance">
                          <use xlink:href="#svg-behance"></use>
                        </svg>
                        <!-- /ICON BEHANCE -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-behance">Behance Username</label>
                      <input type="text" id="social-account-behance" name="behance" value="{{(!is_null($behance)) ? $behance->meta_value : ''}}">
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
                    <div class="form-input social-input small">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover dribbble">
                        <!-- ICON DRIBBBLE -->
                        <svg class="icon-dribbble">
                          <use xlink:href="#svg-dribbble"></use>
                        </svg>
                        <!-- /ICON DRIBBBLE -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-dribbble">Dribbble Username</label>
                      <input type="text" id="social-account-dribbble" name="dribbble" value="{{(!is_null($dribbble)) ? $dribbble->meta_value : ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>
                  <!-- /FORM ITEM -->

                  <!-- FORM ITEM -->
                  <div class="form-item">
                    <!-- FORM INPUT -->
                    <div class="form-input social-input small">
                      <!-- SOCIAL LINK -->
                      <div class="social-link no-hover artstation">
                        <!-- ICON ARTSTATION -->
                        <svg class="icon-artstation">
                          <use xlink:href="#svg-artstation"></use>
                        </svg>
                        <!-- /ICON ARTSTATION -->
                      </div>
                      <!-- /SOCIAL LINK -->
                  
                      <label for="social-account-artstation">ArtStation Username</label>
                      <input type="text" id="social-account-artstation" name="artstation" value="{{(!is_null($artstation)) ? $artstation->meta_value : ''}}">
                    </div>
                    <!-- /FORM INPUT -->
                  </div>

                 
                  <!-- /FORM ITEM -->
                </div>
                  <div class="form-row split">
	                  	<input type="submit" class="button primary" value="Save Changes!" style="width: 150px">
	               </div>
                <!-- /FORM ROW -->
              </form>
              <!-- /FORM -->
            </div>
            <!-- WIDGET BOX CONTENT -->
          </div>
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