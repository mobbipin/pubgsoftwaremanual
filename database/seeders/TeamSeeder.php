<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::insert([
            [
                'name' => 'HIGH VOLTAGE',
                'group_id' => 1,
                'tag' => 'HV',
                'teamPhotoURL' => 'https://i.imgur.com/XqQZQZU.png',
                'slot' => 2,
            ],
            [
                'name' => 'LOW VOLTAGE',
                'group_id' => 1,
                'tag' => 'LV',
                'teamPhotoURL' => 'https://i.imgur.com/XqQZQZU.png',
                'slot' => 3,
            ],
            [
                'name' => 'DA Real Soldiers',
                'group_id' => 2,
                'tag' => 'DRS',
                'teamPhotoURL' => 'https://i.imgur.com/XqQZQZU.png',
                'slot' => 4,
            ],
            [
                'name' => 'Elementrix',
                'group_id' => 2,
                'tag' => 'EX',
                'teamPhotoURL' => 'https://i.imgur.com/XqQZQZU.png',
                'slot' => 5,
            ],

        ]);
    }
}
