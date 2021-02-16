@extends('layouts.app')
@section('title','Store')
@section('main_content')
    <!-- CONTENT GRID -->
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
                        <p class="section-pretitle">My Store</p>
                        <!-- /SECTION PRETITLE -->

                        <!-- SECTION TITLE -->
                        <h2 class="section-title">Manage Items</h2>
                        <!-- /SECTION TITLE -->
                    </div>
                    <!-- /SECTION HEADER INFO -->
                </div>
                <!-- /SECTION HEADER -->

                <!-- GRID -->
                <div class="grid grid-3-3-3 centered-on-mobile">
                    <!-- CREATE ENTITY BOX -->
                    <div class="create-entity-box v2">
                        <!-- CREATE ENTITY BOX COVER -->
                        <div class="create-entity-box-cover"></div>
                        <!-- /CREATE ENTITY BOX COVER -->

                        <!-- CREATE ENTITY BOX AVATAR -->
                        <div class="create-entity-box-avatar primary">
                            <!-- CREATE ENTITY BOX AVATAR ICON -->
                            <svg class="create-entity-box-avatar-icon icon-item">
                                <use xlink:href="#svg-item"></use>
                            </svg>
                            <!-- /CREATE ENTITY BOX AVATAR ICON -->
                        </div>
                        <!-- /CREATE ENTITY BOX AVATAR -->

                        <!-- CREATE ENTITY BOX INFO -->
                        <div class="create-entity-box-info">
                            <!-- CREATE ENTITY BOX TITLE -->
                            <p class="create-entity-box-title">Your Item Name Here</p>
                            <!-- /CREATE ENTITY BOX TITLE -->

                            <!-- CREATE ENTITY BOX CATEGORY -->
                            <p class="create-entity-box-category">Category</p>
                            <p class="create-entity-box-category">Status</p>
                            <!-- /CREATE ENTITY BOX CATEGORY -->

                            <!-- BUTTON -->
                            <p class="button primary full popup-manage-item-trigger">Create New Item!</p>
                            <!-- /BUTTON -->
                        </div>
                        
                        <!-- /CREATE ENTITY BOX INFO -->
                    </div>
                    <!-- /CREATE ENTITY BOX -->
                    @foreach($products as $product)
                    <!-- PRODUCT PREVIEW -->
                    <div class="product-preview fixed-height">
                        <!-- PRODUCT PREVIEW IMAGE -->
                        <a href="{{ url('/marketplace/product/'.$product->id) }}">
                            <figure class="product-preview-image liquid">
                                <img src="{{ asset('front/image/product/thumb/'.$product->thumbnail) }}" alt="item-01">
                            </figure>
                        </a>
                        <!-- /PRODUCT PREVIEW IMAGE -->

                        <!-- PRODUCT PREVIEW INFO -->
                        <div class="product-preview-info">
                            <!-- TEXT STICKER -->
                            <p class="text-sticker">{{ $product->require_token }} <span class="highlighted">Tk</span></p>
                            <!-- /TEXT STICKER -->

                            <!-- PRODUCT PREVIEW TITLE -->
                            <p class="product-preview-title"><a href="{{ url('/marketplace/product/'.$product->id) }}">{{ $product->title }}</a></p>
                            <!-- /PRODUCT PREVIEW TITLE -->

                            <!-- PRODUCT PREVIEW CATEGORY -->
                            <p class="product-preview-category digital">{{ $product->location->location }}</p>
                            <!-- /PRODUCT PREVIEW CATEGORY -->
                            <p class="product-preview-category digital {{ ($product->status == 1? 'text-warning':($product->status == 2?'text-success':'text-danger')) }}">
                                {{ ($product->status == 1? 'In Review':($product->status == 2?'Approved':'Rejected')) }}
                            </p>

                            <!-- BUTTON -->
                            <button class="button white full popup-edit-item-trigger edit-item" pro-id="{{ $product->id }}" data-action="{{ route('user.product.show') }}">
                                Edit Item
                            </button>
                            <!-- /BUTTON -->
                        </div>
                        <!-- /PRODUCT PREVIEW INFO -->
                    </div>


                    <!-- /PRODUCT PREVIEW -->
                    @endforeach
                </div>
                <!-- /GRID -->
            </div>
            <!-- /GRID COLUMN -->
        </div>
        <!-- /GRID -->
    </div>
    <!-- /CONTENT GRID -->


    <!-- POPUP BOX PRODUCT CREATE -->
    <div class="popup-box mid popup-manage-item">
        <!-- POPUP CLOSE BUTTON -->
        <div class="popup-close-button popup-manage-item-trigger">
            <!-- POPUP CLOSE BUTTON ICON -->
            <svg class="popup-close-button-icon icon-cross">
                <use xlink:href="#svg-cross"></use>
            </svg>
            <!-- /POPUP CLOSE BUTTON ICON -->
        </div>
        <!-- /POPUP CLOSE BUTTON -->

        <form id="product-add-form" data-action="{{ route('user.product.create') }}" enctype="multipart/form-data">
            @csrf
            <div class="popup-box-body">

                <div class="popup-box-sidebar">
                    <div class="product-preview">
                        <label>Add Thumbnail</label>
                        <input type="file" name="thumbnail" class="dropify changeThumbNailTest"  data-allowed-file-extensions="png jpg jpeg" />
                    </div>

                    <div class="form">
                        <div class="form-row">
                            <label for="produtImageTypeSingle"><input type="radio" name="produt_image_type" value="single" id="produtImageTypeSingle"> Single Photo</label>
                            <label for="produtImageTypeFourSet" class="ml-3"><input type="radio" name="produt_image_type" value="fourset" id="produtImageTypeFourSet" checked=""> 4 set Photo</label>
                        </div>
                    </div>

                    <div class="popup-box-sidebar-footer">
                        <button type="submit" class="button primary full popup-manage-item-trigger">Save Item!</button>
                    </div>
                </div>
               
              
                <div class="popup-box-content limited" data-simplebar>
                   
                    <div class="widget-box">
                       
                        <p class="widget-box-title">Main Details</p>
                       
                        <div class="widget-box-content">
                           
                            <div class="form">
                              
                                <div class="form-row">
                                    
                                    <div class="form-item">
                                        
                                        <div class="form-input small active">
                                            <label for="item-name">Item Name</label>
                                            <input type="text" id="item-name" name="title">
                                        </div>
                                       
                                    </div>
                                   
                                </div>
                              
                               
                                <div class="form-row split">
                                     <div class="form-item">
                                        <div class="form-select">
                                            <label for="item-category">Location</label>
                                            <select id="location_id" name="location_id">
                                            @foreach ($locations as $location)
                                                <option value="{{$location->id}}">{{$location->location}}</option>

                                             @endforeach 
                                            
                                            </select>
                                            <svg class="form-select-icon icon-small-arrow">
                                                <use xlink:href="#svg-small-arrow"></use>
                                            </svg>
                                          
                                        </div>
                                       
                                    </div>
                                </div>


                                 <div class="form-row split">
                                    <div class="form-item">
                                        <div class="form-select">
                                            <label for="item-category">Skin Level</label>
                                            <select id="skin_level" name="skin_level"> 
                                              <option value="1">Lingerie</option>
                                              <option value="2">Topless</option>
                                              <option value="3">Nude</option>
                                            </select>
                                            <svg class="form-select-icon icon-small-arrow">
                                                <use xlink:href="#svg-small-arrow"></use>
                                            </svg>  
                                        </div> 
                                    </div>
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input small active">
                                            <label for="item-url">Required Token</label>
                                            <input type="text" id="require_token" name="require_token" value="75" readonly>
                                        </div>
                                       
                                    </div>
        
                                </div>
                               
                                <div class="form-row">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input small active">
                                            <label for="item-url">Item URL</label>
                                            <input type="text" name="item_url">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-item">
                                       
                                        <div class="form-input small mid-textarea">
                                            <textarea name="description" placeholder="Description.."></textarea>
                                        </div>
                                       
                                    </div>
                                </div>
                                <hr>
                                 <div id="single_photo_section" style="display: none">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="product-preview">
                                                <label for="single_image1">Front View</label>
                                                <input type="file" id="single_image1" name="single_image" class="dropify setTesxtSingleImage" data-allowed-file-extensions="png jpg jpeg"/>
                                            </div>
                                        </div> 
                                    </div>    
                                </div>
                               {{--  4 set photo section --}}
                                <div id="four_set_photo_section">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="product-preview">
                                                    <label for="front_view">Front View</label>
                                                    <input type="file" name="front_view" id="front_view" class="dropify setFrontView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product-preview">
                                                    <label for="side_view">Side View</label>
                                                    <input type="file" name="side_view" id="side_view" class="dropify setSideView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="product-preview">
                                                    <label for="rear_view">Rare View</label>
                                                    <input type="file" name="rear_view" id="rear_view" class="dropify setRearView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product-preview">
                                                    <label for="angel_view">Angle View</label>
                                                    <input type="file" name="angel_view" id="angel_view" class="dropify setAngelView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                               
                            </div>
                           
                        </div>
                       
                    </div>
                  
                </div>
                
            </div>
            
        </form>
    </div>

    <div class="popup-box mid popup-edit-item">
        <div class="popup-close-button popup-edit-item-trigger">
            <svg class="popup-close-button-icon icon-cross">
                <use xlink:href="#svg-cross"></use>
            </svg>
        </div>

        <form id="product-edit-form" data-action="{{ route('user.product.update') }}" enctype="multipart/form-data">
        @csrf
         
           <div class="popup-box-body">
               <input type="hidden" name="pro_id"  id="product_id" value="">
                <div class="popup-box-sidebar">
                    <div class="product-preview" id="editDropifyThumb" >
                        <label>Add Thumbnail</label>
                        <input type="file" name="thumbnail" class="dropify changeThumbNailTest"  data-allowed-file-extensions="png jpg jpeg"/>
                    </div>

                    <div class="form">
                        <div class="form-row">
                            <label for="produtImageTypeSingle"><input type="radio" name="produt_image_type_edit" value="single" id="produtImageTypeSingleEdit"> Single Photo</label>
                            <label for="produtImageTypeFourSet" class="ml-3"><input type="radio" name="produt_image_type_edit" value="fourset" id="produtImageTypeFourSetEdit"k> 4 set Photo</label>
                        </div>
                    </div>

                    <div class="popup-box-sidebar-footer">
                        <button type="submit" class="button primary full popup-edit-item-trigger">Save Changes!</button>
                    </div>
                </div>
               
              
                <div class="popup-box-content limited" data-simplebar>
                   
                    <div class="widget-box">
                       
                        <p class="widget-box-title">Main Details</p>
                       
                        <div class="widget-box-content">
                           
                            <div class="form">
                              
                                <div class="form-row">
                                    
                                    <div class="form-item">
                                        
                                        <div class="form-input small active">
                                            <label for="item-name">Item Name</label>
                                            <input type="text" id="item_title_edit" name="title">
                                        </div>
                                       
                                    </div>
                                   
                                </div>
                              
                               
                                <div class="form-row split">
                                     <div class="form-item">
                                        <div class="form-select">
                                            <label for="item-category">Location</label>
                                            <select id="location_id_edit" name="location_id">
                                             
                                            </select>
                                            <svg class="form-select-icon icon-small-arrow">
                                                <use xlink:href="#svg-small-arrow"></use>
                                            </svg>
                                          
                                        </div>
                                    </div>
                                </div>


                                 <div class="form-row split">
                                    <div class="form-item">
                                        <div class="form-select">
                                            <label for="item-category">Skin Level</label>
                                            <select id="skin_level_edit" name="skin_level"> 
                                             
                                            </select>
                                            <svg class="form-select-icon icon-small-arrow">
                                                <use xlink:href="#svg-small-arrow"></use>
                                            </svg>  
                                        </div> 
                                    </div>
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input small active">
                                            <label for="item-url">Required Token</label>
                                            <input type="text" name="require_token" id="require_token_edit" readonly>
                                        </div>
                                       
                                    </div>
        
                                </div>
                               
                                <div class="form-row">
                                    <!-- FORM ITEM -->
                                    <div class="form-item">
                                        <!-- FORM INPUT -->
                                        <div class="form-input small active">
                                            <label for="item-url">Item URL</label>
                                            <input type="text" name="item_url" id="item_url_edit">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-item">
                                       
                                        <div class="form-input small mid-textarea">
                                            <textarea name="description" placeholder="Description.." id="description_edit"></textarea>
                                        </div>
                                       
                                    </div>
                                </div>
                                <hr>
                                 <div id="single_photo_section_edit" >
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="product-preview" id="setSingleViewImage">
                                                <label for="single_image1">Front View</label>
                                                <input type="file" id="single_image1_edit" name="single_image" class="dropify setTesxtSingleImage" data-allowed-file-extensions="png jpg jpeg"/>
                                            </div>
                                        </div> 
                                    </div>    
                                </div>
                               {{--  4 set photo section --}}
                                <div id="four_set_photo_section_edit" >
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="product-preview" id="setFrontView">
                                                    <label for="front_view">Front View</label>
                                                    <input type="file" name="front_view" id="front_view_edit" class="dropify setFrontView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product-preview" id="setSideView">
                                                    <label for="side_view">Side View</label>
                                                    <input type="file" name="side_view" id="side_view_edit" class="dropify setSideView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                        </div>

                                         <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="product-preview" id="setRearView">
                                                    <label for="rear_view">Rare View</label>
                                                    <input type="file" name="rear_view" id="rear_view_edit" class="dropify setRearView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="product-preview" id="setAngelView">
                                                    <label for="angel_view">Angle View</label>
                                                    <input type="file" name="angel_view" id="angel_view_edit" class="dropify setAngelView" data-allowed-file-extensions="png jpg jpeg"/>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                               
                            </div>
                           
                        </div>
                       
                    </div>
                  
                </div>
                
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $('.changeThumbNailTest').dropify({
             messages: {
                 'default': 'Drag & Drop a Product Thumbnail',
                 'replace': 'Drag & Drop a Product Thumbnail',
             }  
         })

          $('.setTesxtSingleImage').dropify({
             messages: {
                 'default': 'Single View Drag & Drop',
                 'replace': 'Single View Drag & Drop',
             }  
         })

          $('.setFrontView').dropify({
             messages: {
                 'default': 'Frond View Drag & Drop',
                 'replace': 'Frond View Drag & Drop',
             }  
         })

          $('.setSideView').dropify({
             messages: {
                 'default': 'Side View Drag & Drop',
                 'replace': 'Side View Drag & Drop',
             }  
         })

          $('.setRearView').dropify({
             messages: {
                 'default': 'Rear View Drag & Drop',
                 'replace': 'Rear View Drag & Drop',
             }  
         })

          $('.setAngelView').dropify({
             messages: {
                 'default': 'Angel View Drag & Drop',
                 'replace': 'Angel View Drag & Drop',
             }  
         })
    </script>
@endsection