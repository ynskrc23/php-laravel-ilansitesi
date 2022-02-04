<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ilan extends Model
{
    //test
    protected $table ='tbl_ilan';
    protected $primaryKey = 'ilan_id';
    protected $fillable = ['kat_id','users_id','ilan_baslik','ilan_adi','ilan_soyadi','ilan_email','ilan_adresi','ilan_fiyat','ilan_telefon','ilan_detay','ilan_image'];

    public function picture()
   {
      return $this->hasMany('App\picture','picture_ilan_id','ilan_id');
   }
}
