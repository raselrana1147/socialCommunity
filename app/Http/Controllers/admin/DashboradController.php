<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboradController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth:admin');
    }
    public function index(){
    	return view('admin.dashboard');
    }
}
