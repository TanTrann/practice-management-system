<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblHocphan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hocphan', function (Blueprint $table) {
            $table->Increments('hocphan_id');
            $table->text('mahp');
            $table->text('tenhp');
            });
    }

    
}
