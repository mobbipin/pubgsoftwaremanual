<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'instaBgURL', 'primaryFontColor', 'game', 'instaThumbBg', 'secondaryFontColor', 'logoURL', 'themeColor', 'lowerTournamentLogo', 'rosterBgURL', 'secondaryColor', 'lowerOrgOrSponsorLogo', 'thumbnailBgURL', 'thirdColorBorder', 'lowerTitle', 'streamResultBgURL', 'forthColor', 'ticketText'];
}