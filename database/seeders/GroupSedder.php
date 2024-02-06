<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::insert([
            [
                'name' => 'Group 1',
                'round_id' => 1,
            ],
            [
                'name' => 'Group 2',
                'round_id' => 1,
            ],
            [
                'name' => 'Group 3',
                'round_id' => 2,
            ],
            [
                'name' => 'Group 4',
                'round_id' => 2,
            ]
        ]);
    }
}
