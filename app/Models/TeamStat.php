<?php

namespace App\Models;

use App\Models\Team;
use App\Models\PlayerStat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamStat extends Model
{
    use HasFactory;

    protected $table = 'team_stats';

    protected $fillable = ['kill', 'dead', 'position', 'position_points', 'team_id', 'match_id', 'tournament_id', 'round_id', 'group_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function playerStat()
    {
        return $this->hasMany(PlayerStat::class, 'team_stat_id', 'id');
    }

    public function PlayerStatement()
    {
        return $this->hasMany(PlayerStat::class, 'team_id', 'team_id');
    }

    public function Prize($rank, $round_id)
    {
        $prize = PrizePool::where('position', $rank)->where('round_id', $round_id)->first();
        return $prize->prize;
    }

    public function WWCPRIZE($round_id)
    {
        $prize = PrizePool::where('position', 'wwc')->where('round_id', $round_id)->first();
        return $prize->prize;
    }

    public function MVPPRIZE($round_id)
    {
        $prize = PrizePool::where('position', 'mvp')->where('round_id', $round_id)->first();
        return $prize->prize;
    }
}
