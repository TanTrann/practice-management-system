<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDkiPhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_dki_phong', function (Blueprint $table) {
            $table->Increments('dki_phong_id');
            $table->text('id_user');
            $table->text('detail_semester_id');
            $table->text('room_id');
            $table->text('id_thu');
            $table->text('id_buoi');
            $table->text('nhomhp_id');

           
            });
    }

   
}
