<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'author_name' => 'author name',
                'author_image' => 'uploads/avatar.png',
                'site_name' => 'site name',
                'site_title' => 'site title',
                'site_logo' => 'uploads/default-logo.png',
                'site_favicon' => 'uploads/default-favicon.png',
                'meta_title' => 'meta title',
                'meta_description' => 'meta description',
                'meta_keyword' => 'meta keyword',
                'focus_keyword' => 'focus keyword',
                'address' => 'example address, here',
                'email' => 'example@gmail.com',
                'phone' => '013******87',
                'fb_link' => 'https://www.facebook.com/',
                'tw_link' => 'https://www.twitter.com/',
                'ins_link' => 'https://www.instagram.com/',
                'yt_link' => 'https://www.youtube.com/',
                'tt_link' => 'https://www.tiktok.com/',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
