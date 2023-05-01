<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
            ],
            [
            'email' => 'owner@gmail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
            ],
            [
            'email' => 'customer@gmail.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('password'),
            ]
        ]);

        DB::table('admins')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'handphone' => '081377954513',
            'address' => 'Jalan jalan jalan',
            'user_id' => 1,

        ]);
        DB::table('owners')->insert([
            'first_name' => 'Super',
            'last_name' => 'Owner',
            'handphone' => '081377954513',
            'ktp' => '081377954513',
            'address' => 'Jalan jalan jalan',
            'user_id' => 2,

        ]);
        DB::table('customers')->insert([
            'first_name' => 'Super',
            'last_name' => 'Customer',
            'handphone' => '081377954513',
            'address' => 'Jalan jalan jalan',
            'user_id' => 3,

        ]);
    }
}
