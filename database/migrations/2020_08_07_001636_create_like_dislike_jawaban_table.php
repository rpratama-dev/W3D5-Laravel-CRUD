<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeDislikeJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_dislike_jawaban', function (Blueprint $table) { 
            $table->increments('id');
            $table->integer('jawaban_id')->unsigned();
            $table->integer('profil_id')->unsigned();
            $table->integer('point');
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
        Schema::dropIfExists('like_dislike_jawaban');
    }
}
