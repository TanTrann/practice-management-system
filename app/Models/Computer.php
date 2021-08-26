<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'room_id','computer_name',
    ];
    protected $primaryKey = 'computer_id';
 	protected $table = 'tbl_computer';
}
