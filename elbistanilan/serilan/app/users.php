<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //
    protected $table ='tbl_users';
    protected $primaryKey = 'users_id';
    protected $fillable = ['users_ad','users_password','users_email'];

}
