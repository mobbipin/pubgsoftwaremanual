<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Seeder;

class mapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Map::insert([
            [
                'name' => 'ERANGLE',
                'imageUrl' => 'https://media.discordapp.net/attachments/925902226264821820/947006141701967922/erangel.png',
                'next_imageURL' => 'https://media.discordapp.net/attachments/925902226264821820/929440417559224330/erangel.png'
            ],
            [
                'name' => 'MIRAMAR',
                'imageUrl' => 'https://media.discordapp.net/attachments/925902226264821820/947006141928468480/miramar.png',
                'next_imageURL' => 'https://media.discordapp.net/attachments/925902226264821820/929440416883945492/miramar.png'
            ],
            [
                'name' => 'SANHOK',
                'imageUrl' => 'https://media.discordapp.net/attachments/925902226264821820/947006142209470534/sanhok.png',
                'next_imageURL' => 'https://media.discordapp.net/attachments/925902226264821820/929440417244663838/sanhok.png'
            ],
            [
                'name' => 'VIKENDI',
                'imageUrl' => 'https://i.imgur.com/XqQXQZb.png',
                'next_imageURL' => 'https://media.discordapp.net/attachments/925902226264821820/929440416422563900/vikendi.png'
            ]
        ]);
    }
}
