<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'title' => 'Web Design & Developer',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now(),
                'role' => 'admin',
                'password' => Hash::make('admin@gmail.com'),
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
