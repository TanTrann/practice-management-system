<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_schedule', function (Blueprint $table) {
            $table->Increments('schedule_id');
            $table->text('hocki');
            $table->text('date_start');
            $table->text('date_end');
            $table->timestamps();
        });
    }

   
}
