<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'hoc_ki','date_start','date_end'
    ];
    protected $primaryKey = 'schedule_id';
 	protected $table = 'tbl_schedule';
}
