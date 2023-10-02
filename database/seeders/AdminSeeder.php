<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Produksi',
            'email' => 'Admin@gmail.com',
            'role'  => 2,
            'keterangan'  => 'Pembina Produksi',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Sosial',
            'email' => 'Admin2@gmail.com',
            'role'  => 2,
            'keterangan'  => 'Pembina Sosial',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Neraca',
            'email' => 'Admin3@gmail.com',
            'role'  => 2,
            'keterangan'  => 'Pembina Neraca',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin IPDS',
            'email' => 'Admin4@gmail.com',
            'role'  => 2,
            'keterangan'  => 'Pembina IPDS',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Distribusi',
            'email' => 'Admin5@gmail.com',
            'role'  => 2,
            'keterangan'  => 'Pembina Distribusi',
            'password' => Hash::make('password'),
        ]);
    }
}
