<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    //
    protected $table ='tbl_picture';
    protected $primaryKey = 'picture_id';
    protected $fillable = ['picture_ilan_id','picture_name'];
  
    Public function ilan(){
        return $this->bleongTo('App/ilan');
    }
}
