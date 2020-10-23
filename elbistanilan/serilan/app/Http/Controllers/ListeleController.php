<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\ilan;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class ListeleController extends Controller
{
    //
    public function arsa_listele()
    {     
        return view('listele.arsa_listele');  
    }

    public function daire_listele()
    {     
        return view('listele.daire_listele');   
    }

    public function isyeri_listele()
    {     
        return view('listele.isyeri_listele');
  
    }

    public function kiralik_listele()
    {     
        return view('listele.kiralik_listele');   
    }

    public function sifir_listele()
    {     
        return view('listele.sifir_listele'); 
    }

    public function ikinciel_listele()
    {     
        return view('listele.ikinciel_listele'); 
    }

    public function isilanlari_listele()
    {     
        return view('listele.isilanlari_listele');
    }

    public function ikincielurunler_listele()
    {     
        return view('listele.ikincielurunler_listele');
    }

    public function canlihayvan_listele()
    {     
        return view('listele.canlihayvan_listele');
    }

    public function yedekparca_listele()
    {     
        return view('listele.yedekparca_listele');
    }

    public function ozelders_listele()
    {     
        return view('listele.ozelders_listele');
    }
    
}
