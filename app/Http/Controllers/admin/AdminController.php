<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;

class AdminController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth:admin');
    }

    public function profile(){
    	return view('admin.pages.admin.profile');
    }

    public function password(Request $request){
    	$admin=Admin::findOrFail($request->id);
    	if ($request->current_password) {
    	  if (Hash::check($request->current_password,$admin->password)) {
    	      if ($request->new_password==$request->password_confirmation) {
    	          $admin->password=Hash::make($request->new_password);
    	             $admin->save();
    	              $notification=array(
    	                'messege'=>'Successfully Updated !',
    	                'alert-type'=>'success'
    	               );
    	             return redirect()->back()->with($notification);
    	      }else{
    	        $notification=array(
    	          'messege'=>'Password Confirmation not match !',
    	          'alert-type'=>'error'
    	         );
    	       return redirect()->back()->with($notification);
    	      }
    	  }else{
    	     $notification=array(
    	       'messege'=>'New Password Not Match!',
    	       'alert-type'=>'error'
    	      );
    	    return redirect()->back()->with($notification);
    	  }
    	} 
    }

    public function profileUpdate(Request $request){
    		$admin=Admin::findOrFail($request->id);

    		$validator = \Validator::make($request->all(), [
    		    'email' => 'unique:admins,email,'.$admin->id,
    		    
    		]);
    		if ($validator->passes()) {
    			$admin->name       =$request->name;
    			$admin->email      =$request->email;
    			$admin->address    =$request->address;
    			$admin->description=$request->description;
    			$admin->save();
    			 $notification=array(
    			   'messege'=>'Successfully Updated!',
    			   'alert-type'=>'success'
    			  );
    			return redirect()->back()->with($notification);
    		}else{
    			 $notification=array(
    			   'messege'=>'Email is taken!',
    			   'alert-type'=>'error'
    			  );
    			return redirect()->back()->with($notification);
    		}
    }

    public function profileAvatar(Request $request){
    	$admin=Admin::findOrFail($request->id);

    	if ($request->hasFile('avatar')) {
    	 if (File::exists(base_path('/assets/admin/style/image/admin/'.$admin->avatar))) {
    	     File::delete(base_path('/assets/admin/style/image/admin/'.$admin->avatar));
    	 }

    	   $avatar=$request->avatar;
    	   $avatarname=strtolower(Str::random(10)).time().".".$avatar->getClientOriginalExtension();
    	   $location=base_path('/assets/admin/style/image/admin/'.$avatarname);
    	   Image::make($avatar)->save($location);

    	   $admin->avatar=$avatarname;
    	}
    	$admin->save();

    	 $notification=array(
    	    'messege'=>'Successfully profile photo updated',
    	    'alert-type'=>'success'
    	  );
    	return redirect()->back()->with($notification);
    }
}
