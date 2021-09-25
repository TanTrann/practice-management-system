<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSemester extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'schedule_id','week',
    ];
    protected $primaryKey = 'detail_semester_id';
 	protected $table = 'tbl_detail_semester';
}
