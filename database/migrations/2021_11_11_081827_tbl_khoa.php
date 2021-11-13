<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblKhoa extends Migration
{
    
    public function up()
    {
        Schema::create('tbl_khoa', function (Blueprint $table) {
            $table->Increments('khoa_id');
            $table->text('ma_khoa');
            $table->text('ten_khoa');
            });
    }
    

}
