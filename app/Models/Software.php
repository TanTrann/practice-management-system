<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'software_name','software_ver'
    ];
    protected $primaryKey = 'software_id';
 	protected $table = 'tbl_software';

}
