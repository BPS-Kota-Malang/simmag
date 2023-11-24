<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'nama_divisi' => 'Tata Usaha',
        ]);
        DB::table('divisions')->insert([
            'nama_divisi' => 'Distribusi',
        ]);
        DB::table('divisions')->insert([
            'nama_divisi' => 'Produksi',
        ]);
        DB::table('divisions')->insert([
            'nama_divisi' => 'Sosial',
        ]);
        DB::table('divisions')->insert([
            'nama_divisi' => 'Nerwilis',
        ]);
        DB::table('divisions')->insert([
            'nama_divisi' => 'IPDS',
        ]);
    }
}
