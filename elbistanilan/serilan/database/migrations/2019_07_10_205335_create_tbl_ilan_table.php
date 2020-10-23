<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblIlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ilan', function (Blueprint $table) {
            $table->increments('ilan_id');
            $table->integer('kat_id');
            $table->integer('users_id');
            $table->string('ilan_baslik');
            $table->string('ilan_adi');
            $table->string('ilan_soyadi');
            $table->string('ilan_email');
            $table->string('ilan_adresi');
            $table->float('ilan_fiyat');
            $table->string('ilan_telefon');         
            $table->text('ilan_detay');
            $table->string('ilan_image');
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
        Schema::dropIfExists('tbl_ilan');
    }
}
