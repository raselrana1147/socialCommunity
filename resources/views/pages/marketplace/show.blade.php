@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('title','Product View')
@section('main_content')
    <!-- CONTENT GRID -->
    <div class="content-grid">
        <!-- SECTION BANNER -->
        <div class="section-banner">
            <img class="section-banner-icon" src="{{ asset('front/img/banner/marketplace-icon.png') }}" alt="marketplace-icon">

            <p class="section-banner-title">Marketplace</p>
            <p class="section-banner-text">The best place for the community to buy and sell!</p>
        </div>
        <!-- /SECTION BANNER -->

        <!-- SECTION HEADER -->
        <div class="section-header">
            <!-- SECTION HEADER INFO -->
            <div class="section-header-info">
                <!-- SECTION TITLE -->
                <h2 class="section-title">{{ $product->title }}</h2>
                <!-- /SECTION TITLE -->
            </div>
            <!-- /SECTION HEADER INFO -->

            <!-- SECTION HEADER ACTIONS -->
            <div class="section-header-actions">
                <!-- SECTION HEADER SUBSECTION -->
                <a class="section-header-subsection" href="{{ url('marketplace') }}">Marketplace</a>
                <!-- /SECTION HEADER SUBSECTION -->

                <!-- SECTION HEADER SUBSECTION -->
                <a class="section-header-subsection" href="#">{{ $product->location->location }}</a>
                <!-- /SECTION HEADER SUBSECTION -->

                <!-- SECTION HEADER SUBSECTION -->
                <p class="section-header-subsection">{{ $product->title }}</p>
                <!-- /SECTION HEADER SUBSECTION -->
            </div>
            <!-- /SECTION HEADER ACTIONS -->
        </div>
        <!-- /SECTION HEADER -->

        <!-- GRID -->
        <div class="grid grid-9-3">
            <!-- MARKETPLACE CONTENT -->
            <div class="marketplace-content grid-column">
                <!-- SLIDER PANEL -->
                <div class="slider-panel">
                    <!-- SLIDER PANEL SLIDES -->
                    <div id="product-box-slider-items" class="slider-panel-slides">
                        <!-- SLIDER PANEL SLIDE -->
                        <div class="slider-panel-slide">
                            <!-- SLIDER PANEL SLIDE IMAGE -->
                            <figure class="slider-panel-slide-image liquid" style="filter: blur(5px)">
                                <img src="{{ asset('front/image/product/thumb/'.$product->thumbnail) }}" alt="item-10">
                            </figure>
                            <!-- /SLIDER PANEL SLIDE IMAGE -->
                        </div>
                        <!-- /SLIDER PANEL SLIDE -->
                    </div>
                    <!-- /SLIDER PANEL SLIDES -->
                </div>
                <!-- /SLIDER PANEL -->

                <!-- TAB BOX -->
                <div class="tab-box">
                    <!-- TAB BOX OPTIONS -->
                    <div class="tab-box-options">
                        <!-- TAB BOX OPTION -->
                        <div class="tab-box-option">
                            <!-- TAB BOX OPTION TITLE -->
                            <p class="tab-box-option-title">Description</p>
                            <!-- /TAB BOX OPTION TITLE -->
                        </div>
                        <!-- /TAB BOX OPTION -->

                        <!-- TAB BOX OPTION -->
                        <div class="tab-box-option">
                            <!-- TAB BOX OPTION TITLE -->
                            <p class="tab-box-option-title">Comments <span class="highlighted">{{$product->comment->count()}}</span></p>
                            <!-- /TAB BOX OPTION TITLE -->
                        </div>
                        <!-- /TAB BOX OPTION -->

                        <!-- TAB BOX OPTION -->
                        <div class="tab-box-option">
                            <!-- TAB BOX OPTION TITLE -->
                            <p class="tab-box-option-title">Reviews <span class="highlighted">{{$product->ratting->count()}}</span></p>
                            <!-- /TAB BOX OPTION TITLE -->
                        </div>
                        <!-- /TAB BOX OPTION -->
                    </div>
                    <!-- /TAB BOX OPTIONS -->

                    <!-- TAB BOX ITEMS -->
                    <div class="tab-box-items">
                        <!-- TAB BOX ITEM -->
                        <div class="tab-box-item">
                            <!-- TAB BOX ITEM CONTENT -->
                            <div class="tab-box-item-content">
                                <!-- TAB BOX ITEM TITLE -->
                                <p class="tab-box-item-title">Photo Description!</p>
                                <!-- /TAB BOX ITEM TITLE -->

                                <!-- TAB BOX ITEM PARAGRAPH -->
                                <p class="tab-box-item-paragraph">{{ $product->description }}</p>
                                <!-- /TAB BOX ITEM PARAGRAPH -->

                            </div>
                            <!-- /TAB BOX ITEM CONTENT -->
                        </div>
                        <!-- /TAB BOX ITEM -->

                        <!-- TAB BOX ITEM -->
                        <div class="tab-box-item">
                            
                            <div class="post-comment-list no-border-top">
                                <div class="post-comment-form with-title">
                                   
                                    <p class="post-comment-form-title">Leave a Comment</p>
                                    <div class="user-avatar small no-outline">
                                      <div class="user-avatar-content">
                                        
                                        <div class="hexagon-image-30-32" data-src="{{(Auth::user()->avatar !=null) ? asset('front/image/user/avatar/'.Auth::user()->avatar) : asset('front/image/user/profile.jpg')}}"></div>
                                        
                                      </div>
                                    
                                  
                                        
                                      <div class="user-avatar-progress">
                                        
                                        <div class="hexagon-progress-40-44"></div>
                                        
                                      </div>
                                        
                                  
                                        
                                      <div class="user-avatar-progress-border">
                                        
                                        <div class="hexagon-border-40-44"></div>
                                        
                                      </div>
                                        
                                    </div>

                                    <form class="form" action="{{ route('product.comment.store') }}" method="post">
                                        @csrf
                                      <div class="form-row">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="form-item">
                                          <div class="form-input small">
                                            <label for="post-reply-2">Your Reply</label>
                                            <textarea name="content" required="" oninvalid="setCustomValidity('Please Write your opinion')" oninput="setCustomValidity('')"></textarea>
                                          </div>
                                       
                                        </div>
                                        
                                      </div>

                                      <div class="form-row">
                                          <div class="form-item">
                                            <div class="form-input small">
                                            <button class="button small secondary" type="submit" style="margin-top: -20px">Comment</button>
                                            </div>
                                          </div>
                                     </div>

                                    </form>
                                  </div>

                                <div class="post-comment-list no-border-top">
                                @foreach ($comments as $comment)

                                  <div class="post-comment">
                                    <a class="user-avatar small no-outline" href="{{($comment->user->id==Auth::user()->id) ? route('user.profile.timeline') : route('friend.profile.timeline',$comment->user->username)}}">
                                      <div class="user-avatar-content">
                                        <div class="hexagon-image-30-32" data-src="{{($comment->user->avatar!=null) ? asset('front/image/user/avatar/'.$comment->user->avatar) : asset('front/image/user/profile.jpg') }}"></div>
                                      </div>

                                      <div class="user-avatar-progress">
                                        
                                        <div class="hexagon-progress-40-44"></div>
                                        
                                      </div>
                  
                                      <div class="user-avatar-progress-border">
                                        
                                        <div class="hexagon-border-40-44"></div>
                                            
                                      </div>
                                
                                    </a>

                                    <p class="post-comment-text user-tag "><a class="post-comment-text-author" href="{{($comment->user->id==Auth::user()->id) ? route('user.profile.timeline') : route('friend.profile.timeline',$comment->user->username)}}">{{$comment->user->name !=null ? $comment->user->name : $comment->user->username}}</a></p>

                                    <p class="post-comment-text">{{$comment->content}}</p>

                                    <div class="content-actions">
                                        
                                      <div class="content-action">


                                        <div class="meta-line">
                                            
                                          <p class="meta-line-timestamp">{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</p>
                                            
                                        </div>
                                        
                                        <div class="meta-line settings">
                                            
                                          <div class="post-settings-wrap">
                                            
                                            <div class="post-settings post-settings-dropdown-trigger">
                                                
                                              <svg class="post-settings-icon icon-more-dots">
                                                <use xlink:href="#svg-more-dots"></use>
                                              </svg>
                                                
                                            </div>
                                            
                                
                                            
                                            <div class="simple-dropdown post-settings-dropdown">
                                                
                                              <p class="simple-dropdown-link">Report Post</p>
                                                
                                            </div>
                                            
                                          </div>
                                            
                                        </div>
                                        
                                      </div>
                                        
                                    </div>
                                    
                                  </div>

                                @endforeach
                                
                                <div class="own-pagination">
                                  {{$comments->links()}}
                                </div>

                                </div>
                            </div>
                            
                        </div>
                      
                        <div class="tab-box-item">
                          <div class="post-comment-list no-border-top">
                                <div class="post-comment-form with-title">
                                    <p class="post-comment-form-title">Leave a Review</p>
                                    <div class="user-avatar small no-outline">
                                      <div class="user-avatar-content">
                                        <div class="hexagon-image-30-32" data-src="{{(Auth::user()->avatar !=null) ? asset('front/image/user/avatar/'.Auth::user()->avatar) : asset('front/image/user/profile.jpg')}}"></div>
                                      </div>
                                      <div class="user-avatar-progress">
                                        <div class="hexagon-progress-40-44"></div>
                                        
                                      </div>
                                      <div class="user-avatar-progress-border">
                                        <div class="hexagon-border-40-44"></div>
                                        
                                      </div>
                                        
                                    </div>

                            <form class="form" action="{{ route('product.ratting.store') }}" method="post">
                                @csrf
                             <input type="hidden" name="product_id" value="{{$product->id}}">
                             <input type="hidden" name="ratting" id="ratingCount" value="1">

                            <div class="form-row">
                              <div class="form-item">
                               <div class="form-input small">

                                   @for ($i = 1; $i <=5 ; $i++)
                                      <span onmouseover="starmark(this)" onclick="starmark(this)" id="{{$i}}one"  class="star-ratting fa fa-star {{$i==1 ? 'checked-star' : ''}}"></span>
                                   @endfor

                               </div> 
                              </div>
                            </div>

                              <div class="form-row">
                                <div class="form-item">
                                  <div class="form-input small">
                                    <label for="post-reply-2">Your Reply</label>
                                    <textarea name="content" required="" oninvalid="setCustomValidity('Please Write your opinion')" oninput="setCustomValidity('')"></textarea>
                                  </div>  
                                </div>
                              </div>
                              <div class="form-row">
                                  <div class="form-item">
                                    <div class="form-input small">
                                    <button class="button small secondary" type="submit" style="margin-top: -20px">Ratting</button>
                                    </div>
                                  </div>
                             </div>
                            </form>

                            </div>
                           

                            @foreach ($rattings as $ratting)
                            <div class="post-comment">
                            
                              <a class="user-avatar small no-outline" href="{{($ratting->user->id==Auth::user()->id) ? route('user.profile.timeline') : route('friend.profile.timeline',$ratting->user->username)}}">
                                
                                <div class="user-avatar-content">
                                    
                                  <div class="hexagon-image-30-32" data-src="{{($ratting->user->avatar!=null) ? asset('front/image/user/avatar/'.$ratting->user->avatar) : asset('front/image/user/profile.jpg') }}"></div>
                                    
                                </div>
   
                                <div class="user-avatar-progress">
                                    
                                  <div class="hexagon-progress-40-44"></div>
                                    
                                </div>

                                <div class="user-avatar-progress-border">
                                    
                                  <div class="hexagon-border-40-44"></div>
                                    
                                </div>
                                
                              </a>

                              <div class="post-comment-text-wrap">
                                
                                <div class="rating-list medium">

                               @for ($i = 0; $i <5 ; $i++)
                               @if ($i<$ratting->ratting)
                                  <div class="rating medium filled">
                                      <svg class="rating-icon medium icon-star">
                                        <use xlink:href="#svg-star"></use>
                                      </svg>
                                    </div>
                                    @else
                                    <div class="rating medium">
                                      <svg class="rating-icon medium icon-star">
                                        <use xlink:href="#svg-star"></use>
                                      </svg>
                                    </div>
                               @endif

                                @endfor
                                </div>
                                
                              </div>
                                
                              <p class="post-comment-text">{{$ratting->content}}</p>

                              <div class="content-actions">
                                
                                <div class="content-action">
                                    
                                  <div class="meta-line">
                                    
                                    <p class="meta-line-text"><a href="{{($ratting->user->id==Auth::user()->id) ? route('user.profile.timeline') : route('friend.profile.timeline',$ratting->user->username)}}">{{ $ratting->user->name }}</a></p>
                                    
                                  </div>
    
                                  <div class="meta-line">
                                    
                                    <p class="meta-line-timestamp">{{Carbon\Carbon::parse($ratting->created_at)->diffForHumans()}}</p>
                                    
                                  </div>

                                  <div class="meta-line settings">
                                        
                                    <div class="post-settings-wrap">
                                        
                                      <div class="post-settings post-settings-dropdown-trigger">
                                        
                                        <svg class="post-settings-icon icon-more-dots">
                                          <use xlink:href="#svg-more-dots"></use>
                                        </svg>
                                        
                                      </div>

                                      <div class="simple-dropdown post-settings-dropdown">
                                        
                                        <p class="simple-dropdown-link">Report Review</p>
                                        
                                      </div>
                                        
                                    </div>
                                    
                                  </div>
                                
                                </div>
                                
                              </div>
                                
                            </div>
                                 @endforeach

                           <div class="own-pagination">
                             {{$rattings->links()}}
                           </div>
                          
                          </div>
                        </div>
                    </div>

                </div>

                <!-- /TAB BOX -->
            </div>
            <!-- /MARKETPLACE CONTENT -->

            <!-- MARKETPLACE SIDEBAR -->
            <div class="marketplace-sidebar">
                <!-- SIDEBAR BOX -->
                <div class="sidebar-box">
                    <!-- SIDEBAR BOX ITEMS -->
                    <div class="sidebar-box-items">
                        <!-- PRICE TITLE -->
                        <p class="price-title big"><span id="pro-price">{{ $product->require_token }}</span> <span class="currency">Tk</span></p>
                        <!-- /PRICE TITLE -->

                        <!-- FORM -->
                        <label class="accordion-trigger-linked w-100 text-center mt-4" for="license-regular"><strong>{{$product->product_type==1 ? 'Single Photo' : '4 Set Photo'}}</strong></label>
                        <!-- /FORM -->

                        <!-- BUTTON -->
                        <button class="button primary" id="add-cart-button" pro-id = "{{ $product->id }}" data-action="{{ route('product.cart.add') }}">
                            Add to Your Cart!
                        </button>
                        <!-- /BUTTON -->

                        <!-- USER STATS -->
                        <div class="user-stats">
                            <!-- USER STAT -->
                            <div class="user-stat big">
                                <!-- USER STAT TITLE -->
                                <p class="user-stat-title">1.360</p>
                                <!-- /USER STAT TITLE -->

                                <!-- USER STAT TEXT -->
                                <p class="user-stat-text">sales</p>
                                <!-- /USER STAT TEXT -->
                            </div>
                            <!-- /USER STAT -->

                            <!-- USER STAT -->
                            <div class="user-stat big">
                                <!-- USER STAT TITLE -->
                                <p class="user-stat-title">4.2/5</p>
                                <!-- /USER STAT TITLE -->

                                <!-- RATING LIST -->
                                <div class="rating-list">
                                    <!-- RATING -->
                                    <div class="rating filled">
                                        <!-- RATING ICON -->
                                        <svg class="rating-icon icon-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /RATING ICON -->
                                    </div>
                                    <!-- /RATING -->

                                    <!-- RATING -->
                                    <div class="rating filled">
                                        <!-- RATING ICON -->
                                        <svg class="rating-icon icon-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /RATING ICON -->
                                    </div>
                                    <!-- /RATING -->

                                    <!-- RATING -->
                                    <div class="rating filled">
                                        <!-- RATING ICON -->
                                        <svg class="rating-icon icon-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /RATING ICON -->
                                    </div>
                                    <!-- /RATING -->

                                    <!-- RATING -->
                                    <div class="rating filled">
                                        <!-- RATING ICON -->
                                        <svg class="rating-icon icon-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /RATING ICON -->
                                    </div>
                                    <!-- /RATING -->

                                    <!-- RATING -->
                                    <div class="rating">
                                        <!-- RATING ICON -->
                                        <svg class="rating-icon icon-star">
                                            <use xlink:href="#svg-star"></use>
                                        </svg>
                                        <!-- /RATING ICON -->
                                    </div>
                                    <!-- /RATING -->
                                </div>
                                <!-- /RATING LIST -->
                            </div>
                            <!-- /USER STAT -->
                        </div>
                        <!-- /USER STATS -->
                    </div>
                    <!-- /SIDEBAR BOX ITEMS -->

                    <!-- SIDEBAR BOX TITLE -->
                    <p class="sidebar-box-title medium-space">Item Author</p>
                    <!-- /SIDEBAR BOX TITLE -->

                    <!-- SIDEBAR BOX ITEMS -->
                    <div class="sidebar-box-items">
                        <!-- USER STATUS -->
                        <div class="user-status">
                            <!-- USER STATUS AVATAR -->
                            <a class="user-status-avatar" href="{{($product->user->id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$product->user->username)}}">
                                <!-- USER AVATAR -->
                                <div class="user-avatar small no-outline">
                                    <!-- USER AVATAR CONTENT -->
                                    <div class="user-avatar-content">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-image-30-32" data-src="{{ asset('front/image/user/avatar/'.$product->user->avatar) }}"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR CONTENT -->

                                    <!-- USER AVATAR PROGRESS -->
                                    <div class="user-avatar-progress">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-progress-40-44"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR PROGRESS -->

                                    <!-- USER AVATAR PROGRESS BORDER -->
                                    <div class="user-avatar-progress-border">
                                        <!-- HEXAGON -->
                                        <div class="hexagon-border-40-44"></div>
                                        <!-- /HEXAGON -->
                                    </div>
                                    <!-- /USER AVATAR PROGRESS BORDER -->

                                    <!-- USER AVATAR BADGE -->
                                    <div class="user-avatar-badge">
                                        <!-- USER AVATAR BADGE BORDER -->
                                        <div class="user-avatar-badge-border">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-22-24"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR BADGE BORDER -->

                                        <!-- USER AVATAR BADGE CONTENT -->
                                        <div class="user-avatar-badge-content">
                                            <!-- HEXAGON -->
                                            <div class="hexagon-dark-16-18"></div>
                                            <!-- /HEXAGON -->
                                        </div>
                                        <!-- /USER AVATAR BADGE CONTENT -->

                                        <!-- USER AVATAR BADGE TEXT -->
                                        <p class="user-avatar-badge-text">24</p>
                                        <!-- /USER AVATAR BADGE TEXT -->
                                    </div>
                                    <!-- /USER AVATAR BADGE -->
                                </div>
                                <!-- /USER AVATAR -->
                            </a>
                            <!-- /USER STATUS AVATAR -->

                            <!-- USER STATUS TITLE -->
                            <p class="user-status-title">
                                <a class="bold" href="{{($product->user->id ==Auth::user()->id) ?  route('user.profile.timeline') :  route('friend.profile.timeline',$product->user->username)}}">
                                    {{ ($product->user->name?$product->user->name:$product->user->username) }}
                                </a>
                            </p>
                            <!-- /USER STATUS TITLE -->

                            <!-- USER STATUS TEXT -->
                            <p class="user-status-text small">{{ count($user_products_count) }} items published</p>
                            <!-- /USER STATUS TEXT -->
                        </div>
                        <!-- /USER STATUS -->

                        <!-- BADGE LIST -->
                        <div class="badge-list small align-left">
                            @php($i = 0)
                            @foreach($product_owner->badges as $badge)
                            <!-- BADGE ITEM -->
                                <div class="badge-item text-tooltip-tft" data-title="{{ $badge->title }}">
                                    <img class="badge-image-small" src="{{ asset($badge->icon) }}" alt="{{ $badge->title }}">
                                </div>
                                <!-- /BADGE ITEM -->
                                @php($i++)
                                @if($i == 4)
                                    @break
                                @endif
                            @endforeach


                            @if(count($product_owner->badges) > 4)
                                <!-- BADGE ITEM -->
                                <a class="badge-item" href="#">
                                    <img src="{{ asset('front/img/badge/blank-s.png') }}" alt="badge-blank-s">
                                    <!-- BADGE ITEM TEXT -->
                                    <p class="badge-item-text">+{{ count($product_owner->badges) - 4 }}</p>
                                    <!-- /BADGE ITEM TEXT -->
                                </a>
                            @endif
                            <!-- /BADGE ITEM -->
                        </div>
                        <!-- /BADGE LIST -->

                        <!-- BUTTON -->
                        <a class="button small white" href="#">View Author's Store</a>
                        <!-- /BUTTON -->
                    </div>
                    <!-- /SIDEBAR BOX ITEMS -->

                    <!-- SIDEBAR BOX TITLE -->
                    <p class="sidebar-box-title medium-space">Item Details</p>
                    <!-- /SIDEBAR BOX TITLE -->

                    <!-- SIDEBAR BOX ITEMS -->
                    <div class="sidebar-box-items">
                        <!-- INFORMATION LINE LIST -->
                        <div class="information-line-list">
                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Updated</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ date('d, F, Y', strtotime($product->updated_at)) }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->

                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Created</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><span class="bold">{{ date('d, F, Y', strtotime($product->created_at)) }}</span></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->

                            <!-- INFORMATION LINE -->
                            <div class="information-line">
                                <!-- INFORMATION LINE TITLE -->
                                <p class="information-line-title">Category</p>
                                <!-- /INFORMATION LINE TITLE -->

                                <!-- INFORMATION LINE TEXT -->
                                <p class="information-line-text"><a href="#">{{ $product->location->location }}</a></p>
                                <!-- /INFORMATION LINE TEXT -->
                            </div>
                            <!-- /INFORMATION LINE -->
                        </div>
                        <!-- /INFORMATION LINE LIST -->
                    </div>
                    <!-- /SIDEBAR BOX ITEMS -->

                    <!-- SIDEBAR BOX TITLE -->
                    <p class="sidebar-box-title medium-space">Item Share</p>
                    <!-- /SIDEBAR BOX TITLE -->

                    <!-- SIDEBAR BOX ITEMS -->
                    <div class="sidebar-box-items">
                        <!-- SOCIAL LINKS -->
                        <div class="social-links small align-left">
                            <!-- SOCIAL LINK -->
                            <a class="social-link small facebook" href="#">
                                <!-- SOCIAL LINK ICON -->
                                <svg class="social-link-icon icon-facebook">
                                    <use xlink:href="#svg-facebook"></use>
                                </svg>
                                <!-- /SOCIAL LINK ICON -->
                            </a>
                            <!-- /SOCIAL LINK -->

                            <!-- SOCIAL LINK -->
                            <a class="social-link small twitter" href="#">
                                <!-- SOCIAL LINK ICON -->
                                <svg class="social-link-icon icon-twitter">
                                    <use xlink:href="#svg-twitter"></use>
                                </svg>
                                <!-- /SOCIAL LINK ICON -->
                            </a>
                            <!-- /SOCIAL LINK -->
                        </div>
                        <!-- /SOCIAL LINKS -->
                    </div>
                    <!-- /SIDEBAR BOX ITEMS -->
                </div>
                <!-- /SIDEBAR BOX -->
            </div>
            <!-- /MARKETPLACE SIDEBAR -->
        </div>
        <!-- /GRID -->
       
    </div>
    <!-- /CONTENT GRID -->
@endsection


@section('scripts')
<script>
    var count;
    function starmark(item)
    {
        count=item.id[0];
        sessionStorage.starRating = count;
        var subid= item.id.substring(1);
        $('#ratingCount').val(count);
        for(var i=0;i<5;i++)
        {
            if(i<count)
            {
              document.getElementById((i+1)+subid).style.color="#ffe00d";
            }
            else
            {
              document.getElementById((i+1)+subid).style.color="black";
            }

        }
    }

</script>
@endsection