<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSoftware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_software', function (Blueprint $table) {
            $table->Increments('software_id');
            $table->string('software_name');
            $table->text('software_ver');
            $table->timestamps();
        });
    }

   
}
