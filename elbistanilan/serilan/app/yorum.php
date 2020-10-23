<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class yorum extends Model
{
    //
    protected $table ='tbl_yorumlar';
    protected $primaryKey = 'yorumlar_id';
    protected $fillable = ['yorumlar_ilan_id','yorumlar_ekleyen','yorumlar_mesaj'];

}
