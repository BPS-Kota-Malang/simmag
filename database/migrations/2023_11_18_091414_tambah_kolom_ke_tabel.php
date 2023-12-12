<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomKeTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('logbooks', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2023_11_18_091414_tambah_kolom_ke_tabel.php
        Schema::table('logbooks', function (Blueprint $table) {
            //
        });
=======
        Schema::dropIfExists('jams');
>>>>>>> fitur-statuskerja:database/migrations/2023_10_12_070121_create_jam.php
    }
}
