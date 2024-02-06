<?php

namespace Database\Seeders;

use App\Models\Round;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Round::insert([
            [
                "channel" => "",
                "days" => "",
                "EntryPerPage" => 9.0,
                "EnterPerRow" => 3.0,
                "isTest" => 0.0,
                "liveGameID" => 1429.0,
                "liveType" => "hide",
                "name" => "League Prize Round Grand Final",
                "needLogo" => 1.0,
                "resultPerPageOverall" => 9.0,
                "resultPerPageSingle" => 9.0,
                "showAlert" => 1.0,
                "showLower" => 1.0,
                "showRoster" => 1.0,
                "subname" => "DAY 5",
                "tagLine" => "POST MATCH 20",
                "time" => "",
                "tournament_id" => 1
            ],
            [
                "channel" => "",
                "days" => "",
                "EntryPerPage" => 9.0,
                "EnterPerRow" => 3.0,
                "isTest" => 0.0,
                "liveGameID" => 1429.0,
                "liveType" => "hide",
                "name" => "Red G FINALS",
                "needLogo" => 1.0,
                "resultPerPageOverall" => 9.0,
                "resultPerPageSingle" => 9.0,
                "showAlert" => 1.0,
                "showLower" => 1.0,
                "showRoster" => 1.0,
                "subname" => "DAY 5",
                "tagLine" => "POST MATCH 20",
                "time" => "",
                "tournament_id" => 2.0,
            ],
            [
                "channel" => "",
                "days" => "",
                "EntryPerPage" => 9.0,
                "EnterPerRow" => 3.0,
                "isTest" => 0.0,
                "liveGameID" => 1429.0,
                "liveType" => "hide",
                "name" => "EX GRAND FINALS",
                "needLogo" => 1.0,
                "resultPerPageOverall" => 9.0,
                "resultPerPageSingle" => 9.0,
                "showAlert" => 1.0,
                "showLower" => 1.0,
                "showRoster" => 1.0,
                "subname" => "DAY 5",
                "tagLine" => "POST MATCH 20",
                "time" => "",
                "tournament_id" => 3.0,
            ],
            [
                "channel" => "",
                "days" => "",
                "EntryPerPage" => 9.0,
                "EnterPerRow" => 3.0,
                "isTest" => 0.0,
                "liveGameID" => 1429.0,
                "liveType" => "hide",
                "name" => "RedGrand Final ",
                "needLogo" => 1.0,
                "resultPerPageOverall" => 9.0,
                "resultPerPageSingle" => 9.0,
                "showAlert" => 1.0,
                "showLower" => 1.0,
                "showRoster" => 1.0,
                "subname" => "DAY 5",
                "tagLine" => "POST MATCH 20",
                "time" => "",
                "tournament_id" => 2.0,
            ]
        ]);
    }
}