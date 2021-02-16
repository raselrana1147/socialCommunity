<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\React;
use App\Models\Comment;
use App\Models\ProductComment;
use App\Models\UserMeta;
use App\Models\UserBadge;
use App\Models\UserQuest;
use Illuminate\Support\Facades;
use App\Mail\ChangeAffiliatStatus;
use Illuminate\Support\Facades\Mail;
use App\Mail\ChangeUserStatus;

class UserController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth:admin');
    }

   public function index(){
   		$users=User::orderBy('id','DESC')->get();
   		return view('admin.pages.user.index',compact('users'));
   }

    public function view($id){
   		$user=User::findOrFail($id);
   		$like   =React::where(['user_id'=>$user->id,'react_type'=>1])->count();
   		$love   =React::where(['user_id'=>$user->id,'react_type'=>2])->count();
   		$dislike=React::where(['user_id'=>$user->id,'react_type'=>3])->count();
   		$happy  =React::where(['user_id'=>$user->id,'react_type'=>4])->count();
   		$funny  =React::where(['user_id'=>$user->id,'react_type'=>5])->count();
   		$wow    =React::where(['user_id'=>$user->id,'react_type'=>6])->count();
   		$angry  =React::where(['user_id'=>$user->id,'react_type'=>7])->count();
   		$post_comment  =Comment::where(['user_id'=>$user->id])->count();
   		$pro_comment   =ProductComment::where(['user_id'=>$user->id])->count();
   		$socials       =UserMeta::where(['user_id'=>$user->id,'meta_type'=>'social'])->get();
   		$interests     =UserMeta::where(['user_id'=>$user->id,'meta_type'=>'interest'])->get();

   		$badge  =UserBadge::where(['user_id'=>$user->id])->count();
   		$quest  =UserQuest::where(['user_id'=>$user->id])->count();

   		return view('admin.pages.user.view',compact('user','like','love','dislike','happy','funny','wow','angry','post_comment','pro_comment','socials','interests','badge','quest'));
   }

   public function edit($id){
   	 $user=User::findOrFail($id);
   	 return view('admin.pages.user.edit',compact('user'));
   }

   public function updateBasic(Request $request){
   		$user=User::findOrFail($request->id);

   		$user->country    =$request->input('country');
   		$user->city       =$request->input('city');
   		$user->dob        =$request->input('dob');
   		$user->birth_place=$request->input('birth_place');
   		$user->occupation =$request->input('occupation');
   		$user->website    =$request->input('website');
   		$user->life_status=$request->input('life_status');
   		$user->save();
   		 $notification=array(
   		   'messege'=>'Successfully Updated !',
   		   'alert-type'=>'success'
   		  );
   		return redirect()->back()->with($notification);
   		

   }

    public function updatePersonal(Request $request){
   		$user=User::findOrFail($request->id);
   		

   		    $validator = \Validator::make($request->all(), [
   		        'phone' => 'unique:users,phone,'.$user->id,
   		        
   		    ]);
   		   if ($validator->passes()) {
   		   		$user->name =$request->input('name');
   		   		$user->phone =$request->input('phone');
   		   		
   		   		 $user->save();
   		   		 $notification=array(
   		   		 'messege'=>'Successfully Updated !',
   		   		 'alert-type'=>'success'
   		   		  );
   		   		return redirect()->back()->with($notification);
   		   }else{
   		   		 $notification=array(
   		   		 'messege'=>'Phone number is taken !',
   		   		 'alert-type'=>'error'
   		   		  );
   		   		return redirect()->back()->with($notification);
   		   }	

   }

   public function updateAbout(Request $request){
   		$user=User::findOrFail($request->id);

   		$user->about=$request->input('about');
   		$user->save();
   		 $notification=array(
   		 'messege'=>'Successfully Updated !',
   		 'alert-type'=>'success'
   		  );
   		return redirect()->back()->with($notification);
   }

   public function updateBusiness(Request $request){
   
   		$user=User::findOrFail($request->id);
   		if (!empty($request->credit)) {

   			$current_credit=$user->credit;
   			$total_credit  =$current_credit+$request->input('credit');
   			$user->credit  =$total_credit;
   		}

   		if (!empty($request->is_affiliate)) {
   			$user->is_affiliate=$request->input('is_affiliate');
   			if ($request->is_affiliate==3) {
   				$message=array(
   				   'msg'=>"Your affilliate appilication has been approved. Please continue your affiliation.",
   				);
   			}elseif ($request->is_affiliate==4) {
   				$message=array(	  
   				   	'msg'=>"Your affilliate account has been canceled for some issues. Pleasae Continue with the authority.",
   				   );
   			}

             Mail::send(new ChangeAffiliatStatus($user,$message));
   			
   		}
   		

   		 $user->save();
   		 $notification=array(
   		 'messege'=>'Successfully Updated !',
   		 'alert-type'=>'success'
   		  );
   		return redirect()->back()->with($notification);
   }


   public function updateStatus(Request $request){
     
         $user=User::findOrFail($request->id);

         $user->status=$request->input('status');
         $user->save();
         if ($request->status==1) {
           $message=array(     
                 'msg'=>"Your account is kept in pending. It will be procced after some time",
              );
         }elseif ($request->status==2) {
            $message=array(     
                  'msg'=>"Your account is activated. Please Sing In",
               );
         }elseif ($request->status==3) {
            $message=array(     
                  'msg'=>"Your account is inactivated. It will be procced after some some time",
               );
         }elseif ($request->status==4) {
             $message=array(     
                  'msg'=>"Your account is Loacked. Please contact with authority",
               );
         }elseif ($request->status==5) {
            $message=array(     
               'msg'=>"Your account is Suspended. Please contact with authority",
            );
         }
         
          Mail::send(new ChangeUserStatus($user,$message));

          $notification=array(
          'messege'=>'Successfully Updated !',
          'alert-type'=>'success'
           );
         return redirect()->back()->with($notification);
   }


}
