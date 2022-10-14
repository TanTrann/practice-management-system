<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblLophp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_lophp', function (Blueprint $table) {
            $table->Increments('sttlophp');
            $table->text('namhoc');
            $table->text('hocky');
            $table->text('mahp');
            $table->text('tietbd');
            $table->text('sotiet');
            $table->text('thu');
            $table->text('macb');
            

            });
    }

   
}
