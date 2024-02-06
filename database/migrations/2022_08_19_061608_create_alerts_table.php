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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->constrained('tournaments')->onDelete('cascade');
            $table->foreignId('round_id')->constrained('rounds')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('first_blood')->nullable()->constrained('players')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('first_fifty_kill')->nullable()->constrained('players')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('first_hundred_kill')->nullable()->constrained('players')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('first_team_fifty_kill')->nullable()->constrained('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('first_team_hundred_kill')->nullable()->constrained('teams')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('alerts');
    }
};
