<?php

use Illuminate\Support\Facades\Route;


/*
|=================================================================================
|Admin's routes
|=================================================================================
*/


Route::group(['namespace'=>'admin'],function(){

	Route::group(['namespace'=>'Auth'],function(){
		Route::group(['prefix'=>'admin'],function(){
			Route::get('/login','LoginController@showLoginForm')->name('admin.login');
			Route::post('/login','LoginController@login')->name('admin.login.submit');
			Route::post('/logout','LoginController@logout')->name('admin.logout');
		});
	});

	Route::group(['prefix'=>'admin'],function(){
		   Route::get('/dashboard','DashboradController@index')->name('admin.dashboard');

		   Route::group(['prefix'=>'location'],function(){
		   		Route::get("/", "LocationController@index")->name('location.index');
		   		Route::post("/update", "LocationController@update")->name('location.update');
		   		Route::post("/add", "LocationController@store")->name('location.store');
		   		Route::get("/delete/{id}", "LocationController@delete")->name('location.delete');
		   		Route::post("/status", "LocationController@statusChange")->name('location.status');
		   });

		    Route::group(['prefix'=>'quest'],function(){
		   		Route::get("/", "QuestController@index")->name('quest.index');
		   		Route::get("/detail/{id}", "QuestController@view")->name('quest.detail');
		   		Route::post("/update", "QuestController@update")->name('quest.update');
		   		Route::post("/add", "QuestController@store")->name('quest.store');
		   		Route::get("/delete/{id}", "QuestController@delete")->name('quest.delete');
		   		Route::post("/status", "QuestController@statusChange")->name('quest.status');
		   		Route::post("/feature", "QuestController@statusfeature")->name('quest.feature');
		   		Route::post("/type", "QuestController@statusType")->name('quest.type');
		   		Route::get("/delete/{id}", "QuestController@delete")->name('quest.delete');
		   });

		     Route::group(['prefix'=>'badge'],function(){
		    		Route::get("/", "BadgeController@index")->name('badge.index');
		    		Route::get("/detail/{id}", "BadgeController@view")->name('badge.detail');
		    		Route::post("/update", "BadgeController@update")->name('badge.update');
		    		Route::post("/add", "BadgeController@store")->name('badge.store');
		    		Route::get("/delete/{id}", "BadgeController@delete")->name('badge.delete');
		    		Route::post("/status", "BadgeController@statusChange")->name('badge.status');
		    });

		      Route::group(['prefix'=>'post'],function(){
		     		Route::get("/", "PostController@index")->name('admin.post.index');
		     		Route::post("/status", "PostController@statusChange")->name('admin.post.status');
		     		Route::get("/delete/{id}", "PostController@delete")->name('admin.post.delete');
		     		
		     });
		     
		  
		  

	   		Route::group(['prefix'=>'profile'],function(){
	   		   Route::get('/','AdminController@profile')->name('admin.profile');
	   		   Route::post('/change/password','AdminController@password')->name('admin.change.password');
	   		   Route::post('/profile/update','AdminController@profileUpdate')->name('admin.profile.update');
	   		   Route::post('/profile/avatar','AdminController@profileAvatar')->name('admin.avatar.update');
	   	     
	        });

			Route::group(['prefix'=>'users'],function(){
			  Route::get('/','UserController@index')->name('admin.user');
		      Route::get('/details/{id}','UserController@view')->name('admin.user.detail');
		      Route::get('/edit/{id}','UserController@edit')->name('admin.user.edit');
		      Route::post('/update/basic','UserController@updateBasic')->name('admin.user.basic.information');
		      Route::post('/update/personal','UserController@updatePersonal')->name('admin.user.personal.information');
		      Route::post('/update/about','UserController@updateAbout')->name('admin.user.about.information');
		      Route::post('/update/business','UserController@updateBusiness')->name('admin.user.business.information');
		      Route::post('/update/status','UserController@updateStatus')->name('admin.user.status.information');
	     });
	});


});



/*
|=================================================================================
|End Admin's routes
|=================================================================================
*/

/*
|=================================================================================
|Fronded routes
|=================================================================================
*/
Route::group(['namespace'=>'front'],function(){

	Route::get('/', 'NewsFeedController@index')->name('home');
	Route::get('/badges', 'BadgeController@index')->name('badges');
	Route::get('/quests', 'QuestController@index')->name('quests');

	Route::group(['prefix'=>'profile'],function(){
		
		 Route::get('/info', 'ProfileController@profile')->name('user.profile.info');
		 Route::get('/about', 'ProfileController@profile_about')->name('user.profile.about');
		 Route::post('/update_basic_info', 'ProfileController@updateInfo')->name('update.profile.basic.info');
		 Route::post('/update/payment/method', 'ProfileController@updatePayment')->name('user.update.payment.method');
		 Route::get('/user/timeline', 'ProfileController@timeline')->name('user.profile.timeline');
		 Route::get('/user/referal/friend', 'ProfileController@referalFriend')->name('user.referal.friend');
		 Route::post('/user_loaddata', 'ProfileController@userLoadData')->name('user.loaddata');

		  Route::post('/password/change', 'ProfileController@passwordChange')->name('user.password.change');
		  Route::post('/chnage/photo', 'ProfileController@changeAvatar')->name('user.change.avatar');
		  Route::post('/chnage/cover/photo', 'ProfileController@changeCoverPhoto')->name('user.change.cover.photo');
		  Route::get('/account/statement', 'ProfileController@accounts')->name('user.account.statement');
		  Route::get('/withdraw/redeem', 'ProfileController@withdrawAndRedeem')->name('user.withdraw.redeen');
		  Route::post('/convert/credit', 'ProfileController@convertCredit')->name('user.covert.credit');
		 
		  Route::post('/apply/affilliate/member',['uses'=>'ProfileController@applyAffMember','as'=>'appy.affiliate.member']);
		  Route::get('/password',['uses'=>'ProfileController@passwordForm','as'=>'profile.password']);
		  Route::get('/manage-item', 'ProductController@index')->name('user.profile.manage-item');


		   Route::post('/user/interest', 'UserMetaController@interest')->name('user.update.interest');
		   Route::get('/user/social', 'UserMetaController@socialForm')->name('user.update.social.link');
		   Route::post('/user/social/store', 'UserMetaController@sociaStore')->name('user.store.social.link');

		   Route::group(['prefix'=>'sell'],function(){
		   	  Route::get('history', 'SellHistoryController@sellHistory')->name('user.sell.history');
		   });
	 });

	Route::group(['prefix'=>'/'],function(){
		 Route::get('/{username}/timeline/', 'FriendProfileController@friendTimeline')->name('friend.profile.timeline');
		 Route::get('/{username}/profile/about', 'FriendProfileController@friendProfileAbout')->name('friend.profile.about');
		 Route::get('/{username}/store', 'FriendProfileController@friendStore')->name('friend.store');
		 Route::post('frn_loaddata', 'FriendProfileController@friendLoadData')->name('friend.load.data');
	 });

	  Route::group(['prefix'=>'withdraw'],function(){
	      Route::post('/balance', 'WithdrawController@withdraw')->name('user.withdraw.balance');
     });

	  Route::group(['prefix'=>'posts'],function(){
	  	  Route::post('/loaddata', 'PostController@loadData')->name('load.more.data');
	  	  Route::post('/create', 'PostController@create')->name('user.post.create');
	  	  Route::get('/single/{post_id}', 'PostController@single')->name('user.post.single');
	  });

	   Route::group(['prefix'=>'comment'],function(){
	  	  Route::post('/make/comment', 'CommentController@comment')->name('store.comment');
	  	  Route::post('/get/all/comment', 'CommentController@getAllComment')->name('getAllComment');
	  });
	    Route::group(['prefix'=>'friend'],function(){
	  	  Route::get('/request/send/{friend_id}', 'FriendRequestController@requestSend')->name('friend.request.send');
	  	  Route::get('/request/cancel/{request_id}', 'FriendRequestController@requestCancel')->name('friend.request.cancel');
	  	  Route::get('/request/accept/{request_id}', 'FriendRequestController@requestAccept')->name('friend.request.accept');
	  	  Route::get('/unfriend/{fnd_ship_id}', 'FriendRequestController@unfriend')->name('friend.unfriend');
	  });

	    Route::group(['prefix'=>'product'],function(){
	  	  Route::post('comment/store', 'ProductCommentController@store')->name('product.comment.store');
	  });

	    Route::group(['prefix'=>'product'],function(){
	  	  Route::post('ratting/store', 'ProductRattingController@store')->name('product.ratting.store');
	  });

	    Route::group(['prefix'=>'notification'],function(){
	      Route::get('all', 'NotificationController@allNottification')->name('notification.all');
	  	  Route::post('read/all', 'NotificationController@read')->name('notifiation.read.all');
	  });

	 
    
 });//end namespace

Route::get('/marketplace', 'front\ProductController@marketplaceProduct')->name('marketplace');
Route::get('/marketplace/product/{id}', 'front\ProductController@productShow')->name('marketplace.product.show');
Route::get('/marketplace/product/cart/nav', 'front\CartController@cartShowNav')->name('marketplace.product.cart.nav');
Route::get('/marketplace/cart', 'front\CartController@index')->name('marketplace.cart');
Route::get('/user/order/history', 'front\OrderController@orderHistory')->name('user.order.history');
Route::get('/user/order/view/{orderId}', 'front\OrderController@viewOrder');

Route::post('/quests/filter/show', 'front\QuestController@questFilterShow')->name('quest.filter.show');
Route::post('/quests/filter/order', 'front\QuestController@questFilterOrder')->name('quest.filter.order');
Route::post('/posts/reaction', 'front\PostController@postReaction')->name('post.reaction');
Route::post('/product/create', 'front\ProductController@create')->name('user.product.create');
Route::post('/product/show', 'front\ProductController@show')->name('user.product.show');
Route::post('/product/update', 'front\ProductController@update')->name('user.product.update');
Route::post('/product/license', 'front\ProductController@licenseCheck')->name('product.license.check');
Route::post('/product/cart/add', 'front\CartController@addToCart')->name('product.cart.add');
Route::post('/product/cart/remove', 'front\CartController@removeFromCart')->name('product.cart.remove');
Route::post('/product/main/cart/remove', 'front\CartController@removeFromCartMain')->name('product.main.cart.remove');
Route::post('/marketplace/product/order', 'front\OrderController@order')->name('marketplace.product.order');


Auth::routes();
