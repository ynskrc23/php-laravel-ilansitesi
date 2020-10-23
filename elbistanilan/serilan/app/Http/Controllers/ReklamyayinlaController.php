<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Reklamyayinla;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class ReklamyayinlaController extends Controller
{
    //
	

    public function reklamyayinla_all()
    {  
        $this->AdminAuthCheck();
        $all_reklam = DB::table('tbl_reklamyayinla')    
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('admin.reklam_yayinla',['all_reklam'=>$all_reklam]); 
    }

    public function reklamyayinla_aktif()
    {  
        $this->AdminAuthCheck();
        $all_reklam_aktif = DB::table('tbl_reklamyayinla')
        ->where('reklamy_durum','1')
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('admin.reklam_yayinla_aktif',['all_reklam_aktif'=>$all_reklam_aktif]); 
    }

    public function reklamyayinla_pasif()
    {  
        $this->AdminAuthCheck();
        $all_reklam_pasif = DB::table('tbl_reklamyayinla')
        ->where('reklamy_durum','0')
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('admin.reklam_yayinla_pasif',['all_reklam_pasif'=>$all_reklam_pasif]); 
    }


    public function add_reklam(Request $request){
        $this->AdminAuthCheck();
        $reklam_add = new Reklamyayinla(); 
        if($request->hasfile('reklamy_image'))
        {
            $reklamy_image =Storage::putFile('public/upload/reklam/',$request->reklamy_image);
            $reklam_add->reklamy_image = $reklamy_image;
        }
        $reklam_add->reklamy_alan = $request->reklamy_alan;    
        $reklam_add->reklamy_durum = $request->reklamy_durum;
        $reklam_add->save();
        return redirect('/reklam-yayinla')->with('reklam_add',$reklam_add);
    }


    public function edit_reklam($reklamy_id)
	{
        $reklam_edit = Reklamyayinla::find($reklamy_id);
    	return view('admin.reklam_yayinla_edit')->with('reklam_edit',$reklam_edit);
    }

	public function update_reklam(Request $request,$reklam_edit)
	{

        $reklam_edit = Reklamyayinla::find($reklam_edit);
        if($request->hasfile('reklamy_image'))
        {
			Storage::delete($reklam_edit->reklamy_image);
            $reklamy_image =Storage::putFile('public/upload/reklam/',$request->reklamy_image);
            $reklam_edit->reklamy_image = $reklamy_image;      
        }
        $reklam_edit->reklamy_alan = $request->reklamy_alan;    
        $reklam_edit->reklamy_durum = $request->reklamy_durum;    
        
        $reklam_edit->save();
        return redirect('/reklam-yayinla')->with('reklam_edit',$reklam_edit);

	}

    public function delete_reklam($reklamy_id){
        $this->AdminAuthCheck();
		$delete = Reklamyayinla::find($reklamy_id);
        if($delete->reklamy_image)
        {
            Storage::delete($delete->reklamy_image);
		}  
		$delete->delete();
		return redirect('/reklam-yayinla')->with('delete',$delete);
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
