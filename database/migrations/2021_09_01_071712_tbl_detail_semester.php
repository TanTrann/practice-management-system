<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDetailSemester extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_detail_semester', function (Blueprint $table) {
        $table->Increments('detail_semester_id');
        $table->text('schedule_id');
        $table->text('week');
        $table->timestamps();
        });
    }

  
}