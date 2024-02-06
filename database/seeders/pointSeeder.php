<?php

namespace Database\Seeders;

use App\Models\Point;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class pointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Point::insert([
            [
                'position' => 1,
                'position_points' => 15,
            ],
            [
                'position' => 2,
                'position_points' => 12,
            ],
            [
                'position' => 3,
                'position_points' => 10,
            ],
            [
                'position' => 4,
                'position_points' => 8,
            ],
            [
                'position' => 5,
                'position_points' => 6,
            ],
            [
                'position' => 6,
                'position_points' => 4,
            ],
            [
                'position' => 7,
                'position_points' => 2,
            ],
            [
                'position' => 8,
                'position_points' => 1,
            ],
            [
                'position' => 9,
                'position_points' => 1,
            ],
            [
                'position' => 10,
                'position_points' => 1,
            ],
            [
                'position' => 11,
                'position_points' => 1,
            ],
            [
                'position' => 12,
                'position_points' => 1,
            ],
            [
                'position' => 13,
                'position_points' => 0,
            ],
            [
                'position' => 14,
                'position_points' => 0,
            ],
            [
                'position' => 15,
                'position_points' => 0,
            ],
            [
                'position' => 16,
                'position_points' => 0,
            ],

        ]);
    }
}
