<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thu extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'thu'
    ];
    protected $primaryKey = 'id_thu';
 	protected $table = 'tbl_thu';
}
