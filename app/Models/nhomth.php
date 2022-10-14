<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nhomth extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'sttlophp','namhp_lophp','namhoc_lophp','tietbd_lophp','sotiet_lophp','hocky_lophp','soluong','ycpm',
    ];
    protected $primaryKey = 'nhom_id';
 	protected $table = 'tbl_nhomth';

}
