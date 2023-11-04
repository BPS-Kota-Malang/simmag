<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('id_mahasiswa');
            $table->string('nim');
            $table->string('nama');
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('program_studi');
            $table->string('telepon');
            // $table->integer('jumlah_anggota');
            $table->string('file_proposal');
            $table->string('file_suratpengantar');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('mahasiswas');
    }
}
