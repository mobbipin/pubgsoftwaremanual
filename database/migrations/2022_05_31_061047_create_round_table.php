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
        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained('tournaments')->onDelete('cascade');
            $table->string('name');
            $table->string('subname')->nullable();
            $table->integer('liveGameID')->nullable();
            $table->string('liveType')->default('hide');
            $table->string('tagLine')->nullable();
            $table->integer('resultPerPageSingle')->default(9);
            $table->string('days')->nullable();
            $table->integer('resultPerPageOverall')->default(9);
            $table->string('time')->nullable();
            $table->integer('EntryPerPage')->default(9);
            $table->string('channel')->nullable();
            $table->integer('EnterPerRow')->default(3);
            $table->boolean('isTest')->default(0);
            $table->boolean('needLogo')->default(0);
            $table->boolean('showLower')->default(0);
            $table->boolean('showRoster')->default(0);
            $table->boolean('showAlert')->default(0);
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
        Schema::dropIfExists('round');
    }
};
