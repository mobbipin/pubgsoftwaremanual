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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_phone');
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
        \App\Models\Setting::create([
            'company_name' => 'Sortcut Nepal',
            'company_email' => 'sortcutnepal@gmail.com',
            'company_phone' => '+977-9800000000',
            'website' => \Illuminate\Support\Facades\URL::to('/'),
            'address' => 'kathmandu, ringroad-5',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
