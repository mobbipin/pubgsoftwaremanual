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
        Schema::create('team_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('kill')->default(0);
            $table->boolean('dead')->default(0);
            $table->integer('position')->default(0);
            $table->foreignId('team_id')->constrained('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('match_id')->constrained('matchs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tournament_id')->constrained('tournaments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('round_id')->constrained('rounds')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('team_stats');
    }
};