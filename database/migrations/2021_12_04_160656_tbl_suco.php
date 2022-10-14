<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSuco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_suco', function (Blueprint $table) {
            $table->Increments('suco_id');
            $table->text('noidung');
            $table->text('trangthai');
            $table->text('noidungkhacphuc');
            $table->text('ghichukhac');
            $table->text('ngayphananh');
            $table->text('ngaykhacphuc');

            });
    }

  
}
