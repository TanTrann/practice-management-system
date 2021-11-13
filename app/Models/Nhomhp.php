<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhomhp extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'user_id','nhomhp_status','nhom','mahocphan','subject_id','subject_name','soluong'
    ];
    protected $primaryKey = 'nhomhp_id';
 	protected $table = 'tbl_nhomhp';

}
