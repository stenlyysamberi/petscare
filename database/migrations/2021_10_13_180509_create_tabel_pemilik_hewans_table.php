<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPemilikHewansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pemilik_hewans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> text('name');
            $table->string('username',20);
            $table->text('password');
            $table->text('alamat');
            $table->string('phone',13);
            $table->string('hak_akses',20);
            $table->date('updated_at');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_pemilik_hewans');
    }
}
