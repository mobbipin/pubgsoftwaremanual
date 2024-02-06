<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Matchz;
use App\Models\TeamStat;
use Mockery\Expectation;
use App\Models\PlayerStat;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\LiveStatController;
use App\Models\PrizePool;

class InstaResultContraoller extends Controller
{
    public function __construct(LiveStatController $liveStatController)
    {
        $this->liveStatController = $liveStatController;
    }

    public function index(Request $request)
    {
        // return $request->all();
        try {
            $round = Round::findorfail($request->round);
            if (is_array($request->match_id)) {
                $match = Matchz::whereIn('id', $request->match_id)->get();
                $total_teams = TeamStat::whereIn('match_id', $request->match_id)->get();
                $teams = TeamStat::whereIn('match_id', $request->match_id)->groupBy('team_id')
                    ->get();
                $totalPlayer = PlayerStat::whereIn('match_id', $request->match_id)->get();
                $players = PlayerStat::whereIn('match_id', $request->match_id)->groupby('player_id')->get();
            } else {
                $match = Matchz::where('id', $request->match_id)->get();
                $total_teams = TeamStat::where('match_id', $request->match_id)->get();
                $teams = TeamStat::where('match_id', $request->match_id)->groupBy('team_id')
                    ->get();
                $totalPlayer = PlayerStat::where('match_id', $request->match_id)->get();
                $players = PlayerStat::where('match_id', $request->match_id)->groupby('player_id')->get();
            }

            foreach ($total_teams as $total_team) {
                foreach ($teams as $team) {
                    if ($team->team_id == $total_team->team_id) {
                        $team->totalkill =  $team->totalkill + $total_team->kill;
                        $team->placePoint =  $team->placePoint + $total_team->position_points;
                        $team->totalPoint = $team->totalkill + $team->placePoint;
                        if ($total_team->position == 1) {
                            $team->totalWin++;
                        }
                        if ($total_team->position != 0) {
                            $team->totalPlayed++;
                        }
                    }
                }
            }
            $teams = collect($teams)->sortByDesc('placePoint')->sortByDesc('totalPoint')->values()->all();
            foreach ($teams as $key => $team) {
                $team->rank = $key + 1;
            }
            // return $teams;
            $first_row = collect($teams)->take($round->resultPerPageOverall)->values()->all();
            $second_row = array_diff($teams, $first_row);
            $second_row = collect($second_row)->take($round->resultPerPageOverall)->values()->all();
            $third_row = array_diff($teams, $first_row, $second_row);
            $third_row = collect($third_row)->take($round->resultPerPageOverall)->values()->all();
            $fourth_row = array_diff($teams, $first_row, $second_row, $third_row);
            $fourth_row = collect($fourth_row)->take($round->resultPerPageOverall)->values()->all();
            $fifth_row = array_diff($teams, $first_row, $second_row, $third_row, $fourth_row);
            foreach ($totalPlayer as $total_player) {
                foreach ($players as $player) {
                    if ($player->player_id == $total_player->player_id) {
                        $player->totalKill = $player->totalKill + $total_player->kill;
                        if ($player->active == 1) {
                            $player->gamePlayed++;
                        }
                    }
                }
            }
            $mvpPlayer = collect($players)->sortByDesc('totalKill')->take(5)->values()->all();
            foreach ($mvpPlayer as $index => $player) {
                $player->rank = $index + 1;
                foreach ($teams as  $team) {
                    if ($player->team_id == $team->team_id) {
                        if ($player->totalKill != 0) {
                            $player->contribution = round($player->totalKill / $team->totalkill  * 100, 2);
                            $player->teamKill = $team->totalkill;
                        } else {
                            $player->contribution = 0;
                        }
                        if ($player->gamePlayed != 0) {
                            $player->kd = round($player->totalKill / $player->gamePlayed, 2);
                        }
                    }
                }
            }
            // return $mvpPlayer;
            $first_team = TeamStat::where('team_id', $mvpPlayer[0]->team_id)->first();
            $second_team = TeamStat::where('team_id', $mvpPlayer[1]->team_id)->first();
            $mvpPlayer[0]->teamRank = $this->liveStatController->findRank($first_team, $request->round, $request->match_id)['rank'];
            $mvpPlayer[1]->teamRank = $this->liveStatController->findRank($second_team, $request->round, $request->match_id)['rank'];
            $tournaments = Tournament::all();
            $singleTournament = Tournament::where('id', $request->tournament_id)->get();
            return view('new_layout.pages.instaResult', compact('round', 'tournaments', 'players', 'teams', 'singleTournament', 'first_row', 'second_row', 'mvpPlayer', 'third_row', 'fourth_row', 'fifth_row'));
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function searchRound(Request $request)
    {
        // return ($request->all());
        try {
            $rounds = Round::where('tournament_id', $request->tournmanet_id)->get();
            return response()->json([
                'rounds' => $rounds
            ]);
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function searchMatch(Request $request)
    {
        try {
            $matchs = Matchz::where('round_id', $request->round_id)->get();
            return response()->json([
                'matches' => $matchs
            ]);
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function endReport($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $team_stat = $this->liveStatController->overallLiveResult($round_id);
            $first_row = collect($team_stat)->take($round->resultPerPageOverall)->values()->all();
            $second_row = array_diff($team_stat, $first_row);
            $singleTournament = Tournament::where('id', $round->tournament_id)->get();
            $prize = PrizePool::where('round_id', $round_id)->get();
            if (empty($prize[0])) {
                return back();
            }
            return view('liveStats.results.endResult', compact('round', 'team_stat', 'singleTournament', 'first_row', 'second_row'));
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }
}
