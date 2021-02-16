$(function($){
	'use strict';


	var base_url = $('#base-url').val();

  


    $('body').on('blur','#regusername',function(e){
        e.preventDefault();
        var username=$(this).val();
        if (username !=="") {
            $.ajax({
                url:$(this).attr('data-url'),
                method:"POST",
                data:{username:username},
                success:function(response){
                    var data=JSON.parse(response);
                    if (data.status=="success") {
                        $('.userstatus').html("<span class='text-success'>"+data.msg+"</span>");
                    }else{
                        $('.userstatus').html("<span class='text-danger'>"+data.msg+"</span>");
                    }
                }
            });
        }else{
            $('.userstatus').html("");
        }
    });
      $('.dropify').dropify({
        tpl: {
            message: '<div class="dropify-message"><span class="file-icon" /><span> {{ default }} </span></div>'
        }
    });

     


   // featching data by ajax loading
    var pageName=$('#main_post_container').attr('pageName');
    if (pageName !='undefined' && pageName =='1') {
         $(document).ready(function(){
         var start=0;
         var limit=5;
         var action = 'inactive';
        function load_more_data(start,limit){
          $.ajax({
              url: base_url+"posts/loaddata",
              method:'POST',
              data:{start:start,limit:limit},
              success:function(data){
               $("#main_post_container").append(data);
               if (data =='') {
                   $('#loader_section').html('<span><strong>No More Posts</strong></span>');
                   action = 'active';
               }else{
                   $('#loader_section').html('<div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div>');
                   action = 'inactive';
               }
              
              }
          });
        }
        if(action == 'inactive')
         {
            load_more_data(start, limit);
            action = 'active';
         }
         $(window).scroll(function(){
           if($(window).scrollTop() + $(window).height() > $("#main_post_container").height() && action == 'inactive')
           {
            action = 'active';
            start = limit + start;
            setTimeout(function(){
             load_more_data(start, limit);
           }, 1500);
          }
        });
      });

    }//end


     var pageNameUser=$('#main_post_container_user').attr('pageNameUser');
    if (pageNameUser !='undefined' && pageNameUser =='2') {
     // auth user timeline post 
      $(document).ready(function(){
         var start=0;
         var limit=5;
         var action = 'inactive';
        function load_more_data_user(start,limit){
          $.ajax({
              url: base_url+"profile/user_loaddata",
              method:'POST',
              data:{start:start,limit:limit},
              success:function(data){
                $("#main_post_container_user").append(data);
                if (data =='') {
                    $('#loader_section_user').html('<span><strong>No More Posts</strong></span>');
                    action = 'active';
                }else{
                    $('#loader_section_user').html('<div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div>');
                    action = 'inactive';
                }
              }
          });
        }
        if(action == 'inactive')
         {
            load_more_data_user(start, limit);
            action = 'active';
         }
         $(window).scroll(function(){
           if($(window).scrollTop() + $(window).height() > $("#main_post_container_user").height() && action == 'inactive')
           {
            action = 'active';
            start = limit + start;
            setTimeout(function(){
             load_more_data_user(start, limit);
           }, 1500);
          }
        });  
      });
  }//end

    
     // freind post timeline
     var pageNameFnd=$('#main_post_container_fnd').attr('pageNameFnd');
     if (pageNameFnd !='undefined' && pageNameFnd =='3') {
     $(document).ready(function(){
        var user_id=$('#main_post_container_fnd').attr('userId');
         var start=0;
         var limit=5;
         var action = 'inactive';
        function load_more_data_fnd(start,limit){
          $.ajax({
              url: base_url+"frn_loaddata",
              method:'POST',
              data:{start:start,limit:limit,user_id:user_id},
              success:function(data){
                $("#main_post_container_fnd").append(data);
                if (data =='') {
                    $('#loader_section_fnd').html('<span><strong>No More Posts</strong></span>');
                    action = 'active';
                }else{
                    $('#loader_section_fnd').html('<div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div><div class="loader-bar"></div>');
                    action = 'inactive';
                }
              }
          });
        }
        if(action == 'inactive')
         {
            load_more_data_fnd(start, limit);
            action = 'active';
         }
         $(window).scroll(function(){
           if($(window).scrollTop() + $(window).height() > $("#main_post_container_fnd").height() && action == 'inactive')
           {
            action = 'active';
            start = limit + start;
            setTimeout(function(){
             load_more_data_fnd(start, limit);
           }, 1500);
          }
        });
           
      });
   }

 



	$(document).on('submit', '#postform', function(e){
		e.preventDefault();
		let formDta = new FormData(this);
		$.ajax({
			url: $(this).attr('data-action'),
			method: "POST",
			data: formDta,
			cache: false,
	        contentType: false,
	        processData: false,
			success:function(response){
				let data=JSON.parse(response);
				if (data.status=='success') {
					toastr.success(data.message);
					 $("#main_post_container").prepend(data.postlist);
					 location.reload(true);
				}else{
					toastr.error(data.message);
				}
				
			},
			error:function(response){
				toastr.error(response.responseJSON.errors['post_text'][0]);
			}
		});
	});



	$('#imageGrabber').on('click', function(e){
		e.preventDefault();
		$('#imageUpper').trigger('click');
	});

	$('#imageUpper').on('change', function(e){
		e.preventDefault();
        const getuserimage = this.files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
          $('#imagePreview').css('background-image', 'url('+reader.result+')').addClass('active');
        }, false);

        if (getuserimage) {
          reader.readAsDataURL(getuserimage);
        }
	});


    //===============================================
    //|             quest filter function           |
    //===============================================
    $(document).ready(function () {
        var filter_url = $('#quest-filter-show').attr('data-action');
        filterQuest('0', filter_url);
    });
    // --------------------common function--------------
	function filterQuest(filter_type, action){
        $.ajax({
            url: action,
            method: "POST",
            data: {
                filter_type: filter_type
            },
            success:function(response){
                var filter_data = JSON.parse(response);
                // console.log(filter_data['social_links'].length);
                var quests = filter_data['quests'];
                var html = '';
                quests.forEach(function myFunction(item, index, arr) {
                    html+='<div class="table-row small">'+
                            '<div class="table-column">'+
                                '<div class="table-information">'+
                                    '<img class="table-image" src="'+arr[index]['icon']+'" alt="completedq-s">'+
                                    '<p class="table-title">'+arr[index]['title']+'</p>'+
                                '</div>'+
                            '</div>'+

                            '<div class="table-column">'+
                                '<p class="table-text">'+arr[index]['description']+'</p>'+
                            '</div>'+

                            '<div class="table-column centered padded-big-left">'+
                                '<p class="text-sticker void">'+
                                '<svg class="text-sticker-icon icon-plus-small">'+
                                '<use xlink:href="#svg-plus-small"></use>'+
                                '</svg> '+arr[index]['credit']+' Exp </p>'+
                            '</div>'+

                            '<div class="table-column padded-big-left">'+
                                '<div class="progress-stat-wrap">';

                                    //----------------checking for social type quest------------------
                    	            if (arr[index]['type'] == 1) {
                                        var calculate_progress = (filter_data['social_links'].length * 100)/arr[index]['qty'];
                                html += '<div class="progress-stat">'+
                                            '<div id="" class="progress-stat-bar" style="width: 228px; height: 4px; position: relative;">' +
                                                '<canvas width="228" height="4"></canvas>';
                                                if (filter_data['social_links'].length >= arr[index]['qty']) {
                                                    html += '<canvas width="228" height="4" style="width: 100%"></canvas>';
                                                }else {
                                                    html += '<canvas width="228" height="4" style="width: '+ calculate_progress +'%"></canvas>';
                                                }
                                    html +='</div>' +
                                            '<div class="bar-progress-wrap small">' +
                                                '<p class="bar-progress-info negative start"><span class="bar-progress-text no-space">'+ filter_data['social_links'].length +'<span class="bar-progress-unit">/</span>'+ arr[index]['qty'] +'</span>completed</p>' +
                                            '</div>' +
                                        '</div>';
                                    }
                                    // -----------------------------------------------
                        html+=   '</div>'+
                            '</div>'+
                        '</div>';
                });

				$('#quest_filtered_data').html(html);
            },
            error:function(response){

            }
        });
	}
	// ---------------------------------------------

    //===============================================
    //|              quest filter show              |
    //===============================================

    $('body').on('change','#quest-filter-show', function(e){
        e.preventDefault();
        let filter_show = $(this).val();
        let action = $(this).attr('data-action');

        filterQuest(filter_show, action);
    });
	// -------------------------------------------------

    //===============================================
    //|              quest filter order             |
    //===============================================

    $('body').on('change','#quest-filter-order', function(e){
        e.preventDefault();
        let filter_order = $(this).val();
        let action = $(this).attr('data-action');

        filterQuest(filter_order, action);
    });
    // ---------------------------------------------------

    //===============================================
    //|                 post reaction               |
    //===============================================

    function reaction(react_type, id, url, type){
        $.ajax({
            url: base_url+url,
            method: "POST",
            data: {
                react_type: react_type,
                post_id: id,
                type: type
            },
            success:function (data) {
                $('.post-react-count-'+id).html(parseInt(data.counter)+' Reacts');
                $('#post-reactions-'+id).addClass('mi-hide');

                if (data.user_react_type.react_type == 1){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/like.png" alt="reaction-like">'+
                        '&nbsp;<p class="post-option-text react-like-text">Like</p>'
                    );
                }else if(data.user_react_type.react_type == 2){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/love.png" alt="reaction-love">'+
                        '&nbsp;<p class="post-option-text react-love-text">Love</p>'
                    );
                }else if(data.user_react_type.react_type == 3){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/dislike.png" alt="reaction-dislike">'+
                        '&nbsp;<p class="post-option-text react-dislike-text">Dislike</p>'
                    );
                }else if(data.user_react_type.react_type == 4){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/happy.png" alt="reaction-happy">'+
                        '&nbsp;<p class="post-option-text react-happy-text">Happy</p>'
                    );
                }else if(data.user_react_type.react_type == 5){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/funny.png" alt="reaction-funny">'+
                        '&nbsp;<p class="post-option-text react-funny-text">Funny</p>'
                    );
                }else if(data.user_react_type.react_type == 6){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/wow.png" alt="reaction-wow">'+
                        '&nbsp;<p class="post-option-text react-wow-text">Wow</p>'
                    );
                }else if(data.user_react_type.react_type == 7){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/angry.png" alt="reaction-angry">'+
                        '&nbsp;<p class="post-option-text react-angry-text">Angry</p>'
                    );
                }else if(data.user_react_type.react_type == 8){
                    $('.show-user-reaction-'+id).html(
                        '<img class="reaction-image" src="'+base_url+'front/img/reaction/sad.png" alt="reaction-sad">'+
                        '&nbsp;<p class="post-option-text react-sad-text">Sad</p>'
                    );
                }else{
                    $('.show-user-reaction-'+id).html(
                        '<svg class="post-option-icon icon-thumbs-up">'+
                        '<use xlink:href="#svg-thumbs-up"></use>'+
                            '</svg>'+
                            '<p class="post-option-text">React!</p>'
                    );
                }
            }
        });
    }
    $('body').on('click', '.post-reaction-type', function () {
        var react_type = $(this).attr('react-value');
        var post_id = $(this).attr('post-id');
        reaction(react_type, post_id, 'posts/reaction', 1);
    });



    // --------Check single set and double photo session-------------

    $('#produtImageTypeSingle').on('click',function(){
        if ($(this).is(':checked')) {
            if ($('#skin_level').children("option:selected").val() == 1){
                $('#require_token').val(25);
            }else if($('#skin_level').children("option:selected").val() == 2){
                $('#require_token').val(50);
            }else if($('#skin_level').children("option:selected").val() == 3){
                $('#require_token').val(75);
            }
            $("#single_photo_section").show();
             $("#four_set_photo_section").hide();
        }else{
            $("#four_set_photo_section").show();
             $("#single_photo_section").hide();
        }
        // show four set section
        $("#produtImageTypeFourSet").on('click',function(){
            if ($(this).is(":checked")) {
                if ($('#skin_level').children("option:selected").val() == 1){
                    $('#require_token').val(75);
                }else if($('#skin_level').children("option:selected").val() == 2){
                    $('#require_token').val(175);
                }else if($('#skin_level').children("option:selected").val() == 3){
                    $('#require_token').val(250);
                }
                 $("#four_set_photo_section").show();
                 $("#single_photo_section").hide();
             }else{
               $("#four_set_photo_section").hide();
                 $("#single_photo_section").show();
             }
        });
    });

    //skin level change
    $('#skin_level').on('change', function () {
        if ($('input[name="produt_image_type"]:checked').val() == "single"){
            if ($(this).children("option:selected").val() == 1){
                $('#require_token').val(25);
            }else if ($(this).children("option:selected").val() == 2){
                $('#require_token').val(50);
            }else if ($(this).children("option:selected").val() == 3){
                $('#require_token').val(75);
            }
        }else{
            if ($(this).children("option:selected").val() == 1){
                $('#require_token').val(75);
            }else if ($(this).children("option:selected").val() == 2){
                $('#require_token').val(175);
            }else if ($(this).children("option:selected").val() == 3){
                $('#require_token').val(250);
            }
        }

    });


    // Check edit section

    $('#produtImageTypeSingleEdit').on('click',function(){
        if ($(this).is(':checked')) {
            if ($('#skin_level_edit').children("option:selected").val() == 1){
                $('#require_token_edit').val(25);
            }else if($('#skin_level_edit').children("option:selected").val() == 2){
                $('#require_token_edit').val(50);
            }else if($('#skin_level_edit').children("option:selected").val() == 3){
                $('#require_token_edit').val(75);
            }
            $("#single_photo_section_edit").show();
             $("#four_set_photo_section_edit").hide();
        }else{
            $("#four_set_photo_section_edit").show();
             $("#single_photo_section_edit").hide();
        }
    });
        // show four set section
    $("#produtImageTypeFourSetEdit").on('click',function(){
        if ($(this).is(":checked")) {
            if ($('#skin_level_edit').children("option:selected").val() == 1){
                $('#require_token_edit').val(75);
            }else if($('#skin_level_edit').children("option:selected").val() == 2){
                $('#require_token_edit').val(175);
            }else if($('#skin_level_edit').children("option:selected").val() == 3){
                $('#require_token_edit').val(250);
            }
             $("#four_set_photo_section_edit").show();
             $("#single_photo_section_edit").hide();
         }else{
           $("#four_set_photo_section_edit").hide();
             $("#single_photo_section_edit").show();
         }
    });

    //edit skin level change
    $('body').on('change', '#skin_level_edit', function () {
        if ($('input[name="produt_image_type_edit"]:checked').val() == "single"){
            if ($(this).children("option:selected").val() == 1){
                $('#require_token_edit').val(25);
            }else if ($(this).children("option:selected").val() == 2){
                $('#require_token_edit').val(50);
            }else if ($(this).children("option:selected").val() == 3){
                $('#require_token_edit').val(75);
            }
        }else{
            if ($(this).children("option:selected").val() == 1){
                $('#require_token_edit').val(75);
            }else if ($(this).children("option:selected").val() == 2){
                $('#require_token_edit').val(175);
            }else if ($(this).children("option:selected").val() == 3){
                $('#require_token_edit').val(250);
            }
        }

    });

    //===============================================
    //|                product add                  |
    //===============================================

    $('body').on('submit', '#product-add-form', function (e) {
        e.preventDefault();
        let formDta = new FormData(this);

        $.ajax({
            url: $(this).data('action'),
            method: "POST",
            data: formDta,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                let data=JSON.parse(response);
                console.log(data.error);
                if($.isEmptyObject(data.error)){
                    toastr.success(data.success);
                    location.reload(true);
                }else{
                    toastr.error(data.error[0]);
                }

            },
            error:function(response){
                toastr.error('Error to save item');
            }
        });
    });
    // ---------------------------------------------------

    //===============================================
    //|           product show edit data            |
    //===============================================

    $(document).on('click', '.edit-item', function () {
        var product_id = $(this).attr('pro-id');
        $.ajax({
            url: $(this).attr('data-action'),
            method: "POST",
            data: {
                product_id: product_id
            },
            success:function (response) {
                var data = JSON.parse(response);
                $('#product_id').val(data.product.id);
                $('#item_title_edit').val(data.product.title);
                $('#editDropifyThumb .dropify-wrapper .dropify-preview .dropify-render').html('<img src="'+base_url+
                  'front/image/product/thumb/'+data.product.thumbnail+'" />');
                $('#editDropifyThumb .dropify-wrapper .dropify-preview').show();
                var options='';
                data.locations.forEach(function(location) {
                  options+='<option '+((data.product.location_id==location.id) ? 'selected' : '')+' value="'+location.id+'">'+location.location+'</option>';
                });
                 $('#location_id_edit').html(options);
                 $('#skin_level_edit').html(
                  '<option value="1" '+((data.product.skin_level==1) ? 'selected' : '')+'>Lingerie</option>'+
                  '<option value="2" '+((data.product.skin_level==2) ? 'selected' : '')+'>Topless</option>'+
                  '<option value="3" '+((data.product.skin_level==3) ? 'selected' : '')+'>Nude</option>');

                $('#require_token_edit').val(data.product.require_token);
                $('#item_url_edit').val(data.product.item_url);
                $('#description_edit').val(data.product.description);
                if (data.product.image_type=='single') {

                    $('#produtImageTypeSingleEdit').attr('checked', true);
                    $('#produtImageTypeFourSetEdit').attr('checked',false);
                    $('#single_photo_section_edit').show();
                    $('#four_set_photo_section_edit').hide();

                    $('#setSingleViewImage .dropify-wrapper .dropify-preview .dropify-render').html('<img src="'+base_url+
                      'front/image/product/single_image/'+data.product.single_image+'" />');
                    $('#setSingleViewImage .dropify-wrapper .dropify-preview').show();

                }else{
                    var view=JSON.parse(data.product.image_view);

                    $('#produtImageTypeSingleEdit').attr('checked', false);
                    $('#produtImageTypeFourSetEdit').attr('checked',true);
                    $('#single_photo_section_edit').hide();
                    $('#four_set_photo_section_edit').show();

                     $('#setFrontView .dropify-wrapper .dropify-preview .dropify-render').html('<img src="'+base_url+
                      'front/image/product/4_set_image/'+view.front+'" />');
                     $('#setFrontView .dropify-wrapper .dropify-preview').show();


                     $('#setSideView .dropify-wrapper .dropify-preview .dropify-render').html('<img src="'+base_url+
                      'front/image/product/4_set_image/'+view.side+'" />');
                     $('#setSideView .dropify-wrapper .dropify-preview').show();

                     

                      $('#setRearView .dropify-wrapper .dropify-preview .dropify-render').html('<img src="'+base_url+
                      'front/image/product/4_set_image/'+view.rear+'" />');
                     $('#setRearView .dropify-wrapper .dropify-preview').show();

                      $('#setAngelView .dropify-wrapper .dropify-preview .dropify-render').html('<img src="'+base_url+
                      'front/image/product/4_set_image/'+view.angel+'" />');
                     $('#setAngelView .dropify-wrapper .dropify-preview').show();

                }
            }
        });
    });
    // --------------------------------------------------

    //===============================================
    //|                product edit                 |
    //===============================================

    $(document).on('submit', '#product-edit-form', function (e) {
        e.preventDefault();
        let formDta = new FormData(this);

        $.ajax({
            url: $(this).attr('data-action'),
            method: "POST",
            data: formDta,
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                let data=JSON.parse(response);
                  // console.log(data.error[0]);
                if($.isEmptyObject(data.error)){
                    toastr.success(data.success);
                    location.reload(true);
                }else{
                    toastr.error(data.error[0]);
                }

            },
            error:function(response){
                let data=JSON.parse(response);
                // console.log(data);
            }
        });
    });
    // ---------------------------------------------------

    //===============================================
    //|               License check                 |
    //===============================================
    $(document).on('click', '.license-check', function () {
        var product_id = $(this).attr('pro-id');
        var license_type = $(this).val();

        $.ajax({
           url: $(this).attr('data-action'),
           method: "POST",
           data: {
               product_id: product_id
           },
            success:function(response){
                var data = JSON.parse(response);
                // console.log(data.regular.toFixed(2));

                if (license_type == 1){
                    $('#pro-price').text(data.regular.toFixed(2));
                    $(this).attr('checked', true);
                    $('#license-extended').attr('checked', false);
                }else{
                    $('#pro-price').text(data.extended.toFixed(2));
                    $(this).attr('checked', true);
                    $('#license-regular').attr('checked', false);
                }
            }
        });
    });
    // -------------------------------------------------

    //===============================================
    //|             Add product to cart             |
    //===============================================
    $(document).on('click', '#add-cart-button', function(){
        var license = $("input[name='license_type']:checked").val();
        var product_id = $(this).attr('pro-id');

        $.ajax({
            url: $(this).attr('data-action'),
            method: "POST",
            data: {
                license: license,
                product_id: product_id
            },
            success:function (response) {
                var data = JSON.parse(response);
                if (data.status == 'success'){
                    toastr.success(data.message);
                    showCartNav();
                }else{
                    toastr.error(data.message);
                }

            }
            
        });
    });
    // ----------------------------------------------------

    //===============================================
    //|         Show cart item to nav               |
    //===============================================
    $(document).ready(function () {
        // $('#cart-icon-nav').addClass('unread');
        showCartNav();

    });
    // -------------------------------------------------

    //===============================================
    //|      Show cart item to nav function         |
    //===============================================
    function showCartNav(){
        $.ajax({
            url: $('#shopping-cart-nav').attr('data-action'),
            method: "GET",
            success:function (response) {
                var data = JSON.parse(response);
                $('#cart-count-nav span').text(data.count);
                var html = '';
                var total_amount = 0;

                data.prods.forEach(function myFunction(item, index, arr) {
      
                    total_amount += arr[index].cart.price;
                    html+= '<div class="dropdown-box-list-item">'+
                                '<div class="cart-item-preview">'+
                                    '<a class="cart-item-preview-image" href="marketplace-product.html">'+
                                        '<figure class="picture medium round liquid">'+
                                            '<img src="'+base_url+'front/image/product/thumb/'+ arr[index].pro.thumbnail +'" alt="item-01">'+
                                        '</figure>'+
                                    '</a>'+
                                    '<p class="cart-item-preview-title"><a href="marketplace-product.html">'+ arr[index].pro.title +'</a></p>';
                                    html +=    '<p class="cart-item-preview-price">'+arr[index].cart.price+' <span class="highlighted">Tk</span></p>'+
                                    '<div class="cart-item-preview-action">'+
                                        '<svg class="icon-delete remove-product-cart" cart-id="'+arr[index].cart.id+'">'+
                                            '<use xlink:href="#svg-delete"></use>'+
                                        '</svg>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                });
                $('#cart-total #show-total').text(total_amount);
                $('#shopping-cart-nav').html(html);
                if (data.count > 0){
                    $('#cart-icon-nav').addClass('unread');
                }else{
                    $('#cart-icon-nav').removeClass('unread');
                    $('#shopping-cart-nav').html('<h3 class="section-title text-center">Empty Cart!</h3>');
                }

            }

        });
    }
    // -------------------------------------------------------

    //===============================================
    //|         Remove item from cart               |
    //===============================================

    $('body').on('click', '.remove-product-cart', function(){
       var cart_id = $(this).attr('cart-id');

       $.ajax({
           url: base_url+'product/cart/remove',
           method: "POST",
           data:{
               cart_id: cart_id
           },
           success:function (response) {
                var data = JSON.parse(response);
                if (data.status == 'success'){
                    showCartNav();
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                }
           }
       });
    });
    // -------------------------------------------------

    //===============================================
    //|              Complete Order                 |
    //===============================================

    $('body').on('click', '#complete-order', function () {
        $.ajax({
            url: $(this).attr('data-action'),
            method: "POST",
            success:function (response) {
                var data = JSON.parse(response);
                if (data.status == 'success'){
                    toastr.success(data.message);
                    setTimeout(function(){
                        window.location = base_url+"user/order/history";
                    }, 3000);
                }else{
                    toastr.error(data.message);
                }
            }
        });
    });







/******************************************** Rasel Codes *********************************************/



    $('body').on('submit','#updateProfileBasic',function(e){
        e.preventDefault();
            $.ajax({
                url: $(this).attr('data-action'),
                method: "POST",
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    let data=JSON.parse(response);
                    if (data.status=='success') {
                        toastr.success(data.message);
                    }else{
                        toastr.error(data.message);
                    }
                },
                error:function(response){
                    toastr.error(response.responseJSON.errors['post_text'][0]);
                }
            });
    });

    $('body').on('click','.close-affiliate-popup',function(){
        $('.applyForAffilaite').modal('hide');
    });


        $('body').on('submit','#updatePaymentInfo',function(e){
        e.preventDefault();
            $.ajax({
                url: $(this).attr('data-action'),
                method: "POST",
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success:function(response){
                    let data=JSON.parse(response);
                    if (data.status=='success') {
                        toastr.success(data.message);
                        $("#mainPaymentSection").load(" #mainPaymentSection");
                    }else{
                        toastr.error(data.message);
                    }
                },
                error:function(response){
                    toastr.error(response.responseJSON.errors['post_text'][0]);
                }
            });
    });

    $('body').on('click','.close-affiliate-popup',function(){
        $('.applyForAffilaite').modal('hide');
    })



//====================copy url
  $('#copylink').click(function (e) {
      e.preventDefault();
      var copyText = $(this).attr('data-url');
      document.addEventListener('copy', function(e) {
      e.clipboardData.setData('text/plain', copyText);
      e.preventDefault();
      }, true);
      document.execCommand('copy');
        toastr.success('Successfully copied!');
      });

  //=change password=============

  $('body').on('submit','#changaePassword',function(e){
        e.preventDefault();


        $.ajax({
            url:$(this).prop('action'),
            method:$(this).prop('method'),
            data:new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success:function(response){
                let data=JSON.parse(response);
                if (data.status=='success') {
                     $("#changaePassword")[0].reset();
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                }
            },
            error:function(response){
                toastr.error(response.responseJSON.errors['password_confirmation'][0]);
            }
        });

  })
// update interest
    $('body').on('submit','#updateUserInterest',function(e){
            e.preventDefault();
            $.ajax({
                url:$(this).attr('data-action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
            success:function(response){
                let data=JSON.parse(response);
                if (data.status=='success') {
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                }
            },
           
            });
    })


    // update interest
    $('body').on('submit','#updateUserSocilLink',function(e){
            e.preventDefault();
            $.ajax({
                url:$(this).attr('data-action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
            success:function(response){
                let data=JSON.parse(response);
                if (data.status=='success') {
                    toastr.success(data.message);
                }else{
                    toastr.error(data.message);
                }
            },
           
            });
    })

    $('body').on('click', '.mi-post-settings', function (e) {
        e.preventDefault();
        var setid = $(this).data('target');
        if ($(setid).hasClass('mi-hide')){
            $(setid).removeClass('mi-hide');
        }else{
            $(setid).addClass('mi-hide');
        }
    });

    $('body').on('click', '.mi-post-reactions', function (e) {
        e.preventDefault();
        var setid = $(this).data('target');
        if ($(setid).hasClass('mi-hide')){
            $(setid).removeClass('mi-hide');
        }else{
            $(setid).addClass('mi-hide');
        }
    });


    function loadAllComment(post_id,url){
      $.ajax({
        url:url,
        method:'POST',
        data:{post_id:post_id},
        success:function(response){
            $("#all_comment_container").html(response);
        }
      });
    }

$('body').on('click', '.post-comment-trigger', function(e) {
    e.preventDefault();
      let post_id = $(this).data('target');
      loadAllComment(post_id,$(this).attr('data-action'));
      $('#getPostIdForComment').val(post_id);
      $('.trigger-commentButton').trigger('click');
  });


$('body').on('click', '.post-comment-trigger-fnd', function(e) {
    e.preventDefault();
     let post_id = $(this).data('target');
     loadAllComment(post_id,$(this).attr('data-action'));
     $('#getPostIdForComment').val(post_id);
      $('.trigger-commentButton-fnd').trigger('click');
  });


$('body').on('click', '.post-comment-trigger-user', function(e) {
    e.preventDefault();
     let post_id = $(this).data('target');
     loadAllComment(post_id,$(this).attr('data-action'));
     $('#getPostIdForComment').val(post_id);
      $('.trigger-commentButton-user').trigger('click');
  });

$('body').on('click', '.comment-modal-show-up-single', function(e) {
    e.preventDefault();
     let post_id = $(this).data('target');
     loadAllComment(post_id,$(this).attr('data-action'));
     $('#getPostIdForComment').val(post_id);
  });



$('body').on('submit','#makeComment',function(e){
  e.preventDefault();
  $.ajax({
      url:$(this).attr('data-action'),
      method:$(this).attr('method'),
      data:new FormData(this),
      cache: false,
      contentType: false,
      processData: false,
  success:function(response){
          var data =JSON.parse(response);
          if (data.status=='success') {
              $('#makeComment')[0].reset();
              $('#noComment').text('');
              $("#all_comment_container").append(data.comment);
          }
      }
  });

});

// freind request send
$('body').on('click','.friend_request_send',function(e){
  e.preventDefault();
    var friend_id=$(this).data('target');
    $.ajax({
      method:"GET",
      url:base_url+'friend/request/send/'+friend_id,
      success:function(response){
        let data=JSON.parse(response);
        if (data.status=='success') {
          $('.hide_after_request'+friend_id).hide();
           toastr.success(data.message);
        }else{
          toastr.error(data.message);
         }
        }
    });
});

$('body').on('click','.after_request_sent_two',function(e){
  e.preventDefault();
    var friend_id=$(this).data('target');
    $.ajax({
      method:"GET",
      url:base_url+'friend/request/send/'+friend_id,
      success:function(response){
        let data=JSON.parse(response);
        if (data.status=='success') {
          $('.after_request_sent_two').hide();
          $('.request_sent_two').show();
           toastr.success(data.message);
        }else{
          toastr.error(data.message);
         }
        }
    });
});

// cancel friend request

$('body').on('click','.cancel_friend_request',function(e){
  e.preventDefault();
    var request_id=$(this).data('target');
    $.ajax({
      method:"GET",
      url:base_url+'friend/request/cancel/'+request_id,
      success:function(response){
        let data=JSON.parse(response);
        if (data.status=='success') {
          $('.cancel_friend_request').hide();
          $('.request_send').hide();
          $('.friend_request_send').show();
           toastr.success(data.message);
        }else{
          toastr.error(data.message);
         }
        }
    });
});

// accept friend request


$('body').on('click','.accept_friend_request',function(e){
  e.preventDefault();
    var request_id=$(this).data('target');
    $.ajax({
      method:"GET",
      url:base_url+'friend/request/accept/'+request_id,
      success:function(response){
        let data=JSON.parse(response);
        if (data.status=='success') {
          $('.after_accept_request').hide();
          $('.now_friend').show();
           toastr.success(data.message);
        }else{
          toastr.error(data.message);
         }
        }
    });
});

//  unfriend current friend


$('body').on('click', '.unfriend_current_friend',function(e){
  e.preventDefault();
    var fnd_ship_id=$(this).data('target');
      swal({
        title: "Are sure to unfriend this friend?",
        text: "It will be deleted Permanently!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
             $.ajax({
                url:base_url+'friend/unfriend/'+fnd_ship_id,
                method:'GET',
                success:function(response){
                  var data=JSON.parse(response);
                  swal(data.message);
                  $('.unfriend_current_friend').hide();
                  $('.accept_friend_request').hide();
                  $('.after_delete_request').show();
                }
             });
        } else {
           swal('Friend did not unfriend');
        }
      });
});

// make all notifiation unread
$('.makeUnreadAllNotification').on('click',function(e){
  e.preventDefault();
  $(this).removeClass('unread');
  var user_id=$(this).data('target');
  $.ajax({
      method:'POST',
      url:$(this).attr('data-action'),
      data:{user_id:user_id},
      success:function(response){
        console.log(response);
      }
  });
});


});