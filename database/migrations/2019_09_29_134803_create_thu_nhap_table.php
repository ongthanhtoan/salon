<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuNhapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thu_nhap', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('thu_nhap_id')->autoIncrement();
            $table->integer('chi_nhanh_id');
            $table->integer('id_nguoi_dung');
            $table->integer('thu_nhap_so_tien');
            $table->bigInteger('thu_nhap_ngay_nhap');
            $table->foreign('chi_nhanh_id')->references('chi_nhanh_id')->on('chi_nhanh')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_nguoi_dung')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thu_nhap');
    }
}
