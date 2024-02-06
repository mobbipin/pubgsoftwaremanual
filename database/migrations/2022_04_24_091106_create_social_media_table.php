<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('youtube_link');
            $table->string('instagram_link');
            $table->timestamps();
        });

        \App\Models\SocialMedia::insert([
            'facebook_link' => 'https://www.facebook.com/',
            'twitter_link' => 'https://twitter.com/',
            'instagram_link' => 'https://www.instagram.com/',
            'youtube_link' => 'https://www.youtube.com/'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_media');
    }
};
