<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCandidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_candidate', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->bigInteger('id_request')->unsigned();
            $table->string('nama_candidate');
            $table->string('phone');
            $table->string('email');
            $table->string('alamat');
            $table->string('cv');
            $table->timestamps();

            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_request')->references('id')->on('tbl_request')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_candidate');
    }
}
