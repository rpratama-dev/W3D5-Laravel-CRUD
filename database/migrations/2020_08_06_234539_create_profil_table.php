<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CreateProfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nama_lengkap',100);
            $table->char('email', 45)->unique();
            $table->char('photo', 45);
            $table->timestamps();
        });
        /* 
        */
        $current_timestamp = Carbon::now()->toDateTimeString();
        $store = DB::table('profil')->insert([
            'id' => 1,
            'nama_lengkap' => "riyan pratama",
            'email' => "riyan@mail.com",
            'photo' => "/img/photo.jpg",
            'created_at' => $current_timestamp,
            'updated_at' => $current_timestamp
        ]); 
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
        Schema::dropIfExists('profil');
    }
}
