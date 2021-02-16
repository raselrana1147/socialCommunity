<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quest;
use File;
use Image;
use Str;

class QuestController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth:admin');
    }
    public function index(){
    	$quests=Quest::orderBy('id','DESC')->get();
    	return view('admin.pages.quest.index')->with('quests',$quests);
    }

    public function view($id){
    	$quest=Quest::find($id);
    	return view('admin.pages.quest.view')->with('quest',$quest);
    }


    public function statusChange(Request $request){
      $quest=Quest::find($request->id);
      if ($quest->status==1) {
         $quest->status=2;
      }else{
         $quest->status=1;
      }
      $savequest=$quest->save();
      if ($savequest) {
         $msg=['status'=>'success','message'=>'Successfully Changes'];
      }else{
         $msg=['status'=>'error','message'=>'Something Went wrong'];
      }
      return json_encode($msg);
    }

    public function statusfeature(Request $request){
      $quest=Quest::find($request->id);
      if ($quest->is_featured==1) {
         $quest->is_featured=0;
      }else{
         $quest->is_featured=1;
      }
      $savequest=$quest->save();
      if ($savequest) {
         $msg=['status'=>'success','message'=>'Successfully Changes'];
      }else{
         $msg=['status'=>'error','message'=>'Something Went wrong'];
      }
     
      return json_encode($msg);
    }

    public function statusType(Request $request){
    	$quest=Quest::findOrFail($request->id);

    	$quest->type=$request->input('type');
    	$quest->save();

    	 $notification=array(
    	   'messege'=>'Successfully Changes',
    	   'alert-type'=>'success'
    	  );
    	return redirect()->back()->with($notification);
    }

    public function store(Request $request){
    	$quest=new Quest();
    	$quest->title      =$request->title;
    	$quest->description=$request->description;
    	$quest->qty        =$request->qty;
    	$quest->credit     =$request->credit;
    	$quest->type       =$request->type;

    	if ($request->hasFile('cover_picture')) {

    	   $cover=$request->cover_picture;
    	   $covername=strtolower(Str::random(10)).time().".".$cover->getClientOriginalExtension();
    	   $location=base_path('front/img/quest/cover/'.$covername);
    	   Image::make($cover)->save($location);
    	   $fullpath='front/img/quest/cover/'.$covername;
    	   $quest->cover_picture=$fullpath;
    	}

    	if ($request->hasFile('icon')) {
    	   $icon=$request->icon;
    	   $iconname=strtolower(Str::random(10)).time().".".$icon->getClientOriginalExtension();
    	   $location=base_path('front/img/quest/'.$iconname);
    	   Image::make($icon)->save($location);
    	   $fullpath='front/img/quest/'.$iconname;
    	   $quest->icon=$fullpath;
    	}

    	$quest->save();

    	 $notification=array(
    	   'messege'=>'Successfully added',
    	   'alert-type'=>'success'
    	  );
    	return redirect()->back()->with($notification);
    }

    public function update(Request $request){
    	$quest=Quest::find($request->id);
    	$quest->title      =$request->title;
    	$quest->description=$request->description;
    	$quest->qty        =$request->qty;
    	$quest->credit     =$request->credit;

    	if ($request->hasFile('cover_picture')) {

    	 if (File::exists(base_path($quest->cover_picture))) {
    	     File::delete(base_path($quest->cover_picture));
    	 }

    	   $cover=$request->cover_picture;
    	   $covername=strtolower(Str::random(10)).time().".".$cover->getClientOriginalExtension();
    	   $location=base_path('front/img/quest/cover/'.$covername);
    	   Image::make($cover)->save($location);
    	   $fullpath='front/img/quest/cover/'.$covername;
    	   $quest->cover_picture=$fullpath;
    	}

    	if ($request->hasFile('icon')) {

    	 if (File::exists(base_path($quest->icon))) {
    	     File::delete(base_path($quest->icon));
    	 }

    	   $icon=$request->icon;
    	   $iconname=strtolower(Str::random(10)).time().".".$icon->getClientOriginalExtension();
    	   $location=base_path('front/img/quest/'.$iconname);
    	   Image::make($icon)->save($location);
    	   $fullpath='front/img/quest/'.$iconname;
    	   $quest->icon=$fullpath;
    	}

    	$quest->save();

    	 $notification=array(
    	   'messege'=>'Successfully Changes',
    	   'alert-type'=>'success'
    	  );
    	return redirect()->back()->with($notification);
    }

     public function delete($id)
    {
      
        $quest=Quest::find($id);
        if (File::exists(base_path($quest->icon))) {
            File::delete(base_path($quest->icon));
        }
         if (File::exists(base_path($quest->cover_picture))) {
            File::delete(base_path($quest->cover_picture));
        }
        $delete=$quest->delete();
        if ($delete) {
            $notification=array(
                       'messege'=>'Successfully Deleted !',
                       'alert-type'=>'success'
                      );
            return redirect()->back()->with($notification);
        }
         
    }
}
