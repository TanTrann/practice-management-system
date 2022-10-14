<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocky extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'hocky'
    ];
    protected $primaryKey = 'hocky_id';
 	protected $table = 'tbl_hocky';
}
