<div class="popup-box mid comment-modal-container">
<div class="popup-close-button comment-modal-show-up"> 
    <svg class="popup-close-button-icon icon-cross"> 
    <use xlink:href="#svg-cross"></use> 
   </svg> 
  </div> 
  <div class="popup-box-body">
  </div>
    <div class="popup-box-content">
      <div class="widget-box">
        <p class="widget-box-title">Make Your Comments!</p>
       
        <div class="widget-box no-padding" style="padding-bottom: 15px">
      <div class="widget-box-scrollable" data-simplebar>
        <div class="post-comment-list" id="all_comment_container">
          <p class="post-comment-heading">Load More Comments <span class="highlighted">9+</span></p>
        </div>
        
      </div>
      <div class="post-comment-form bordered-top">
        
        <div class="user-avatar small no-outline">
          
          <div class="user-avatar-content">
            
            <div class="hexagon-image-30-32" data-src="{{ (Auth::user()->avatar !=null)  ?  asset('front/image/user/avatar/'.Auth::user()->avatar)  :  asset('front/image/user/profile.jpg') }}"></div>
          
          </div>
          
          
          <div class="user-avatar-progress">
            
            <div class="hexagon-progress-40-44"></div>
            
          </div>

          <div class="user-avatar-progress-border">
            
            <div class="hexagon-border-40-44"></div>
              
          </div>
            
          <div class="user-avatar-badge">
              
            <div class="user-avatar-badge-border">
              
              <div class="hexagon-22-24"></div>
              
            </div>

            <div class="user-avatar-badge-content">
              
              <div class="hexagon-dark-16-18"></div>
              
            </div>

            <p class="user-avatar-badge-text">24</p>
            
          </div>
          
        </div>
        
        <form class="form" method="post" data-action="{{ route('store.comment') }}" id="makeComment">
          @csrf
          <input type="hidden" name="post_id" id="getPostIdForComment"  value="">
          <div class="form-row">
            <div class="form-item">
              <div class="form-input small">
                <label for="popup-post-reply">Your Reply</label>
                <input type="text" name="content">
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="form-item">
              <div class="form-input small">
              <button class="button small secondary" type="submit" name="post_submit" style="margin-top: -20px">Comment</button>
              </div>
            </div>
          </div>
          
        </form>
          
      </div>
      
    </div>
        
      </div>
      
    </div>
    
  </div>
  
</div>