<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reklamver;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    //
    public function index(){  
        return view('admin.login');
    }

    public function admin_dashboard(){
        $this->AdminAuthCheck();
        $all_reklamver = DB::table('tbl_reklamver')    
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('admin.index',['all_reklamver'=>$all_reklamver]); 
      
    }

    public function dashboard(Request $request){
        
    	$admin_name=$request->admin_name;
    	$admin_password=md5($request->admin_password);
    	$result=DB::table('tbl_admin')
    		->where('admin_name',$admin_name)
    		->where('admin_password',$admin_password)
    		->first();
    		   	
    		if($result){
    			Session::put('admin_name',$result->admin_name);
    			Session::put('admin_id',$result->admin_id);
    			return Redirect::to('/dashboard');
    		}else
    		{
    			Session::put('messege','Kullanıcı Adı and Password Hatali');
    			return Redirect::to('/login');
    		}		
    }
    public function logout()
    {  
        Session::flush();
        return Redirect::to('/');
    }

    public function AdminAuthCheck(){

        $admin_id =Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin-login')->send();
        }
    }
}
