<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Player;
use App\Models\TeamStat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerStat extends Model
{
    use HasFactory;
    protected $table = 'player_stats';

    protected $guarded = [];


    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function TeamStat()
    {
        return $this->belongsTo(TeamStat::class, 'team_id', 'team_id');
    }

    public function TeamKill($team_id, $match_id)
    {
        return TeamStat::where('team_id', $team_id)->where('match_id', $match_id)->first();
    }
    public function round()
    {
        return $this->belongsTo(Round::class);
    }
}
