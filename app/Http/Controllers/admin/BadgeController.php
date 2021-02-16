<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Badge;
use Image;
Use Str;
use File;

class BadgeController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth:admin');
    }
    public function index(){
    	$badges=Badge::orderBy('id','DESC')->get();
    	return view('admin.pages.badge.index')->with('badges',$badges);
    }


    public function statusChange(Request $request){
      $badge=Badge::find($request->id);
      if ($badge->status==1) {
         $badge->status=2;
      }else{
         $badge->status=1;
      }
      $savebadge=$badge->save();
      if ($savebadge) {
         $msg=['status'=>'success','message'=>'Successfully Changes'];
      }else{
         $msg=['status'=>'error','message'=>'Something Went wrong'];
      }
     
      return json_encode($msg);
    }


    public function store(Request $request){
    	$badge=new Badge();
    	$badge->title      =$request->title;
    	$badge->description=$request->description;
    	$badge->qty        =$request->qty;
    	$badge->credit     =$request->credit;
    

    	if ($request->hasFile('icon')) {
    	   $icon=$request->icon;
    	   $iconname=strtolower(Str::random(10)).time().".".$icon->getClientOriginalExtension();
    	   $location=base_path('front/img/badge/'.$iconname);
    	   Image::make($icon)->save($location);
    	   $fullpath='front/img/badge/'.$iconname;
    	   $badge->icon=$fullpath;
    	}

    	$badge->save();

    	 $notification=array(
    	   'messege'=>'Successfully added',
    	   'alert-type'=>'success'
    	  );
    	return redirect()->back()->with($notification);
    }

    public function update(Request $request){
    	$badge=Badge::find($request->id);
    	$badge->title      =$request->title;
    	$badge->description=$request->description;
    	$badge->qty        =$request->qty;
    	$badge->credit     =$request->credit;

    	if ($request->hasFile('icon')) {
    	 if (File::exists(base_path($badge->icon))) {
    	     File::delete(base_path($badge->icon));
    	 }
    	   $icon=$request->icon;
    	   $iconname=strtolower(Str::random(10)).time().".".$icon->getClientOriginalExtension();
    	   $location=base_path('front/img/badge/'.$iconname);
    	   Image::make($icon)->save($location);
    	   $fullpath='front/img/badge/'.$iconname;
    	   $badge->icon=$fullpath;
    	}
    	$badge->save();
    	 $notification=array(
    	   'messege'=>'Successfully Changes',
    	   'alert-type'=>'success'
    	  );
    	return redirect()->back()->with($notification);
    }


     public function delete($id)
    {
      
        $badge=Badge::find($id);
        if (File::exists(base_path($badge->icon))) {
            File::delete(base_path($badge->icon));
        }
        
        $delete=$badge->delete();
        if ($delete) {
            $notification=array(
                       'messege'=>'Successfully Deleted !',
                       'alert-type'=>'success'
                      );
            return redirect()->back()->with($notification);
        }
         
    }
}
