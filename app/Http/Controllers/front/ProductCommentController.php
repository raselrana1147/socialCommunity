<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductComment;
use App\Models\Product;
use App\Models\Notification;

class ProductCommentController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function store(Request $request){
    	
    		$comment            =new ProductComment();
    		$comment->user_id   =Auth::user()->id;
    		$comment->product_id=$request->input('product_id');
    		$comment->content   =$request->input('content');
    		$comment->save();
            $product=Product::findOrFail($request->product_id);

            Notification::create([
                'title'=>'Comment on your product',
                'type'=>3,
                'notification_to'=>$product->user->id,
                'notification_from'=>Auth::user()->id,
                'product_id'=>$request->product_id,
            ]);

    		$notification=array(
    		  'messege'=>'Successfully added.',
    		  'alert-type'=>'success'
    		 );

    		return back()->with($notification);

    }


}
