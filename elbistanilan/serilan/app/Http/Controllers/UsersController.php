<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\users;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class UsersController extends Controller
{
    //
    public function index()
    {
        return view('users.login');
    }

    public function logout()
    {  
        Session::flush();
        return Redirect::to('/');
    }

    public function users_sayfa(){
        $this->AdminAuthCheck();
        $all_users = DB::table('tbl_users')    
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('users.index',['all_users'=>$all_users]); 
      
    }

    public function sayfa(Request $request){
        
    	$users_email=$request->users_email;
    	$users_password=$request->users_password;
    	$result=DB::table('tbl_users')
    		->where('users_email',$users_email)
    		->where('users_password',$users_password)
    		->first();
    		   	
    		if($result){
    			Session::put('users_ad',$result->users_ad);
    			Session::put('users_id',$result->users_id);
    			return Redirect::to('/sayfa');
    		}else
    		{
    			Session::put('messege','Kullanıcı Adı and Password Hatali');
    			return Redirect::to('/login');
    		}		
    }

 
    public function add_users(Request $request){
     
        $users_add = new users();     
        $users_add->users_email = $request->users_email;
        $users_add->users_ad = $request->users_ad;
        $users_add->users_password = $request->users_password;
        $users_add->save();
        
        return back()->with('success','Başarılı Bir Şeklide Kayıt Oldunuz Giriş Yapınız ');
    }

   
    public function edit_ayar($users_id)
	{
        $users_edit = users::find($users_id);
        return view('users.ayarlar_edit',['users_edit'=>$users_edit]);
    }

	public function update_ayar(Request $request,$users_edit)
	{
       
        $users_edit = users::find($users_edit);

		$users_edit->users_ad = $request->users_ad;
        $users_edit->users_email = $request->users_email;
        $users_edit->users_password =$request->users_password;

        $users_edit->save();
        return redirect()->back();

	}


    public function AdminAuthCheck(){

        $users_id =Session::get('users_id');
        if($users_id){
            return;
        }else{
            return Redirect::to('/login')->send();
        }
    }
}
