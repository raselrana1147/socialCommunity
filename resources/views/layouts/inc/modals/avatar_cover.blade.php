<div class="popup-box mid changeAvatarImage" style="width: 35%">
 
    <div class="popup-box-content">
      <!-- WIDGET BOX -->
      <div class="widget-box">
        <!-- WIDGET BOX TITLE -->
        <p class="widget-box-title">Change Your Profile Photo</p>
        <div class="widget-box-content">
          <form class="form" action="{{ route('user.change.avatar') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <input type="file" required="" name="avatar" id="input-file-now" class="dropify" 
              data-default-file="{{(Auth::user()->avatar==null) ? asset('front/image/user/profile.jpg') :  asset('front/image/user/avatar/'.Auth::user()->avatar) }}"
              data-min-height="110" data-min-width="110">
            </div>
            <div class="form-row">
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="">
                 
                  <div class="form-input small">
                      <input type="submit" class="button primary" value="Save Change!" style="width: 150px">
                  </div>
                </div>
                <!-- /FORM INPUT -->
              </div>

              <!-- /FORM ITEM -->
            </div>
            <!-- /FORM ROW -->
          </form>
          <!-- /FORM -->
        </div>
        <!-- WIDGET BOX CONTENT -->
      </div>
      <!-- /WIDGET BOX -->
    </div>
    <!-- /POPUP BOX CONTENT -->
  </div>
  <!-- /POPUP BOX BODY -->
</div>


{{-- change cover photo  modal --}}

<div class="popup-box mid changeCoverPhoto" style="width: 35%">
 
    <div class="popup-box-content">
      <!-- WIDGET BOX -->
      <div class="widget-box">
        <!-- WIDGET BOX TITLE -->
        <p class="widget-box-title">Change Your Cover Photo</p>
        <div class="widget-box-content">
          <form class="form" action="{{ route('user.change.cover.photo') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
              <input type="file" required="" name="cover_photo" id="input-file-now" class="dropify" 
              data-default-file="{{(Auth::user()->cover_photo==null) ? asset('front/image/user/cover.jpg') :  asset('front/image/user/cover/'.Auth::user()->cover_photo) }}"
              data-min-width="1184" data-min-height="300">
            </div>
            <div class="form-row">
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="">
                 
                  <div class="form-input small">
                      <input type="submit" class="button primary" value="Save Change!" style="width: 150px">
                  </div>
                </div>
                <!-- /FORM INPUT -->
              </div>

              <!-- /FORM ITEM -->
            </div>
            <!-- /FORM ROW -->
          </form>
          <!-- /FORM -->
        </div>
        <!-- WIDGET BOX CONTENT -->
      </div>
      <!-- /WIDGET BOX -->
    </div>
    <!-- /POPUP BOX CONTENT -->
  </div>
  <!-- /POPUP BOX BODY -->
</div>