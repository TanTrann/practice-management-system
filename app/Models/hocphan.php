<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocphan extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'mahp','tenhp'
    ];
    protected $primaryKey = 'hocphan_id';
 	protected $table = 'tbl_hocphan';
}
