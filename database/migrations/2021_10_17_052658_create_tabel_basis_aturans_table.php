<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelBasisAturansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_basis_aturans', function (Blueprint $table) {
            $table->bigIncrements('id_basis_atauran',10);
            $table->bigInteger('id_gejala')->unsigned();
            $table->bigInteger('id_penyakit')->unsigned();
            $table->string('bobot',5)->nullable();
            $table->bigInteger('id_hewan')->unsigned()->nullable();
            $table->string('created_at');
            $table->string('updated_at');

            $table->foreign('id_gejala')->references('id')->on('tabel_list_gejalas')->on('tabel_jenis_hewans');

            
            $table->foreign('id_penyakit')->references('id')->on('data_penyakits')->on('tabel_jenis_hewans');
        
            $table->foreign('id_hewan')->references('id')->on('tabel_jenis_hewans')->on('tabel_jenis_hewans');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_basis_aturans');
    }
}
