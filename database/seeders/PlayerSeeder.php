<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Player::insert([
        [
            'name'=>'Player 1',
            'team_id'=>1,
        ],
        [
            'name'=>'Player 2',
            'team_id'=>1,
        ],
        [
            'name'=>'Player 3',
            'team_id'=>2,
        ],
        [
            'name'=>'Player 4',
            'team_id'=>2,
        ],
        [
            'name'=>'Player 5',
            'team_id'=>3,
        ],
        [
            'name'=>'Player 6',
            'team_id'=>3,
        ],
        [
            'name'=>'Player 7',
            'team_id'=>4,
        ],
        [
            'name'=>'Player 8',
            'team_id'=>4,
        ],
        ]);
    }
}
