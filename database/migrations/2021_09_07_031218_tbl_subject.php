<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subject', function (Blueprint $table) {
            $table->Increments('subject_id');
            $table->text('subject_name');
            $table->timestamps();
            });
        
            
    }

   
}
