<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	 'subject_name','mahocphan'
    ];
    protected $primaryKey = 'subject_id';
 	protected $table = 'tbl_subject';
}