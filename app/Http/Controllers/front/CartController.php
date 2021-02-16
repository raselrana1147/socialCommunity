<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $cart_items = Cart::where('user_id', Auth::user()->id)->get();

        $products = [];
        foreach ($cart_items as $pro){
            $products[] = DB::table('products')
                            ->join('carts', 'products.id', '=', 'carts.product_id' )
                            ->where('products.id', $pro->product_id)
                            ->select('products.*', 'carts.id as cart_id', 'carts.license_type', 'carts.price')->first();
        }

        return view('pages.marketplace.cart', ['products' => $products]);
    }

    public function addToCart(Request $request){
        $cart = new Cart;
        $product = Product::where('id', $request->product_id)->get()->first();

        $check = Cart::where('user_id', Auth::user()->id)
                     ->where('product_id', $request->product_id)->get();

        if (count($check) > 0){
            $msg = ['message' => 'Product already added to cart', 'status' => 'error'];
        }else{
            $cart->user_id = Auth::user()->id;
            $cart->product_id = $request->product_id;
            $cart->price = $product->require_token;
           
            $result = $cart->save();

            if ($result){
                $msg = ['message' => 'Product added to cart', 'status' => 'success'];
            }else{
                $msg = ['message' => 'Error to add cart', 'status' => 'error'];
            }
        }

        return json_encode($msg);
    }

    public function cartShowNav(){
        $cart_products = Cart::where('user_id', Auth::user()->id)->get();

        $product_nav = [];
        foreach ($cart_products as $prod){
            $product_nav[] = array('cart'=>$prod, 'pro'=>Product::where('id', $prod->product_id)->first());
        }
        $products = [
            'prods' => $product_nav,
            'count' => count($cart_products),
        ];
        return json_encode($products);
    }

    public function removeFromCart(Request $request){
        $id = $request->cart_id;

        $result = DB::table('carts')->where('id', $id)->delete();

        if ($result){
            $msg = ['message' => 'Product removed from cart', 'status' => 'success'];
        }else{
            $msg = ['message' => 'Error to remove product', 'status' => 'error'];
        }

        return json_encode($msg);
    }

    public function removeFromCartMain(Request $request){
        $cart_id = $request->cart_id;

        $result = DB::table('carts')->where('id', $cart_id)->delete();
        if ($result){
            return redirect('marketplace/cart');
        }
    }
}
