<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => 'superadmin@magang.bpskotamalang.id',
            'roles_id'  => 2,
            'status' => 2,
            'divisions_id' => 4,
            'email_verified_at' => '2023-10-07 05:26:42',
            'password' => Hash::make('password'),
        ]);
    }
}
