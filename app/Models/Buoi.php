<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buoi extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'buoi'
    ];
    protected $primaryKey = 'id_buoi';
 	protected $table = 'tbl_buoi';
}
