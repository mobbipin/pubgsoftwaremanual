<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Matchz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Round extends Model
{
    use HasFactory;
    protected $fillable = ['tournament_id', 'name', 'subname', 'liveGameID', 'liveType', 'resultPerPageSingle', 'tagLine', 'days', 'resultPerPageOverall', 'time', 'EntryPerPage', 'channel', 'EnterPerRow', 'isTest', 'needLogo', 'showLower', 'showRoster', 'showAlert'];

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function matchz()
    {
        return $this->hasMany(Matchz::class);
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class, 'tournament_id');
    }

    public function liveMatch()
    {
        return $this->hasOne(Matchz::class, 'id', 'liveGameID');
    }
}
