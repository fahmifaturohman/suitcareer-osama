<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_request', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->string('nama_perusahaan');
            $table->string('kebutuhan');
            $table->string('file_pendukung')->nullable();
            $table->text('deskripsi_kebutuhan');
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
        Schema::dropIfExists('tbl_request');
    }
}
