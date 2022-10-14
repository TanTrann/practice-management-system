<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNamhoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_namhoc', function (Blueprint $table) {
            $table->Increments('namhoc_id');
            $table->text('namhoc');
            
            });
    }

  
}
