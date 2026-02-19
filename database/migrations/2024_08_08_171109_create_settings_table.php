<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_image')->default('uploads/avatar.png');
            $table->string('site_name');
            $table->string('site_title');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->longText('meta_keyword');
            $table->longText('focus_keyword');

            $table->string('address');
            $table->string('email');
            $table->string('phone');


            $table->string('fb_link');
            $table->string('tw_link');
            $table->string('ins_link');
            $table->string('yt_link');
            $table->string('tt_link');

            $table->string('home_banner')->default('uploads/banner.png');
            $table->string('banner_link')->default('https://www.example.com/banner-image');

            $table->string('announcement')->default('t is a long established fact that a reader will be distracted by the readable ');
            $table->string('announcement_status')->default('no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
