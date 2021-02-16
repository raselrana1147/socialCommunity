<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{

    function __construct(){
        $this->middleware('auth:admin');
    }
   
    public function index()
    {
        $locations=Location::orderBy('id','DESC')->get();
        return view('admin.pages.location.index')->with('locations',$locations);
    }

    public function create()
    {
       
    }

   
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'location' => 'unique:locations',     
        ]);
          $location=new Location();
        if ($validator->passes()) {
           
            $location->location=$request->location;
            $location->save();

             $notification=array(
               'messege'=>'Successfully Added !',
               'alert-type'=>'success'
              );
            return redirect()->back()->with($notification);

        }else{
             $notification=array(
               'messege'=>'Location Name already Exits !',
               'alert-type'=>'error'
              );
            return redirect()->back()->with($notification);
        }

    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request)
    {

         $location=Location::find($request->id);
        $validator = \Validator::make($request->all(), [
                    'location' => 'unique:locations,location,'.$location->id,     
          ]);
        if ($validator->passes()) {
          $location->location=$request->location;
                  $location->save();
                  $notification=array(
                    'messege'=>'Successfully Updated !',
                    'alert-type'=>'success'
                   );
                 return redirect()->back()->with($notification);
        }else{
           
           $notification=array(
             'messege'=>'Location Name already taken !',
             'alert-type'=>'error'
            );
          return redirect()->back()->with($notification);
        } 
    }

    public function statusChange(Request $request){
      $location=Location::find($request->id);
      if ($location->status==1) {
         $location->status=2;
      }else{
         $location->status=1;
      }
      $saveLoc=$location->save();
      if ($saveLoc) {
         $msg=['status'=>'success','message'=>'Successfully Changes'];
      }else{
         $msg=['status'=>'error','message'=>'Something Went wrong'];
      }
     
      return json_encode($msg);
    }

    
    public function delete($id)
    {
      
        $location=Location::find($id);
        $delete=$location->delete();
        if ($delete) {
            $notification=array(
                       'messege'=>'Successfully Deleted !',
                       'alert-type'=>'success'
                      );
            return redirect()->back()->with($notification);
        }
         
    }
}
