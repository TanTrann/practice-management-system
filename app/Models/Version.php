<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'version_number','software_id'
    ];
    protected $primaryKey = 'version_id';
 	protected $table = 'tbl_version';

}
