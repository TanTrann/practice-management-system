<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblChucvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_chucvu', function (Blueprint $table) {
            $table->Increments('chucvu_id');
            $table->text('id_chucvu');
            $table->text('ten_chucvu');
            $table->timestamps();
            });
    }

  
}
