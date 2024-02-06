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
        Schema::table('team_stats', function (Blueprint $table) {
            $table->foreignId('group_id')->after('round_id')->constrained('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('position_points')->after('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_stats', function (Blueprint $table) {
            //
        });
    }
};
