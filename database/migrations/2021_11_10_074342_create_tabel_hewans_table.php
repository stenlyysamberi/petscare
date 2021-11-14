<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelHewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_hewans', function (Blueprint $table) {
            $table->bigIncrements('id_hewan');
            $table->string('nama_hewan',30)->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('umur')->nullable();
            $table->bigInteger('id_jenis_hewan')->unsigned();
            $table->bigInteger('id_pemilik_hewan')->unsigned();
            $table->timestamps();

            $table->foreign('id_pemilik_hewan')->references('id')->on('tabel_pemilik_hewans');
            $table->foreign('id_jenis_hewan')->references('id')->on('tabel_jenis_hewans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_hewans');
    }
}
