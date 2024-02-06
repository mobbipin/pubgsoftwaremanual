<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Round;
use App\Models\Matchz;
use App\Models\TeamStat;
use App\Models\PlayerStat;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\LiveStatController;

class StatController extends Controller
{
    public function __construct(LiveStatController $liveStatController)
    {
        $this->liveStatController = $liveStatController;
    }

    public function index($round_id)
    {
        $subHeader = 'stat';
        $tournament = $this->tournamentData($round_id);
        $round = Round::where('id', $round_id)->first();
        $match = Matchz::findorfail($round->liveGameID);

        $totalAliveTeams = $match->totalTeamAlive($round->liveGameID);
        $totalAlivePlayers = $match->TotalAlive($round->liveGameID);
        return view('stats.index', compact('subHeader', 'tournament', 'round', 'totalAliveTeams', 'totalAlivePlayers'));
    }

    public function tournamentData($round_id)
    {
        $round = Round::findorfail($round_id);
        $tournament = Tournament::where('id', $round->tournament_id)->get();
        return $tournament;
    }

    public function team_stat($round_id)
    {
        $round = Round::findorfail($round_id);
        $team_stat = TeamStat::where('match_id', $round->liveGameID)->whereHas('PlayerStatement', function ($query) use ($round) {
            $query->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->with('PlayerStatement', function ($query) use ($round) {
            $query->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->get()->sortByDesc('kill');

        return $team_stat;
    }

    public function teamStatAlive($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $team_stat = collect(TeamStat::where('match_id', $round->liveGameID)->with('PlayerStatement', function ($query) use ($round) {
                $query->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->get())->values()->all();
            $playing_team = collect(TeamStat::where('match_id', $round->liveGameID)->whereHas('PlayerStatement', function ($query) use ($round) {
                $query->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->with('PlayerStatement', function ($query) use ($round) {
                $query->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->get()->sortByDesc('kill'))->values()->all();
            $dead_team = collect(TeamStat::where('match_id', $round->liveGameID)->where('dead', 1)->whereHas('PlayerStatement', function ($query) use ($round) {
                $query->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->with('PlayerStatement', function ($query) use ($round) {
                $query->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->get()->sortByDesc('kill'))->values()->all();
            $alive_team = array_diff($playing_team, $dead_team);
            $not_playing_team = array_diff($team_stat, $playing_team);
            foreach ($dead_team as $team) {
                $team->totalPoints = $team->position_points + $team->kill;
            }
            foreach ($alive_team as $team) {
                $team->totalPoints = $team->position_points + $team->kill;
            }
            $dead_team = collect($dead_team)->sortByDesc('totalPoints')->values()->all();
            $alive_team = collect($alive_team)->sortByDesc('kill')->values()->all();
            // return response()->json(['alive_team' => $alive_team, 'dead_team' => $dead_team, 'not_playing_team' => $not_playing_team]);
            $round = Round::where('id', $round_id)->first();
            $match = Matchz::findorfail($round->liveGameID);
            $totalAliveTeams = $match->totalTeamAlive($round->liveGameID);
            $totalAlivePlayers = $match->TotalAlive($round->liveGameID);
            return [
                'modal_view' => view('stats.components.alive', compact(['team_stat', 'totalAliveTeams', 'totalAlivePlayers', 'playing_team', 'not_playing_team', 'dead_team', 'alive_team']))->render(),
            ];
        } catch (\Exception $e) {
            dd($e);
        }
    }
    public function  liveRanking($round_id)
    {
        $live_ranking = $this->liveStatController->overallLiveResult($round_id);

        $round = Round::where('id', $round_id)->first();
        $match = Matchz::findorfail($round->liveGameID);
        $totalAliveTeams = $match->totalTeamAlive($round->liveGameID);
        $totalAlivePlayers = $match->TotalAlive($round->liveGameID);
        $live_ranking = $this->liveStatController->paginate($live_ranking, 18);
        return [
            'modal_view' => view('stats.components.liveRanking', compact('live_ranking', 'totalAliveTeams', 'totalAlivePlayers'))->render(),
        ];
    }

    public function  aliveKills($round_id)
    {
        $round = Round::findorfail($round_id);
        $team_stat = TeamStat::where('match_id', $round->liveGameID)->whereHas('PlayerStatement', function ($query) use ($round) {
            $query->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->with('PlayerStatement', function ($query) use ($round) {
            $query->where('match_id', $round->liveGameID)
                ->where('active', 1);
        })->where('dead', 0)->orderby('kill', 'desc')->get();
        $round = Round::where('id', $round_id)->first();
        $match = Matchz::findorfail($round->liveGameID);
        $totalAliveTeams = $match->totalTeamAlive($round->liveGameID);
        $totalAlivePlayers = $match->TotalAlive($round->liveGameID);
        return [
            'modal_view' => view('stats.components.aliveKills', compact('team_stat', 'totalAliveTeams', 'totalAlivePlayers'))->render(),
        ];
    }

    public function  matchKills($round_id)
    {
        $match_kills = $this->liveStatController->singleMatchMVP($round_id);

        $round = Round::where('id', $round_id)->first();
        $match = Matchz::findorfail($round->liveGameID);
        $totalAliveTeams = $match->totalTeamAlive($round->liveGameID);
        $totalAlivePlayers = $match->TotalAlive($round->liveGameID);
        return [
            'modal_view' => view('stats.components.matchKills', compact('match_kills', 'totalAliveTeams', 'totalAlivePlayers'))->render(),
        ];
    }

    public function  wwcdForecast($round_id)
    {
        $round = Round::where('id', $round_id)->first();
        $match = Matchz::findorfail($round->liveGameID);
        $total_alive = $match->TotalAlive($round->liveGameID);
        $team_stat = $this->team_stat($round_id);
        $match = Matchz::findorfail($round->liveGameID);

        $round = Round::where('id', $round_id)->first();
        $match = Matchz::findorfail($round->liveGameID);
        $totalAliveTeams = $match->totalTeamAlive($round->liveGameID);
        $totalAlivePlayers = $match->TotalAlive($round->liveGameID);
        return [
            'modal_view' => view('stats.components.wwcdForecast', compact('total_alive', 'team_stat', 'match', 'totalAliveTeams', 'totalAlivePlayers'))->render(),
        ];
    }

    public function liveMatchKill($round_id)
    {
        $players = $this->liveStatController->singleMatchMVP($round_id);
        $title = 'Match Kill';
        return [
            'modal_view' => view('stats.components.liveMatchKill', compact('players', 'title'))->render(),
        ];
        // return $player;
    }

    public function overallKill($round_id)
    {
        $players = $this->liveStatController->MVP($round_id)['player_stat'];
        $title = 'Overall Kill';
        // return $players;
        return [
            'modal_view' => view('stats.components.liveMatchKill', compact('players', 'title'))->render(),
        ];
    }
}
