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
            'roles_id'  => 3,
            'divisions_id' => 1,
            'status' => 2,
            'email_verified_at' => '2023-10-07 05:26:42',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Sosial',
            'email' => 'Admin2@gmail.com',
            'roles_id'  => 3,
            'divisions_id' => 2,
            'status' => 2,
            'email_verified_at' => '2023-10-07 05:26:42',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Neraca',
            'email' => 'Admin3@gmail.com',
            'roles_id'  => 3,
            'divisions_id' => 3,
            'status' => 2,
            'email_verified_at' => '2023-10-07 05:26:42',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin IPDS',
            'email' => 'Admin4@gmail.com',
            'roles_id'  => 3,
            'divisions_id' => 4,
            'status' => 2,
            'email_verified_at' => '2023-10-07 05:26:42',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Distribusi',
            'email' => 'Admin5@gmail.com',
            'roles_id'  => 3,
            'divisions_id' => 5,
            'status' => 2,
            'email_verified_at' => '2023-10-07 05:26:42',
            'password' => Hash::make('password'),
        ]);
    }
}
