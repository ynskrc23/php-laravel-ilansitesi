<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblYorumlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_yorumlar', function (Blueprint $table) {
       
            $table->increments('yorumlar_id');      
            $table->integer('yorumlar_ilan_id');
            $table->string('yorumlar_ekleyen');
            $table->text('yorumlar_mesaj');
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
        Schema::dropIfExists('tbl_yorumlar');
    }
}
