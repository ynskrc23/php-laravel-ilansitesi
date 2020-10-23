<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblReklamverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reklamver', function (Blueprint $table) {
            $table->increments('reklamver_id');
            $table->string('reklamver_adi');
            $table->string('reklamver_soyadi');
            $table->string('reklamver_suresi');
            $table->string('reklamver_alan');
            $table->string('reklamver_telefon');
            $table->string('reklamver_foto');
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
        Schema::dropIfExists('tbl_reklamver');
    }
}
