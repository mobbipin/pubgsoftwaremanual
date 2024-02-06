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
        Schema::table('player_stats', function (Blueprint $table) {
            $table->foreignId('match_id')->after('dead')->constrained('matchs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('team_id')->after('match_id')->constrained('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('active')->after('dead')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_stats', function (Blueprint $table) {
            //
        });
    }
};
