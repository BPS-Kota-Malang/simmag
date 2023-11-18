<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_kerjas')->insert([
            'nama_status' => 'Work From Office (WFO)',
        ]);
        DB::table('status_kerjas')->insert([
            'nama_status' => 'Work From Home (WFH)',
        ]);
    }
}
