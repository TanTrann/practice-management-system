<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblVersion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_version', function (Blueprint $table) {
            $table->Increments('version_id');
            $table->text('version_number');
            $table->timestamps();
        });
    }

  
}
