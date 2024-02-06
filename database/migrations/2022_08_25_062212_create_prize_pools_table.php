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
        Schema::create('prize_pools', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->integer('prize');
            $table->foreignId('round_id')->nullable()->constrained('rounds')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tournament_id')->nullable()->constrained('tournaments')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('prize_pools');
    }
};
