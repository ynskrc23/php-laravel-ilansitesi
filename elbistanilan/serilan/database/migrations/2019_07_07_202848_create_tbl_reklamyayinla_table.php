<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblReklamyayinlaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_reklamyayinla', function (Blueprint $table) {
            $table->increments('reklamy_id');
            $table->string('reklamy_image');
            $table->string('reklamy_alan');
            $table->integer('reklamy_durum');
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
        Schema::dropIfExists('tbl_reklamyayinla');
    }
}
