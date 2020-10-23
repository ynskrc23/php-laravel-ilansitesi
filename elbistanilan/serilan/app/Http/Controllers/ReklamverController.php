<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Reklamver;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class ReklamverController extends Controller
{
    //
 
     public function add_reklamver(Request $request){
       
        $reklam_add = new Reklamver(); 
        if($request->hasfile('reklamver_foto'))
        {
            $reklamver_foto =Storage::putFile('public/upload/reklamver/',$request->reklamver_foto);
            $reklam_add->reklamver_foto = $reklamver_foto;
        }

        $reklam_add->reklamver_adi = $request->reklamver_adi;
        $reklam_add->reklamver_soyadi = $request->reklamver_soyadi;
        $reklam_add->reklamver_suresi = $request->reklamver_suresi;
        $reklam_add->reklamver_alan = $request->reklamver_alan;
        $reklam_add->reklamver_telefon = $request->reklamver_telefon;
      

        $reklam_add->save();
        return redirect('/')->with('reklam_add',$reklam_add);
    }


    public function delete_reklamver($reklamver_id){
     
		$delete = Reklamver::find($reklamver_id);
        if($delete->reklamver_foto)
        {
            Storage::delete($delete->reklamver_foto);
		}  
		$delete->delete();
		return redirect('/dashboard')->with('delete',$delete);
    }
}
