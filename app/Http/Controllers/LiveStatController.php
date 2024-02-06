<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Group;
use App\Models\Round;
use App\Models\Matchz;
use App\Models\Player;
use App\Models\Schedule;

use App\Models\TeamStat;
use Mockery\Expectation;
use App\Models\PlayerStat;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use App\Events\ChickenDinnerNotification;
use Illuminate\Pagination\LengthAwarePaginator;

class LiveStatController extends Controller
{
    public function tournamentData($round_id)
    {
        $round = Round::findorfail($round_id);
        $tournament = Tournament::where('id', $round->tournament_id)->get();
        return $tournament;
    }
    public function index($round_id)
    {
        $round = Round::where('id', $round_id)->first();
        $team_stat = TeamStat::where('match_id', $round->liveGameID)->with('PlayerStatement', function ($query) use ($round) {
            $query->where('match_id', $round->liveGameID);
        })->get();
        $player_stat = PlayerStat::where('match_id', $round->liveGameID)->orderBY('kill', 'desc')->get();
        $tournament = $this->tournamentData($round_id);
        return view('new_layout.pages.newResult', compact('round', 'tournament'));
    }
    public function liveStat($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $team_stat = TeamStat::where('match_id', $round->liveGameID)->with('PlayerStatement', function ($query) use ($round) {
                $query->where('match_id', $round->liveGameID);
            })->get();
            $player_stat = PlayerStat::where('match_id', $round->liveGameID)->orderBY('kill', 'desc')->get();
            return response()->json(['team_stat' => $team_stat, 'player_stat' => $player_stat]);
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function overLiveStat($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $team_stat = TeamStat::where('round_id', $round_id)->orderBy('id', 'asc')->groupBy('team_id')->with('PlayerStatement', function ($q) use ($round) {
                $q->where('match_id', $round->liveGameID);
            })->get();
            $totalPoint = TeamStat::where('round_id', $round_id)->orderBy('id', 'asc')->get();
            // dd($totalPoint);
            foreach ($totalPoint as $total_team) {
                if ($total_team->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($team_stat as $team) {
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
            $totalPlayer = PlayerStat::where('round_id', $round_id)->orderBy('id', 'asc')->get();
            $player_stat = PlayerStat::where('round_id', $round_id)->orderBy('id', 'asc')->groupBy('player_id')->get();
            foreach ($totalPlayer as $teamPlayer) {
                if ($teamPlayer->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($player_stat as $player) {
                    if ($player->player_id == $teamPlayer->player_id) {
                        $player->totalKill = $player->totalKill + $teamPlayer->kill;
                    }
                }
            }

            return response()->json(['total_team_stat' => $team_stat, 'total_player_stat' => $player_stat]);
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function gameResult($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            // return ($round->liveGameID);
            $team_stat = TeamStat::where('match_id', $round->liveGameID)->with('PlayerStatement', function ($query) use ($round) {
                $query->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->get();
            // return $team_stat;
            foreach ($team_stat as $team) {
                $team->totalPoint = $team->kill + $team->position_points;
            }
            $totalTeam = TeamStat::where('match_id', $round->liveGameID)->count();
            // return $winner_team;
            $team_stat = collect($team_stat)->sortByDesc('totalPoint')->values()->all();
            foreach ($team_stat as $index => $team) {
                $team->rank = $index + 1;
            }
            $first_team = collect($team_stat)->sortBy('rank', SORT_ASC)->values()->first();
            $first_row_team = collect($team_stat)->sortBy('rank', SORT_ASC)->take($totalTeam / 2 + 1)->values()->all();
            $last_row_team = array_diff($team_stat, $first_row_team);
            array_shift($first_row_team);
            return  view('liveStats.liveGameResult', compact(['team_stat', 'first_team', 'first_row_team', 'last_row_team', 'round']))->render();
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function overallGameResult($round_id)
    {
        $round = Round::findorfail($round_id);
        $team_stat = $this->overallLiveResult($round_id);
        $team_stat = $this->paginate($team_stat, $round->resultPerPageOverall);
        $tournament = $this->tournamentData($round_id);
        return view('liveStats.liveOverallResult', compact(['team_stat', 'round', 'tournament']))->render();
    }

    public function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function result($round_id)
    {
        try {
            $round =  Round::findorfail($round_id);
            $tournament = $this->tournamentData($round_id);
            return view('result.liveResult', compact('round', 'tournament'));
        } catch (Expectation $e) {
            return response()->json('errors.invalid-order');
            // return back()->response('msg'=>'something went wrong',);

        }
    }

    public function overallMVP($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $player = $this->MVP($round_id);
            $top_player = $player['top_player'];
            $player_stat = $player['player_stat'];
            $tournament = $this->tournamentData($round_id);
            return view('liveStats.overallMatchKill', compact(['player_stat', 'top_player', 'tournament', 'round']))->render();
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }
    //used to calculate the overall MVP of the match
    public function MVP($round_id, $take = 5)
    {
        try {
            $round = Round::findorfail($round_id);
            $player = PlayerStat::where('round_id', $round_id)->orderBy('id', 'asc')->groupBy('player_id')->get();
            $total_player = PlayerStat::where('round_id', $round_id)->orderBy('id', 'asc')->get();
            foreach ($total_player as $player_stat) {
                if ($player_stat->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($player as $play) {
                    if ($play->player_id == $player_stat->player_id) {
                        $play->totalKill = $play->totalKill + $player_stat->kill;
                        if ($play->active == 1) {
                            $play->gamePlayed++;
                        }
                    }
                }
            }
            $player_stat = collect($player)->sortByDesc('totalKill')->collect($player_stat)->sortByDesc([
                ['totalKill', 'desc'],
                ['teamRank', 'asc'],
            ])->take($take)->values()->all();
            $team_stat = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->groupBy('team_id')->get();
            $totalPoint = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->get();
            foreach ($totalPoint as $total_team) {
                if ($total_team->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($team_stat as $team) {
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
            $team_stat = collect($team_stat)->sortByDesc('totalPoint')->values()->all();
            foreach ($player_stat as $index => $player) {
                $player->rank = $index + 1;
                $rank = 1;
                foreach ($team_stat as $team) {
                    if ($player->team_id == $team->team_id) {
                        if ($player->totalKill != 0) {
                            $player->contribution = round($player->totalKill / $team->totalkill  * 100, 2);
                            $player->teamKill = $team->totalkill;
                            $player->teamRank = $rank;
                        } else {
                            $player->contribution = 0;
                        }
                    }
                    $rank++;
                }
            }
            $top_player = collect($player_stat)->values()->all();
            $top_player = array_shift($top_player);
            return ['top_player' => $top_player, 'player_stat' => $player_stat];
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function matchMvp($roundid)
    {
        try {
            $round = Round::findorfail($roundid);
            $player_stat = $this->singleMatchMVP($roundid);
            $top_player = collect($player_stat)->sortbyDesc('kill')->values()->all();
            $top_player = array_shift($top_player);
            // return $top_player;
            // return $player_stat;
            // return view('liveStats.liveMatchKills', compact(['player_stat', 'top_player']));
            $tournament = $this->tournamentData($roundid);
            return  view('liveStats.liveMatchKills', compact(['player_stat', 'top_player', 'tournament', 'round']))->render();
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }


    public function wwc($round_id)
    {
        try {
            $group = Group::where('round_id', $round_id)->pluck('id');
            $team_count = Team::whereIn('group_id', $group)->count();
            $round = Round::findorfail($round_id);
            if ($round->liveGameID) {
                $winner_team = TeamStat::where('match_id', $round->liveGameID)->where('position', 1)->with('playerStatement', function ($q) use ($round) {
                    $q->where('match_id', $round->liveGameID)
                        ->where('active', 1);
                })->first();
            } else {
                return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
            }
            if ($winner_team) {
                $winner_team->rank = $this->findRank($winner_team, $round_id)['rank'];
                $winner_team->overallPoint = $this->findRank($winner_team, $round_id)['totalPoint'];
                $winner_team->totalPoint = $winner_team->kill + $winner_team->position_points;
                $tournament = $this->tournamentData($round_id);
                return view('liveStats.wwcd', compact(['winner_team', 'team_count', 'tournament']))->render();
            } else {

                return json_encode(array('statusCode' => 400,  'msg' => "Winner Team not found"));
            }
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function soloMvp($round_id)
    {
        $round = Round::findorfail($round_id);
        $playerStat = $this->singleMatchMVP($round_id);
        $top_player = collect($playerStat)->sortByDesc('kill')->values()->all();
        $top_player = array_shift($top_player);
        $top_player->rank = $this->findPlayerRank($round_id, $top_player->player_id)['rank'];
        return view('liveStats.soloMvp', compact(['top_player', 'round']))->render();
    }

    public function findRank($winner_team, $round_id, $match_id = "null")
    {
        $round = Round::findorfail($round_id);
        if ($match_id != "null") {
            if (is_array($match_id)) {
                $team_stat = TeamStat::whereIn('match_id', $match_id)->with('team')->orderBy('id', 'asc')->groupBy('team_id')->get();
                $totalPoint = TeamStat::whereIn('match_id', $match_id)->with('team')->orderBy('id', 'asc')->get();
            } else {
                $team_stat = TeamStat::where('match_id', $match_id)->with('team')->orderBy('id', 'asc')->groupBy('team_id')->get();
                $totalPoint = TeamStat::where('match_id', $match_id)->with('team')->orderBy('id', 'asc')->get();
            }
            foreach ($totalPoint as $total_team) {
                foreach ($team_stat as $team) {
                    if ($team->team_id == $total_team->team_id) {
                        $team->totalkill =  $team->totalkill + $total_team->kill;
                        $team->placePoint =  $team->placePoint + $total_team->position_points;
                        $team->totalPoint = $team->totalkill + $team->placePoint;
                        if ($total_team->position == 1) {
                            $team->totalWin++;
                        }
                    }
                }
            }
            $team_stat = collect($team_stat)->sortByDesc('totalPoint')->values()->all();
            foreach ($team_stat as $index => $teams) {
                if ($winner_team->team_id == $teams->team_id) {
                    return ['rank' => $index + 1, 'totalPoint' => $teams->totalPoint, 'totalWin' => $teams->totalWin, 'placePoint' => $teams->placePoint, 'totalKill' => $teams->totalkill];
                }
            }
        } else {
            $team_stat = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->groupBy('team_id')->get();
            $totalPoint = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->get();
            foreach ($totalPoint as $total_team) {
                if ($total_team->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($team_stat as $team) {
                    if ($team->team_id == $total_team->team_id) {
                        $team->totalkill =  $team->totalkill + $total_team->kill;
                        $team->placePoint =  $team->placePoint + $total_team->position_points;
                        $team->totalPoint = $team->totalkill + $team->placePoint;
                        if ($total_team->position == 1) {
                            $team->totalWin++;
                        }
                    }
                }
            }
            $team_stat = collect($team_stat)->sortBy([
                ['totalPoint', 'desc'],
                ['totalWin', 'desc'],
                ['placePoint', 'desc'],
                ['totalPlayed', 'desc']
                ])->values()->all();
            foreach ($team_stat as $index => $teams) {
                if ($winner_team->team_id == $teams->team_id) {
                    return ['rank' => $index + 1, 'totalPoint' => $teams->totalPoint, 'totalWin' => $teams->totalWin, 'placePoint' => $teams->placePoint, 'totalKill' => $teams->totalkill];
                }
            }
        }
        // dd($totalPoint);

    }

    public function roaster($round_id)
    {
        $round = Round::findorfail($round_id);

        $groupId = Group::where('round_id', $round_id)->pluck('id');
        $team = Team::whereIn('group_id', $groupId)->get();
        $teams = $this->paginate($team, $round->resultPerPageSingle);
        $tournament = $this->tournamentData($round_id);
        return view('liveStats.roaster', compact('teams', 'round', 'tournament'));
    }

    public function pageRoaster($round_id)
    {
        $round = Round::findorfail($round_id);
        $roundid = $round_id;
        $groupId = Group::where('round_id', $round_id)->pluck('id');
        $team = Team::whereIn('group_id', $groupId)->get();
        $teams = $this->paginate($team, $round->resultPerPageSingle);
        $tournament = $this->tournamentData($round_id);
        return view('liveStats.pageRoaster', compact('teams', 'roundid', 'round', 'tournament'));
    }

    public function showcase($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $tournament = $this->tournamentData($round_id);
            $groupId = Group::where('round_id', $round_id)->pluck('id');
            $teams = Team::whereIn('group_id', $groupId)->get();
            $teamId = $teams->pluck('id');
            $playerCount = Player::whereIn('team_id', $teamId)->count();
            $players = $this->MVP($round_id, $playerCount)['player_stat'];
            $tournament = $this->tournamentData($round_id);
            return view('liveStats.showcase', compact('round', 'tournament', 'teams', 'players'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function liveMapChance($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $match_name = Matchz::where('id', $round->liveGameID)->first();
            $map_chance = $this->overallLiveResult($round_id, $match_name->map);
            foreach ($map_chance as $map) {
                // $map->averagePoint = $map->totalPoint / $map->totalPlayer;
                if ($map->totalPlayed == 0) {
                    $map->averagePoint = 0;
                    $map->averageKill = 0;
                } else {
                    $map->averagePlacePoint = $map->placePoint / $map->totalPlayed;
                    $map->averageKill = $map->totalkill / $map->totalPlayed;
                }
                $map->logoURL = $map->team->logoURL;
                $map->team_name = $map->team->name;
            }
            $map_chance = collect($map_chance)->sortByDesc('averagePlacePoint')->take(5)->values()->all();
            $map_chance = json_encode($map_chance);
            $tournament = $this->tournamentData($round_id);
            return view('liveStats.mapChance', compact('map_chance', 'round', 'tournament'));
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    // function used to take the overall Result of the match for that game place in live ID
    public function overallLiveResult($round_id, $map_name = null)
    {
        try {
            $round = Round::findorfail($round_id);
            $count = TeamStat::where('round_id', $round_id)->groupBy('team_id')->count();
            $team_stat = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->groupBy('team_id')->get();
            if ($map_name) {
                $match_id = Matchz::where('map', $map_name)->where('round_id', $round_id)->pluck('id');
                $totalPoint = TeamStat::where('round_id', $round_id)->whereIn('match_id', $match_id)->with('team')->orderBy('id', 'asc')->get();
                // return $totalPoint;
            } else {
                $totalPoint = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->get();
            }
            // dd($totalPoint);
            foreach ($totalPoint as $total_team) {
                if ($total_team->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($team_stat as $team) {
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

            $team_stat = collect($team_stat)->sortBy([
                ['totalPoint', 'desc'],
                ['totalWin', 'desc'],
                ['placePoint', 'desc'],
                ['totalPlayed', 'desc']
                ])->values()->all();
                
            foreach ($team_stat as $index => $teams) {
                $teams->rank =  $index + 1;
            }
            return $team_stat;
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function commingNext($round_id)
    {
        $round = Round::findorfail($round_id);
        $match_name = Matchz::where('id', $round->liveGameID)->first();
        $tournament = $this->tournamentData($round_id);
        return view('liveStats.commingNext', compact('round', 'match_name', 'tournament'));
    }

    public function currentMatchPlayerHeadToHead($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $player = $this->singleMatchMVP($round_id);
            $top_player = collect($player)->values()->all();
            $first_player = array_shift($top_player);
            $team1 = TeamStat::where('round_id', $round_id)->where('team_id', $first_player->team_id)->first();
            // return $team;
            $first_player->teamRank = $this->findRank($team1, $round_id)['rank'];
            $first_player->killPerMatch = $first_player->totalKill / $first_player->gamePlayed;
            $second_player = $player[1];
            $team2 = TeamStat::where('round_id', $round_id)->where('team_id', $second_player->team_id)->first();
            $second_player->teamRank = $this->findRank($team2, $round_id)['rank'];
            $second_player->killPerMatch = $second_player->totalKill / $second_player->gamePlayed;
            $tagline = false;
            return view('liveStats.playerHeadToHeads', compact('first_player', 'second_player', 'round', 'tagline'));
        } catch (Expectation $e) {
        }
    }


    public function playerHeadToHead($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $player = $this->MVP($round_id);
            $first_player = $player['top_player'];
            $team1 = TeamStat::where('round_id', $round_id)->where('team_id', $first_player->team_id)->first();
            // return $team;
            $first_player->teamRank = $this->findRank($team1, $round_id)['rank'];
            $first_player->killPerMatch = $first_player->totalKill / $first_player->gamePlayed;
            // return ($first_player);
            $second_player = $player['player_stat'][1];
            $team2 = TeamStat::where('round_id', $round_id)->where('team_id', $second_player->team_id)->first();
            $second_player->teamRank = $this->findRank($team2, $round_id)['rank'];
            $second_player->killPerMatch = $second_player->totalKill / $second_player->gamePlayed;
            $tagline = $round->tagLine;
            return view('liveStats.playerHeadToHeads', compact('first_player', 'second_player', 'round', 'tagline'));
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function currentMatchTeamHeadToHead($round_id)
    {
        $round = Round::findorfail($round_id);
        if ($round->liveGameID) {
            $first_team = TeamStat::where('match_id', $round->liveGameID)->where('position', 1)->with('playerStatement', function ($q) use ($round) {
                $q->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->first();
            $second_team = TeamStat::where('match_id', $round->liveGameID)->where('position', 2)->with('playerStatement', function ($q) use ($round) {
                $q->where('match_id', $round->liveGameID)
                    ->where('active', 1);
            })->first();
        } else {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
        if ($first_team && $second_team) {
            $team = $this->findRank($first_team, $round_id);
            $first_team->rank = $team['rank'];
            $first_team->overallPoint = $team['totalPoint'];
            $first_team->totalWin = $team['totalWin'];
            $first_team->totalPoint = $first_team->kill + $first_team->position_points;
            $team = $this->findRank($second_team, $round_id);
            $second_team->rank = $team['rank'];
            $second_team->overallPoint = $team['totalPoint'];
            $second_team->totalWin = $team['totalWin'];
            $second_team->totalPoint = $second_team->kill + $second_team->position_points;
            $tournament = $this->tournamentData($round_id);
            return view('liveStats.currentTeamHeadToHead', compact(['first_team', 'second_team', 'tournament', 'round']))->render();
        } else {

            return json_encode(array('statusCode' => 400,  'msg' => "Please Enter the result correctly"));
        }
    }

    public function teamHeadToHead($round_id)
    {
        $round = Round::findorfail($round_id);
        $team = $this->overallLiveResult($round_id);
        $first_team = $team[0];
        $second_team = $team[1];
        return view('liveStats.teamHeadToHeads', compact('first_team', 'second_team', 'round'));
    }

    public function singleMatchMVP($roundid)
    {
        try {
            $round = Round::findorfail($roundid);
            $player_stat = PlayerStat::where('match_id', $round->liveGameID)->orderBY('kill', 'desc')->get()->take(5);
            // dd($player_stat);
            $total_player = PlayerStat::where('round_id', $roundid)->orderBy('id', 'asc')->get();
            foreach ($total_player as $player_total) {
                if ($player_total->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($player_stat as $play) {
                    if ($play->player_id == $player_total->player_id) {
                        $play->totalKill = $play->totalKill + $player_total->kill;
                        if ($play->active == 1) {
                            $play->gamePlayed++;
                        }
                    }
                }
            }
            foreach ($player_stat as $player) {
                if ($player->kill != 0) {
                    $player->contribution = round($player->kill / $player->TeamKill($player->team_id, $player->match_id)->kill * 100, 2);
                } else {
                    $player->contribution = 0;
                }
            }
            return $player_stat;
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function findPlayerRank($round_id, $player_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $player = PlayerStat::where('round_id', $round_id)->orderBy('id', 'asc')->groupBy('player_id')->get();
            $total_player = PlayerStat::where('round_id', $round_id)->orderBy('id', 'asc')->get();
            foreach ($total_player as $player_stat) {
                if ($player_stat->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($player as $play) {
                    if ($play->player_id == $player_stat->player_id) {
                        $play->totalKill = $play->totalKill + $player_stat->kill;
                        if ($play->active == 1) {
                            $play->gamePlayed++;
                        }
                    }
                }
            }
            $player_stat = collect($player)->sortByDesc('totalKill')->values()->all();
            $team_stat = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->groupBy('team_id')->get();
            $totalPoint = TeamStat::where('round_id', $round_id)->with('team')->orderBy('id', 'asc')->get();
            foreach ($totalPoint as $total_team) {
                if ($total_team->match_id > $round->liveGameID) {
                    break;
                }
                foreach ($team_stat as $team) {
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
            foreach ($player_stat as $index => $player) {
                if ($player->player_id == $player_id) {
                    $player->rank = $index + 1;
                    return ['rank' => $player->rank, 'totalKill' => $player->totalKill, 'gamePlayed' => $player->gamePlayed];
                }
            }
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function graph($round_id)
    {
        $round = Round::findorfail($round_id);
        $team_stat = TeamStat::where('match_id', $round->liveGameID)->get();
        foreach ($team_stat as $team) {
            $team->totalPoint = $team->kill + $team->position_points;
        }
        $team_stat = collect($team_stat)->sortByDesc('totalPoint')->values()->reverse();
        $team_image = $team_stat->reverse();
        // return $team_stat;
        return view('liveStats.bar', compact('team_stat', 'team_image', 'round'));
    }

    public function winner($round_id)
    {

        try {
            $round = Round::findorfail($round_id);
            $team_stat = $this->overallLiveResult($round_id);
            $teams = $team_stat[0];
            $content = "CHAMPION";
            return view('liveStats.results.winner', compact('teams', 'round', 'content'));
        } catch (Expectation $e) {
            return $e;
        }
    }
    public function runnerUp($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $team_stat = $this->overallLiveResult($round_id);
            $teams = $team_stat[1];
            $content = "1ST RUNNER UP";
            return view('liveStats.results.winner', compact('teams', 'round', 'content'));
        } catch (Expectation $e) {
            return $e;
        }
    }
    public function secondRunnerUp($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $team_stat = $this->overallLiveResult($round_id);
            $teams = $team_stat[2];
            $content = "2ND RUNNER UP";
            return view('liveStats.results.winner', compact('teams', 'round', 'content'));
        } catch (Expectation $e) {
            return $e;
        }
    }

    public function overallSoloMVP($round_id)
    {
        $round = Round::findorfail($round_id);
        $player = $this->MVP($round_id);
        $top_player = $player['top_player'];
        return view('liveStats.results.eventMVP', compact('top_player', 'round'));
    }
}