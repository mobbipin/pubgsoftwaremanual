<?php

namespace Database\Seeders;

use App\Models\Tournament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TournamentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tournament::insert([
            [
                "forthColor" => "#04afd4",
                "game" => "PUBG MOBILE",
                "instaBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "instaThumbBg" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "logoURL" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                "name" => "LEAGUE OF PRIZE",
                "rosterBgURL" => "",
                "primaryFontColor" => "#ffffff",
                "secondaryColor" => "#014198",
                "secondaryFontColor" => "#ffffff",
                "streamResultBgURL" => "",
                "themeColor" => "#00113f",
                "thirdColorBorder" => "#2400ff",
                "thumbnailBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977109469274181632/Capture_2022-05-15_15.45.12.jpg",
                // "ticker_logo" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                // "ticker_sponsor" => "https://media.discordapp.net/attachments/947090503273426954/947090889111658516/24_LOGO.png",
                "ticketText" => "",
                "lowerTitle" => "LEAGUE OF PRIZE"
            ],
            [
                "forthColor" => "#04afd4",
                "game" => "PUBG MOBILE",
                "instaBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "instaThumbBg" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "logoURL" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                "name" => "Red Glory",
                "rosterBgURL" => "",
                "primaryFontColor" => "#ffffff",
                "secondaryColor" => "#014198",
                "secondaryFontColor" => "#ffffff",
                "streamResultBgURL" => "",
                "themeColor" => "#00113f",
                "thirdColorBorder" => "#2400ff",
                "thumbnailBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977109469274181632/Capture_2022-05-15_15.45.12.jpg",
                // "ticker_logo" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                // "ticker_sponsor" => "https://media.discordapp.net/attachments/947090503273426954/947090889111658516/24_LOGO.png",
                "ticketText" => "",
                "lowerTitle" => "Red Glory"
            ],
            [
                "forthColor" => "#04afd4",
                "game" => "PUBG MOBILE",
                "instaBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "instaThumbBg" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "logoURL" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                "name" => "Extremer",
                "rosterBgURL" => "",
                "primaryFontColor" => "#ffffff",
                "secondaryColor" => "#014198",
                "secondaryFontColor" => "#ffffff",
                "streamResultBgURL" => "",
                "themeColor" => "#00113f",
                "thirdColorBorder" => "#2400ff",
                "thumbnailBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977109469274181632/Capture_2022-05-15_15.45.12.jpg",
                // "ticker_logo" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                // "ticker_sponsor" => "https://media.discordapp.net/attachments/947090503273426954/947090889111658516/24_LOGO.png",
                "ticketText" => "",
                "lowerTitle" => "Extremers"
            ],
            [
                "forthColor" => "#04afd4",
                "game" => "PUBG MOBILE",
                "instaBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "instaThumbBg" => "https://media.discordapp.net/attachments/947069099081629737/977988368984051712/20220521_135726.png",
                "logoURL" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                "name" => "PRIZE",
                "rosterBgURL" => "",
                "primaryFontColor" => "#ffffff",
                "secondaryColor" => "#014198",
                "secondaryFontColor" => "#ffffff",
                "streamResultBgURL" => "",
                "themeColor" => "#00113f",
                "thirdColorBorder" => "#2400ff",
                "thumbnailBgURL" => "https://media.discordapp.net/attachments/947069099081629737/977109469274181632/Capture_2022-05-15_15.45.12.jpg",
                // "ticker_logo" => "https://media.discordapp.net/attachments/947069099081629737/977108208881631243/TOURNAMENT_LOGO.png",
                // "ticker_sponsor" => "https://media.discordapp.net/attachments/947090503273426954/947090889111658516/24_LOGO.png",
                "ticketText" => "",
                "lowerTitle" => "PRIZE"
            ],
        ]);
    }
}