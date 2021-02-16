<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Str;
use App\Models\Location;
use Illuminate\Support\Facades\File;
use App\Models\ProductComment;
use App\Models\ProductRatting;

class ProductController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
        $categories = ProductCategory::where('status', 1)->get();
        $locations = Location::where('status', 1)->get();
        $products   = Product::where('user_id', Auth::user()->id)->get();

        return view('pages.profile.profile_store', ['categories' => $categories, 'products' => $products,'locations'=>$locations]);
    }

    public function create(Request $request){

        if ($request->produt_image_type=="single") {
           $validator = \Validator::make($request->all(), [
               'title'             => 'required',
               'require_token'     => 'required|numeric',
               'description'       => 'required',
               'item_url'          => 'required',
               'thumbnail'         => 'required',
               'single_image'      =>'required'
           ]);
           $protype = 1;
        }else{
            $validator = \Validator::make($request->all(), [
                'title'             => 'required',
                'require_token'     => 'required|numeric',
                'description'       => 'required',
                'item_url'          => 'required',
                'thumbnail'         => 'required',
                'front_view'        => 'required',
                'side_view'         => 'required',
                'rear_view'         => 'required',
                'angel_view'        => 'required'
            ]);
            $protype = 2;
        }

        if ($validator->passes()) {
            $product = new Product;

            $product->user_id           = Auth::user()->id;
            $product->title             = $request->title;
            $product->product_type      = $protype;
            $product->location_id       = $request->location_id;
            $product->skin_level        = $request->skin_level;
            $product->require_token     = $request->require_token;
            $product->price             = number_format(($request->require_token/20), 2);
            $product->item_url          = $request->item_url;
            $product->description       = $request->description;
            $product->image_type        = $request->produt_image_type;


            if ($request->hasFile('thumbnail')){
                $thumbnail=$request->thumbnail;
                $imagename=strtolower(Str::random(10)).time().".".$thumbnail->getClientOriginalExtension();
                $locationThumb=base_path('/front/image/product/thumb/'.$imagename);
                Image::make($thumbnail)->save($locationThumb);
                $product->thumbnail=$imagename;
            }

             if ($request->hasFile('single_image')){
                $single_image=$request->single_image;
                $imagenameSingle=strtolower(Str::random(10)).time().".".$single_image->getClientOriginalExtension();
                $locationSingle=base_path('/front/image/product/single_image/'.$imagenameSingle);
                Image::make($single_image)->save($locationSingle);
                $product->single_image=$imagenameSingle;
            }



            $keep_front='';
            if ($request->hasFile('front_view')){
                $front_view=$request->front_view;
                $imagenamefront=strtolower(Str::random(10)).time().".".$front_view->getClientOriginalExtension();
                $locationFront=base_path('/front/image/product/4_set_image/'.$imagenamefront);
                Image::make($front_view)->save($locationFront);
                $keep_front=$imagenamefront;
            }
             $keep_side='';
              if ($request->hasFile('side_view')){
                $side_view=$request->side_view;
                $imagenameSide=strtolower(Str::random(10)).time().".".$side_view->getClientOriginalExtension();
                $locationSide=base_path('/front/image/product/4_set_image/'.$imagenameSide);
                Image::make($side_view)->save($locationSide);
                $keep_side=$imagenameSide;
            }

            $keep_rear='';
              if ($request->hasFile('rear_view')){
                $rear_view=$request->rear_view;
                $imagenameRear=strtolower(Str::random(10)).time().".".$rear_view->getClientOriginalExtension();
                $locationRear=base_path('/front/image/product/4_set_image/'.$imagenameRear);
                Image::make($rear_view)->save($locationRear);
                $keep_rear=$imagenameRear;
            }

            $keep_angel='';
              if ($request->hasFile('angel_view')){
                $angel_view=$request->angel_view;
                $imagenameAngel=strtolower(Str::random(10)).time().".".$angel_view->getClientOriginalExtension();
                $locationAngel=base_path('/front/image/product/4_set_image/'.$imagenameAngel);
                Image::make($angel_view)->save($locationAngel);
                $keep_angel=$imagenameAngel;
            }

            $keep_view_array=array(
                    'front'=>$keep_front,
                    'side'=>$keep_side,
                    'rear'=>$keep_rear,
                    'angel'=>$keep_angel,
            );

            $product->image_view=json_encode($keep_view_array);
            $save = $product->save();
            $msg = ['success' => 'New product added!'];
            return json_encode($msg);
        }
        $msg = ['error' => $validator->errors()->all()];
        return json_encode($msg);

    }

    public function show(Request $request){
        $pro_id = $request->product_id;
        $product = Product::where('id', $pro_id)->first();
        $locations=Location::all();
        $msg=['product'=>$product,'locations'=>$locations];
        return json_encode($msg);

    }

    public function update(Request $request){

        $pro_id = $request->pro_id;
        $product = Product::find($pro_id);

       
        if ($request->produt_image_type_edit == 'single') {
            $protype=1;
        }else{
            $protype=2;
        }
       
           $validator = \Validator::make($request->all(), [
               'title'             => 'required',
               'require_token'     => 'required|numeric',
               'description'       => 'required',
               'item_url'          => 'required'
           ]);



        if ($validator->passes()) {

            $product->title             = $request->title;
            $product->product_type      = $protype;
            $product->location_id       = $request->location_id;
            $product->skin_level        = $request->skin_level;
            $product->require_token     = $request->require_token;
            $product->item_url          = $request->item_url;
            $product->description       = $request->description;
            $product->image_type        = $request->produt_image_type_edit;

            $get_price=((1*$request->require_token)/75);
            $product->price=$get_price;

            if ($request->hasFile('thumbnail')){

                if (File::exists(base_path('/front/image/product/thumb/'.$product->thumbnail))) {
                    File::delete(base_path('/front/image/product/thumb/'.$product->thumbnail));
                }

                $thumbnail=$request->thumbnail;
                $imagename=strtolower(Str::random(10)).time().".".$thumbnail->getClientOriginalExtension();
                $locationThumb=base_path('/front/image/product/thumb/'.$imagename);
                Image::make($thumbnail)->save($locationThumb);
                $product->thumbnail=$imagename;
            }

            if ($request->produt_image_type=='single') {
                 if ($request->hasFile('single_image')){

                    if (File::exists(base_path('/front/image/product/single_image/'.$product->single_image))) {
                        File::delete(base_path('/front/image/product/single_image/'.$product->single_image));
                    }
                    $single_image=$request->single_image;
                    $imagenameSingle=strtolower(Str::random(10)).time().".".$single_image->getClientOriginalExtension();
                    $locationSingle=base_path('/front/image/product/single_image/'.$imagenameSingle);
                    Image::make($single_image)->save($locationSingle);
                    $product->single_image=$imagenameSingle;
                }
              
            }else{
                
                $keep_front='';
                if ($request->hasFile('front_view')){

                    $image_view_Front=json_decode($product['image_view'],true);
                   
                    if (File::exists(base_path('/front/image/product/4_set_image/'.$image_view_Front['front']))) {
                        File::delete(base_path('/front/image/product/4_set_image/'. $image_view_Front['front']));
                    }

                    $front_view=$request->front_view;
                    $imagenamefront=strtolower(Str::random(10)).time().".".$front_view->getClientOriginalExtension();
                    $locationFront=base_path('/front/image/product/4_set_image/'.$imagenamefront);
                    Image::make($front_view)->save($locationFront);
                    $keep_front=$imagenamefront;

                     $image_view_Front['front']=$keep_front;
                     $product->image_view=json_encode($image_view_Front);
                }
                 $keep_side='';
                  if ($request->hasFile('side_view')){

                    $image_view_Side=json_decode($product['image_view'],true);
                    if (File::exists(base_path('/front/image/product/4_set_image/'.$image_view_Side['side']))) {
                        File::delete(base_path('/front/image/product/4_set_image/'. $image_view_Side['side']));
                    }

                    $side_view=$request->side_view;
                    $imagenameSide=strtolower(Str::random(10)).time().".".$side_view->getClientOriginalExtension();
                    $locationSide=base_path('/front/image/product/4_set_image/'.$imagenameSide);
                    Image::make($side_view)->save($locationSide);
                    $keep_side=$imagenameSide;

                    $image_view_Side['side']=$keep_side;
                    $product->image_view=json_encode($image_view_Side);

                }

                $keep_rear='';
                  if ($request->hasFile('rear_view')){

                     $image_view_Rear=json_decode($product['image_view'],true);
                    if (File::exists(base_path('/front/image/product/4_set_image/'.$image_view_Rear['rear']))) {
                        File::delete(base_path('/front/image/product/4_set_image/'. $image_view_Rear['rear']));
                    }

                    $rear_view=$request->rear_view;
                    $imagenameRear=strtolower(Str::random(10)).time().".".$rear_view->getClientOriginalExtension();
                    $locationRear=base_path('/front/image/product/4_set_image/'.$imagenameRear);
                    Image::make($rear_view)->save($locationRear);
                    $keep_rear=$imagenameRear;

                    $image_view_Rear['rear']=$keep_rear;
                    $product->image_view=json_encode($image_view_Rear);
                }

                $keep_angel='';
                  if ($request->hasFile('angel_view')){

                     $image_view_Angel=json_decode($product['image_view'],true);
                    if (File::exists(base_path('/front/image/product/4_set_image/'.$image_view_Angel['angel']))) {
                        File::delete(base_path('/front/image/product/4_set_image/'. $image_view_Angel['angel']));
                    }

                    $angel_view=$request->angel_view;
                    $imagenameAngel=strtolower(Str::random(10)).time().".".$angel_view->getClientOriginalExtension();
                    $locationAngel=base_path('/front/image/product/4_set_image/'.$imagenameAngel);
                    Image::make($angel_view)->save($locationAngel);
                    $keep_angel=$imagenameAngel;

                    $image_view_Angel['angel']=$keep_angel;
                    $product->image_view=json_encode($image_view_Angel);
                }  
            }
             

           $save = $product->save();
            $msg = ['success' => 'Product Added successfully!'];
            return json_encode($msg);
        }
        $msg = ['error' => $validator->errors()->all()];
        return json_encode($msg);

    }

    public function marketplaceProduct(){
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();
        $categories = ProductCategory::where('status', 1)->get();

        return view('pages.marketplace.marketplace', ['products' => $products, 'categories' => $categories]);
    }

    public function productShow($id){
        $product = Product::where('id', $id)
                    ->where('status', 1)->first();

        $user_products_count = Product::where('user_id', $product->user_id)
                            ->where('status', 1)->get();

        $product_owner = User::where('id', $product->user_id)->get()->first();
        $comments=ProductComment::where('product_id',$product->id)->orderBy('id','DESC')->paginate(5);
        $rattings=ProductRatting::where('product_id',$product->id)->orderBy('id','DESC')->paginate(5);

        return view('pages.marketplace.show',
            [
                'product'             => $product,
                'user_products_count' => $user_products_count,
                'product_owner'       => $product_owner,
                'comments'            =>$comments,
                'rattings'            =>$rattings
            ]
        );
    }


    public function licenseCheck(Request $request){
        $product = Product::where('id', $request->product_id)->get()->first();

        $product_price = [
            'regular' => $product->regular_price,
            'extended' => $product->extended_price
        ];
        return json_encode($product_price);
    }
}
