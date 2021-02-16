<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductRatting;
use App\Models\Product;
use App\Models\Notification;

class ProductRattingController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function store(Request $request){
    	
    		$ratting            =new ProductRatting();
    		$ratting->user_id   =Auth::user()->id;
    		$ratting->product_id=$request->input('product_id');
    		$ratting->content   =$request->input('content');
    		$ratting->ratting   =$request->input('ratting');
    		$ratting->save();

            $product=Product::findOrFail($request->product_id);

            Notification::create([
                'title'=>'Provide review on your product',
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
