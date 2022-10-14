<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNhomth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nhomth', function (Blueprint $table) {
            $table->Increments('nhom_id');
            $table->text('sttlophp');
            $table->text('namhoc_lophp');
            $table->text('hocky_lophp');
            $table->text('tietbd_lophp');
            $table->text('sotiet_lophp');
            $table->text('soluong');
            $table->text('ycpm');
            

            });
    

    }

    
}
