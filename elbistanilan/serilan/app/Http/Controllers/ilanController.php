<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ilan;
use App\yorum;
use App\picture;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class ilanController extends Controller
{
    //
    public function index()
    {
        $this->AdminAuthCheck();
        return view('ilan_ekle');
    }


    public function ilan_all()
    {      
        $all_ilan = DB::table('tbl_ilan')   
        ->join('tbl_kategori','tbl_ilan.kat_id','=','tbl_kategori.kat_id')		 
        ->orderBy('created_at', 'desc')
        ->limit(20);
        return view('content',['all_ilan'=>$all_ilan]); 
    }

    public function ilan_detay($ilan_id)
    {
       
        $ilan_details=DB::table('tbl_ilan')
        ->join('tbl_kategori','tbl_kategori.kat_id','=','tbl_kategori.kat_id')      
        ->select('tbl_ilan.*','tbl_kategori.kat_ad')
        ->where('tbl_ilan.ilan_id',$ilan_id)      
        ->first();
        return view('ilan_detay')->with('ilan_details', $ilan_details);
    }

    public function add_ilan(Request $request)
    {   
        $this->AdminAuthCheck();
       
        $listele = DB::table('tbl_ilan')->count();
        	$ilan_add= new ilan; 
            if($request->hasfile('ilan_image')){ 

            	$ilan_image =Storage::putFile('public/upload/ilan/',$request->ilan_image);
            	$ilan_add->ilan_image = $ilan_image;                          
                $ilan_add->kat_id = $request->kat_id;
                $ilan_add->users_id = $request->users_id;
                $ilan_add->ilan_baslik = $request->ilan_baslik;
                $ilan_add->ilan_adi = $request->ilan_adi;
                $ilan_add->ilan_soyadi = $request->ilan_soyadi;
                $ilan_add->ilan_email = $request->ilan_email;
                $ilan_add->ilan_adresi = $request->ilan_adresi;
                $ilan_add->ilan_fiyat = $request->ilan_fiyat;
                $ilan_add->ilan_telefon = $request->ilan_telefon;
                $ilan_add->ilan_detay = $request->ilan_detay;
                $ilan_add->save();

                return redirect('/ilan-foto')->with('success', 'Your images has been successfully');
            }

             else {
                $ilan_add= new ilan;                  
                $ilan_add->ilan_image = $request->ilan_image;
                $ilan_add->kat_id = $request->kat_id;
                $ilan_add->users_id = $request->users_id;
                $ilan_add->ilan_baslik = $request->ilan_baslik;
                $ilan_add->ilan_adi = $request->ilan_adi;
                $ilan_add->ilan_soyadi = $request->ilan_soyadi;
                $ilan_add->ilan_email = $request->ilan_email;
                $ilan_add->ilan_adresi = $request->ilan_adresi;
                $ilan_add->ilan_fiyat = $request->ilan_fiyat;
                $ilan_add->ilan_telefon = $request->ilan_telefon;
                $ilan_add->ilan_detay = $request->ilan_detay;
                $ilan_add->save();

                return redirect('/ilan-foto')->with('success', 'Your images has been successfully'); 
            }           
   
    }
    
   
    public function edit_ilan($ilan_id)
	{
        $ilan_edit = ilan::find($ilan_id);
    	return view('ilan_edit')->with('ilan_edit',$ilan_edit);
    }

	public function update_ilan(Request $request,$ilan_edit)
	{
        $ilan_edit = ilan::find($ilan_edit);
       
        if($request->hasfile('ilan_image'))
        {
			Storage::delete($ilan_edit->ilan_image);
            $ilan_image =Storage::putFile('public/upload/ilan/',$request->ilan_image);
            $ilan_edit->ilan_image = $ilan_image;      
        }       
    
        $ilan_edit->kat_id = $request->kat_id;
        $ilan_edit->users_id = $request->users_id;
        $ilan_edit->ilan_baslik = $request->ilan_baslik;
        $ilan_edit->ilan_adi = $request->ilan_adi;
        $ilan_edit->ilan_soyadi = $request->ilan_soyadi;
        $ilan_edit->ilan_email = $request->ilan_email;
        $ilan_edit->ilan_adresi = $request->ilan_adresi;
        $ilan_edit->ilan_fiyat = $request->ilan_fiyat;
        $ilan_edit->ilan_telefon = $request->ilan_telefon;
        $ilan_edit->ilan_detay = $request->ilan_detay;      
        

        $ilan_edit->save();
        return redirect('/sayfa')->with('ilan_edit',$ilan_edit);

	}

    public function delete_ilan($ilan_id){
        $this->AdminAuthCheck();
    
        $delete = ilan::find($ilan_id);
        if($delete->ilan_image)
        {
            Storage::delete($delete->ilan_image);
		}  
	
		$delete->delete();
		
    	Picture::where('picture_ilan_id', ilan_id)->delete();

		return redirect('/sayfa')->with('delete',$delete,$picture);
    }

    public function edit_resim($ilan_id){
        $ilan_resim_details=DB::table('tbl_ilan')         
        ->join('tbl_picture','tbl_ilan.ilan_id','=','tbl_picture.picture_ilan_id')   
        ->select('tbl_ilan.*','tbl_picture.*')
        ->where('tbl_ilan.ilan_id',$ilan_id)      
        ->first();
        return view('ilan_resim')->with('ilan_resim_details', $ilan_resim_details);
    }

    public function delete_resim($picture_id){
        $picture = picture::find($picture_id);
        
        if(file_exists(public_path('/storage/upload/ilan/' . $picture->picture_name))){
             unlink(public_path('/storage/upload/ilan/' . $picture->picture_name));
        }
        $picture->delete();
        
        return back()->with('success', 'Your images has been successfully');
    }
    
    public function ilan_foto(){   
        return view('ilan_foto');
    }

    public function add_foto(Request $request){
 
        if($request->hasfile('filename'))
     	{
            $image_array=$request->file('filename');
            $image_len=count($image_array);

            for($i=0;$i<$image_len;$i++)
            {
                $image_ext=$image_array[$i]->getClientOriginalExtension();
                $new_image_name=rand(1,999999).".".$image_ext;
                $image_path=public_path('storage/upload/ilan/');               
                $image_array[$i]->move($image_path,$new_image_name);

                $picture= new picture;                  
                $idBilgisi= ilan::all()->last()->ilan_id;  
                $picture->picture_ilan_id = $idBilgisi;                         
                $picture->picture_name =  $new_image_name;
                $picture->save();
            }

            return redirect('/sayfa')->with('success', 'Your images has been successfully');
        }

        else{
        	return redirect('/sayfa')->with('success', 'Your images has been successfully');
        }

    }

     public function update_foto(Request $request){ 		
      	
        if($request->hasfile('filename'))
     	{	     
            $image_array=$request->file('filename');
            $image_len=count($image_array);

            for($i=0;$i<$image_len;$i++)
            {
                $image_ext=$image_array[$i]->getClientOriginalExtension();
                $new_image_name=rand(1,999999).".".$image_ext;
                $image_path=public_path('storage/upload/ilan/');               
                $image_array[$i]->move($image_path,$new_image_name);

                $picture= new picture;                                
                $picture->picture_ilan_id = $request->image_id;                         
                $picture->picture_name =  $new_image_name;
                $picture->save();
            }

            return back()->with('success', 'Your images has been successfully');
        }

        else{
        	return back()->with('success', 'Your images has been successfully');
        }

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
