<?php

namespace Database\Seeders;

use App\Models\PlayerStat;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RoleAndPermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ModuleSeeder::class,
            TournamentsSeeder::class,
            RoundSeeder::class,
            MatchSeeder::class,
            GroupSedder::class,
            TeamSeeder::class,
            PlayerSeeder::class,
            TeamStatSeeder::class,
            PlayerStatSeeder::class,
            mapSeeder::class,
            pointSeeder::class,
        ]);
    }
}
