<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lophp extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'namhoc_lophp','namhoc_lophp','mahp_lophp','tietbd_lophp','sotiet_lophp','thu_lophp','macb_lophp','status_lophp','tongnhom'
    ];
    protected $primaryKey = 'sttlophp';
 	protected $table = 'tbl_lophp';
}
