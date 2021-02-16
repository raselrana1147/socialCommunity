<div class="popup-box mid applyForAffilaite">
  <!-- POPUP CLOSE BUTTON -->
  {{-- <div class="popup-close-button close-affiliate-popup"> --}}
    <!-- POPUP CLOSE BUTTON ICON -->
    {{-- <svg class="popup-close-button-icon icon-cross"> --}}
      {{-- <use xlink:href="#svg-cross"></use> --}}
    {{-- </svg> --}}
    <!-- /POPUP CLOSE BUTTON ICON -->
  {{-- </div> --}}
  <!-- /POPUP CLOSE BUTTON -->

  <!-- POPUP BOX BODY -->
  <div class="popup-box-body">
  
      <!-- /POPUP BOX SIDEBAR FOOTER -->
  </div>
    <!-- /POPUP BOX SIDEBAR -->

    <!-- POPUP BOX CONTENT -->
    <div class="popup-box-content">
      <!-- WIDGET BOX -->
      <div class="widget-box">
        <!-- WIDGET BOX TITLE -->
        <p class="widget-box-title">Term And Conditions</p>
        <!-- /WIDGET BOX TITLE -->
    
        <!-- WIDGET BOX CONTENT -->
        <div class="widget-box-content">
          <!-- FORM -->
          <form class="form" action="{{ route('appy.affiliate.member') }}" method="post">
            @csrf
            <div class="form-row">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="form-input small mid-textarea">
                  <textarea id="group-description" name="group_description" readonly="">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</textarea>
                </div>
                <!-- /FORM INPUT -->
              </div>
              <!-- /FORM ITEM -->
            </div>
            <div class="form-row">
              <!-- FORM ITEM -->
              <div class="form-item">
                <!-- FORM INPUT -->
                <div class="">
                 <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" required="" oninvalid="this.setCustomValidity('Cleck this terms and condition')" oninput="setCustomValidity('')">
                      <label class="form-check-label" style="padding-top: 6px">
                        Terms And Condition
                      </label>
                    </div>
                  </div>
                  <div class="form-input small">
                      <input type="submit" class="button primary" value="Apply Now" style="width: 150px">
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