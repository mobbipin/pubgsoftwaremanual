<?php

namespace Database\Seeders;

use App\Models\TeamStat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamStat::insert([
            [
                'kill' => '0',
                'dead' => '0',
                'position' => '0',
                'team_id' => 1,
                'match_id' => 1,
                'tournament_id' => 1,
                'group_id' => 1,
                'round_id' => 1,

            ],
            [
                'kill' => '0',
                'dead' => '0',
                'position' => '0',
                'team_id' => 2,
                'match_id' => 1,
                'tournament_id' => 1,
                'group_id' => 1,
                'round_id' => 1,

            ],
            [
                'kill' => '0',
                'dead' => '0',
                'position' => '0',
                'team_id' => 3,
                'match_id' => 1,
                'tournament_id' => 1,
                'group_id' => 2,
                'round_id' => 1,

            ],
            [
                'kill' => '0',
                'dead' => '0',
                'position' => '0',
                'team_id' => 4,
                'match_id' => 1,
                'tournament_id' => 1,
                'group_id' => 2,
                'round_id' => 1,

            ]
        ]);
    }
}
