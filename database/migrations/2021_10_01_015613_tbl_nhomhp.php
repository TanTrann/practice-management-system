<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblNhomhp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nhomhp', function (Blueprint $table) {
            $table->Increments('nhomhp_id');
            $table->text('id_hocphan');
            $table->text('id_user');
            $table->text('nhomhp_status');
            $table->timestamps();
            });
    }

  
}
