<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use Illuminate\Support\Str;
use App\Models\Product;

class OrderController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function orderHistory(){
        $orders = DB::table('orders')->where('user_id', Auth::user()->id)->get();

        foreach ($orders as $order){
            $ordered_products = json_decode($order->product_data, true);
            $order->counter = $ordered_products;
        }

        return view('pages.profile.order_history', ['orders' => $orders]);
    }

    public function order(Request $request){
        $cart_data = DB::table('carts')->where('user_id', Auth::user()->id)->get();
        $user_data = DB::table('users')->where('id', Auth::user()->id)->first();

        $total_price = 0;
        foreach ($cart_data as $data){
            $total_price += $data->price;
        }
        if ($user_data->credit >= $total_price){
            $product_data = [
                'user_id'      => Auth::user()->id,
                'product_data' => json_encode($cart_data),
                'total_price'  => $total_price,
                'order_id'     =>rand(1000,99999),
                'status'       => 2
            ];
            foreach ($cart_data as $cart) {
                Notification::create([
                    'title'=>'You have a new sell',
                    'type'=>2,
                    'notification_to'=>Product::findOrFail($cart->product_id)->user_id,
                    'notification_from'=>Auth::user()->id,
                    'product_id'=>$cart->product_id,
                ]);
            }
            $order = new Order;
            $result = $order->insert($product_data);


            if ($result){
                //delete cart data
                $delete = DB::table('carts')->where('user_id', Auth::user()->id)->delete();
                //reduce buyer credit
                $reduce_credit = $user_data->credit - $total_price;
                DB::table('users')->where('id', Auth::user()->id)->update(['credit' => $reduce_credit]);
                //increase seller credit



                if ($delete){
                    $msg = ['message' => 'Order completed successfully', 'status' => 'success'];
                }else{
                    $msg = ['message' => 'Error to complete order', 'status' => 'error'];
                }
            }
        }else{
            $msg = ['message' => 'Not enough token to purchase! Please recharge token', 'status' => 'error'];
        }

        return json_encode($msg);
    }

    public function viewOrder($orderId){
        $order = DB::table('orders')->where('order_id', $orderId)->first();
        $products = json_decode($order->product_data, true);

        $ordered_products = [];
        foreach ($products as $product){
            $ordered_products[] = DB::table('products')->where('id', $product['product_id'])->first();
        }

        return view('pages.profile.view_order', ['order' => $order, 'products' => $ordered_products]);

    }


}
