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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('round_id')->nullable()->constrained('rounds')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('first_match_id')->nullable()->constrained('matchs');
            $table->foreignId('second_match_id')->nullable()->constrained('matchs');
            $table->foreignId('third_match_id')->nullable()->constrained('matchs');
            $table->foreignId('fourth_match_id')->nullable()->constrained('matchs');
            $table->foreignId('fifth_match_id')->nullable()->constrained('matchs');
            $table->foreignId('sixth_match_id')->nullable()->constrained('matchs');
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
        Schema::dropIfExists('schedules');
    }
};
