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
            'email' => 'Superadmin@gmail.com',
            'roles_id'  => 1,
            'divisions_id' => 5,
            'status' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
