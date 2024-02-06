<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Group;
use App\Models\Round;
use App\Models\Player;
use App\Models\TeamStat;
use Illuminate\Http\Request;
use App\Http\Controllers\LiveStatController;

class ShowCaseController extends Controller
{
    public function __construct(LiveStatController $liveStatController)
    {
        $this->liveStatController = $liveStatController;
    }
    public function playerShowCase($player_id, $round_id)
    {
        $round = Round::findorfail($round_id);
        $player = Player::findorfail($player_id);
        $player_details = $this->liveStatController->findPlayerRank($round_id, $player->id);
        $player->rank = $player_details['rank'];
        $player->kills = $player_details['totalKill'];
        $player->gamePlayed = $player_details['gamePlayed'];
        // dd($player);
        return view('new_layout.showcase.playerShowCase', compact('player'));
    }
    public function teamShowCase($team_id, $round_id)
    {
        $round = Round::findorfail($round_id);
        $groupId = Group::where('round_id', $round->id)->pluck('id');
        $teamCount = Team::whereIn('group_id', $groupId)->count();
        $team_stat = TeamStat::where('team_id', $team_id)->where('match_id', $round->liveGameID)->with('PlayerStatement', function ($query) use ($round) {
            $query->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->first();
        $teamRank = $this->liveStatController->findRank($team_stat, $round_id);
        $team_stat->rank = $teamRank['rank'];
        $team_stat->placePoint = $teamRank['placePoint'];
        $team_stat->totalKill = $teamRank['totalKill'];
        $team_stat->totalPoint = $teamRank['totalPoint'];
        return view('new_layout.showcase.teamShowCase', compact('team_stat', 'teamCount'));
    }
}
