<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth:admin');
    }

    public function index(){
    	$posts=Post::orderBy('id','DESC')->get();
    	return view('admin.pages.post.index')->with('posts',$posts);
    }


    public function statusChange(Request $request){
      $post=Post::find($request->id);
      if ($post->status==1) {
         $post->status=2;
      }else{
         $post->status=1;
      }
      $savepost=$post->save();
      if ($savepost) {
         $msg=['status'=>'success','message'=>'Successfully Changes'];
      }else{
         $msg=['status'=>'error','message'=>'Something Went wrong'];
      }
      return json_encode($msg);
    }


      public function delete($id)
    {
      
        $post=Post::find($id);
        if (File::exists(base_path('front/image/post/'.$post->image))) {
            File::delete(base_path('front/image/post/'.$post->image));
        }
        
        $delete=$post->delete();
        if ($delete) {
            $notification=array(
                       'messege'=>'Successfully Deleted !',
                       'alert-type'=>'success'
                      );
            return redirect()->back()->with($notification);
        }
         
    }
}
