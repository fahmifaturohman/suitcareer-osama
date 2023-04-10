<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->string('nama_perusahaan', 255);
            $table->string('alamat', 255);
            $table->string('email', 255);
            $table->string('kontak', 255);
            $table->text('deskripsi');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profil');
    }
}
