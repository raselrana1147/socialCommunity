<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class SellHistoryController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function sellHistory(){
        $orders=Order::paginate(4);
       return view('pages.profile.sell_history',compact('orders'));
    }
}
