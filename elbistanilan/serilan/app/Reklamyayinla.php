<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reklamyayinla extends Model
{
    //
    protected $table ='tbl_reklamyayinla';
    protected $primaryKey = 'reklamy_id';
    protected $fillable = ['reklamy_image','reklamy_alan','reklamy_durum'];
}
