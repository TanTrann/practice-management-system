<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suco extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'noidung','trangthai','noidungkhacphuc','ghichukhac','ngayphananh','ngaykhacphuc','id_user','room_id'
    ];
    protected $primaryKey = 'suco_id';
 	protected $table = 'tbl_suco';
}
