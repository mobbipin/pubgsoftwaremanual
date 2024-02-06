<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\TeamStat;
use Illuminate\Http\Request;
use App\Http\Controllers\LiveStatController;

class MapController extends Controller
{
    public function __construct(LiveStatController $liveStatController)
    {
        $this->liveStatController = $liveStatController;
    }

    public function map($round_id)
    {
        $round = Round::findorfail($round_id);
        $teams = TeamStat::where('match_id', $round->liveGameID)->with('playerStatement', function ($q) use ($round) {
            $q->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->get();
        $count = TeamStat::where('match_id', $round->liveGameID)->count();
        $teams = collect($teams)->values()->all();
        $first_row_team = collect($teams)->take($count / 2)->values()->all();
        $second_row_team = array_diff($teams, $first_row_team);
        $tournament = $this->liveStatController->tournamentData($round_id);

        //team stat
        $teams = TeamStat::where('match_id', $round->liveGameID)->with('playerStatement', function ($q) use ($round) {
            $q->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->get();
        $teams = collect($teams)->values()->all();
        $overallRank = $this->liveStatController->overallLiveResult($round_id);
        $overllRankTeam = [];
        foreach ($overallRank as $key => $value) {
            foreach ($teams as $team) {
                if ($team->team_id == $value->team_id) {
                    $overllRankTeam[] = $value;
                }
            }
        }
        $players = $this->liveStatController->MVP($round_id)['player_stat'];
        return view('liveStats.mapOverView', compact(['round', 'first_row_team', 'second_row_team', 'tournament','players', 'overllRankTeam']));
    }
    public function teamOverView($round_id)
    {
        $round = Round::findorfail($round_id);
        $teams = TeamStat::where('match_id', $round->liveGameID)->with('playerStatement', function ($q) use ($round) {
            $q->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->get();
        $count = TeamStat::where('match_id', $round->liveGameID)->count();
        $teams = collect($teams)->values()->all();
        $first_row_team = collect($teams)->take($count / 2)->values()->all();
        $second_row_team = array_diff($teams, $first_row_team);
        $tournament = $this->liveStatController->tournamentData($round_id);
        $players = $this->liveStatController->MVP($round_id)['player_stat'];
        return ['modal_view' => view('map.mapTeam', compact(['round', 'first_row_team', 'second_row_team', 'tournament']))->render()];
    }
    public function survivalStatus($round_id)
    {
        $round = Round::findorfail($round_id);
        $teams = TeamStat::where('match_id', $round->liveGameID)->with('playerStatement', function ($q) use ($round) {
            $q->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->get();
        $teams = collect($teams)->values()->all();
        $overallRank = $this->liveStatController->overallLiveResult($round_id);
        $overllRankTeam = [];
        foreach ($overallRank as $key => $value) {
            foreach ($teams as $team) {
                if ($team->team_id == $value->team_id) {
                    $overllRankTeam[] = $value;
                }
            }
        }
        $players = $this->liveStatController->MVP($round_id)['player_stat'];
        return [
            'modal_view' => view('map.survivalStat', compact('players', 'overllRankTeam'))->render(),
        ];
    }
}
