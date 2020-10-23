<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;

class iletisimController extends Controller
{
    //
    public function iletisim()
    {
        return view('iletisim');
    }

    public function send(Request $request){
    	$this->validate($request,[
    		'isim'	=> 'required',
    		'email' => 'required|email',
    		'konu'  => 'required',
    		'mesaj' => 'required'
    	]);

    	$data = array(
    		'isim'	=> $request->isim,
    		'konu'  => $request->konu,
    		'email' => $request->email,
    		'mesaj' => $request->mesaj
    	);

    	Mail::to('info@elbistanilan.com')->send(new SendMail($data));
    	return back()->with('success','Thank you');
    }
}
