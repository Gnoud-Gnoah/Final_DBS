<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tax_codes', function (Blueprint $table) {
            $table->increments('tax_code_id');
            $table->dateTime('ngayhd');
            $table->enum('quanly', ["BAC GIANG", "BAC NINH", "NINH BINH", "BINH YEN", "YEN HOA", "HOA BINH", "BINH DUONG", "DUONG HOANG"]);
            $table->enum('tinhtrang', ["DANG HOAT DONG", "DUNG HOAT DONG"]);
            $table->bigInteger('socmnd')->unique();
            $table->bigInteger('masothue')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tax_codes');
    }
}
