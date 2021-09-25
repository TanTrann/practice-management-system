<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDsTkb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ds_tkb', function (Blueprint $table) {
            $table->Increments('ds_tkb_id');
            $table->text('week');
            $table->text('thu');
            $table->text('hoc_ki');
            $table->text('subject_name');
            $table->timestamps();
            });
        
            
    }

    
}
