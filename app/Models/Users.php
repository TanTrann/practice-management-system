<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Users extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'id_user', 'user_name', 'user_password','user_phone'
    ];
    protected $primaryKey = 'user_id';
 	protected $table = 'tbl_user';

 	
 	
}