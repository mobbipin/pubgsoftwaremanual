<?php

namespace Database\Seeders;

use App\Models\Matchz;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class MatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Matchz::insert([
            [
                'map' => 'MIRAAMAR',
                'name' => 'Game 1',
                'number' => '1',
                'round_id' => 1,
                'subname' => '1',
                'time' => '8:00 PM',
            ],
            [
                'map' => 'SHANOK',
                'name' => 'Game 2',
                'number' => '2',
                'round_id' => 1,
                'subname' => '2',
                'time' => '8:00 PM',
            ],
            [
                'map' => 'ERANGLE',
                'name' => 'Game 3',
                'number' => '3',
                'round_id' => 1,
                'subname' => '3',
                'time' => '8:00 PM',
            ],
            [
                "map" => "SANHOK",
                "name" => "Tets hame",
                "number" => 6.0,
                "round_id" => 244.0,
                "subname" => "day 6",
                "time" => "20:00"
            ],

            [
                "map" => "MIRAMAR",
                "name" => "test ho hai",
                "number" => 8.0,
                "round_id" => 244.0,
                "subname" => "test1",
                "time" => "20:00"
            ],

            [
                "map" => "ERANGEL",
                "name" => "TEST",
                "number" => 1.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => ""
            ],

            [
                "map" => "ERANGEL",
                "name" => "MATCH 12",
                "number" => 12.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "2:10 PM"
            ],

            [
                "map" => "SANHOK",
                "name" => "MATCH 11",
                "number" => 11.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "1:30 PM"
            ],

            [
                "map" => "MIRAMAR",
                "name" => "MATCH 10",
                "number" => 10.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "12:50PM"
            ],

            [
                "map" => "ERANGEL",
                "name" => "MATCH 9",
                "number" => 9.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "12:10 PM"
            ],

            [
                "map" => "ERANGEL",
                "name" => "MATCH 8",
                "number" => 8.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "2:20 PM"
            ],

            [
                "map" => "SANHOK",
                "name" => "MATCH 7",
                "number" => 7.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "1:40 PM"
            ],

            [
                "map" => "MIRAMAR",
                "name" => "MATCH 6",
                "number" => 6.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "1:00 PM"
            ],

            [
                "map" => "ERANGEL",
                "name" => "MATCH 5",
                "number" => 5.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "12:20 PM"
            ],

            [
                "map" => "ERANGEL",
                "name" => "MATCH 4",
                "number" => 4.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "2:20 PM"
            ],

            [
                "map" => "SANHOK",
                "name" => "MATCH 3",
                "number" => 3.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "1:40 PM"
            ],

            [
                "map" => "MIRAMAR",
                "name" => "MATCH 2",
                "number" => 2.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "1:00 PM"
            ],

            [
                "map" => "ERANGEL",
                "name" => "MATCH 1",
                "number" => 1.0,
                "round_id" => 244.0,
                "subname" => "",
                "time" => "12:20 PM"
            ]
        ]);
    }
}
