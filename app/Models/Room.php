<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'room_name','room_quantity'
    ];
    protected $primaryKey = 'room_id';
 	protected $table = 'tbl_room';

 	
}

