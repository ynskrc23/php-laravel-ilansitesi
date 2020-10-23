<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\yorum;
use App\ilan;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
class YorumController extends Controller
{
    //

    
    public function add_yorum(Request $request)
    {   
      
        $yorum_add = new yorum();     
        $yorum_add->yorumlar_ilan_id = $request->yorumlar_ilan_id;
        $yorum_add->yorumlar_ekleyen = $request->yorumlar_ekleyen;
        $yorum_add->yorumlar_mesaj = $request->yorumlar_mesaj;

        $yorum_add->save();
        return redirect()->back();
    }

    
}
