<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiNhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_nhanh', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->integer('chi_nhanh_id')->autoIncrement();
            $table->string('chi_nhanh_ma',255);
            $table->string('chi_nhanh_ten',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_nhanh');
    }
}
