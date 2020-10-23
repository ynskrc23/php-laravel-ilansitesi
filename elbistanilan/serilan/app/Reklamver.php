<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reklamver extends Model
{
    //
    protected $table ='tbl_reklamver';
    protected $primaryKey = 'reklamver_id';
    protected $fillable = ['reklamver_adi','reklamver_soyadi','reklamver_suresi','reklamver_alan','reklamver_telefon','reklamver_foto'];
}
