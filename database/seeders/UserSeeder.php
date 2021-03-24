<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'address' => 'admin',
            'email'=>'admin@admin.com',
            'password' => Hash::make(123456789),
            'phone' => 1234567890,
            'rol' => 'admin',
            'created_at' => now()->toDateString(),
        ]);

        DB::table('users')->insert([
            'name'=>'User',
            'address' => 'user',
            'email'=>'user@user.com',
            'password' => Hash::make(123456789),
            'phone' => 1234567890,
            'rol' => 'user',
            'created_at' => now()->toDateString(),
        ]);

    }
}
