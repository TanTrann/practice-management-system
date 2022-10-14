<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dkiphong extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'user_id','detail_semester_id','room_id','id_thu','id_buoi','nhom_id','gio_bd','gio_kt','nhom_id'
    ];
    protected $primaryKey = 'dki_phong_id';
 	protected $table = 'tbl_dki_phong';
}
