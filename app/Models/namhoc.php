<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class namhoc extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'namhoc'
    ];
    protected $primaryKey = 'namhoc_id';
 	protected $table = 'tbl_namhoc';
}
