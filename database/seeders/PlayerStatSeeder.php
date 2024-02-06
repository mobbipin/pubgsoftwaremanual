<?php

namespace Database\Seeders;

use App\Models\PlayerStat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerStatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlayerStat::insert([
            [
                'player_id'    => '1',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '1',
            ],
            [
                'player_id'    => '2',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '1',
            ],
            [
                'player_id'    => '3',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '2',
            ],
            [
                'player_id'    => '4',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '2',
            ],
            [
                'player_id'    => '5',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '3',
            ],
            [
                'player_id'    => '6',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '3',
            ],
            [
                'player_id'    => '7',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '4',
            ],
            [
                'player_id'    => '8',
                'kill'    => '0',
                'dead'    => '0',
                'match_id'    =>  '1',
                'team_id'    => '4',
            ],

        ]);
    }
}
