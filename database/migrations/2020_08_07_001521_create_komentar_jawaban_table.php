<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_jawaban', function (Blueprint $table) { 
            $table->increments('id');
            $table->char('isi', 255);
            $table->timestamps();
            $table->integer('jawaban_id')->unsigned();
            $table->integer('profil_id')->unsigned(); 
            $table->foreign('jawaban_id')->references('id')->on('jawaban');
            $table->foreign('profil_id')->references('id')->on('profil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop table 
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('komentar_jawaban');
    }
}
