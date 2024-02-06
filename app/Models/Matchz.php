<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchz extends Model
{
    use HasFactory;
    protected $table = 'matchs';
    protected $fillable = ['name', 'map', 'number', 'round_id', 'subname', 'time'];


    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function map_name()
    {
        return $this->belongsTo(Map::class, 'map', 'name');
    }

    public function chicken_dinner($id)
    {
        return TeamStat::where('match_id', $id)->where('position', 1)->first();
    }

    //Total Players in a match
    public static function TotalAlive($id)
    {
        return PlayerStat::where('match_id', $id)->where('dead', 0)->where('active', 1)->count();
    }

    //Total players in a team
    public static function playerAlive($team_id)
    {
        return PlayerStat::where('team_stat_id', $team_id)->where('dead', 0)->where('active', 1)->count();
    }

    //Total Team alive in a match
    public static function totalTeamAlive($id)
    {
        return TeamStat::where('match_id', $id)->where('dead', 0)->whereHas('PlayerStatement', function ($query) use ($id) {
            $query->where('match_id', $id)
                ->where('active', 1);
        })->count();
    }
}
