<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'ma_khoa','ten_khoa'
    ];
    protected $primaryKey = 'khoa_id';
 	protected $table = 'tbl_khoa';
}
