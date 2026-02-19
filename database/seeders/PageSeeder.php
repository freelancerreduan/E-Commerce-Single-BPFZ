<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'name' => 'Terms & Conditions',
                'content' => 'Terms & Conditions',
                'status' => 'hide',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Refund and Returns Policy',
                'content' => 'Refund and Returns Policy',
                'status' => 'hide',
                'created_at' => Carbon::now()
            ],[
                'name' => 'Privacy Policy',
                'content' => 'Privacy Policy',
                'status' => 'hide',
                'created_at' => Carbon::now()
            ],[
                'name' => 'About us',
                'content' => 'About us',
                'status' => 'hide',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
