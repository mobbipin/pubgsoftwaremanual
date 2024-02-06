<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instaBgURL')->nullable();
            $table->string('primaryFontColor')->nullable();
            $table->string('game')->nullable();
            $table->string('instaThumbBg')->nullable();
            $table->string('secondaryFontColor')->nullable();
            $table->string('logoURL')->nullable();
            $table->string('themeColor')->nullable();
            $table->string('lowerTournamentLogo')->nullable();
            $table->string('rosterBgURL')->nullable();
            $table->string('secondaryColor')->nullable();
            $table->string('lowerOrgOrSponsorLogo')->nullable();
            $table->string('thumbnailBgURL')->nullable();
            $table->string('thirdColorBorder')->nullable();
            $table->string('lowerTitle')->nullable();
            $table->string('streamResultBgURL')->nullable();
            $table->string('forthColor')->nullable();
            $table->string('ticketText')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
};