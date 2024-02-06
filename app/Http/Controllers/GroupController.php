<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Group;
use App\Models\Matchz;
use App\Models\PlayerStat;
use App\Models\Round;
use App\Models\Team;
use App\Models\TeamStat;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Mockery\Expectation;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $group = Team::where('group_id', $id)->with('player')->get();
        return $group;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function gameStat($id)
    {
        $round = TeamStat::where('match_id', $id)->with('playerStat')->get();
        return $round;
    }

    public function rosterUpdate($group_id)
    {
        $group = Group::findorfail($group_id);
        $teams = Team::where('group_id', $group_id)->with('player')->orderBy('slot', 'asc')->get();
        $round_id = Group::where('id', $group_id)->get()[0]['round_id'];
        $round = Round::findorfail($round_id);
        $match_id = Round::where('id', $round_id)->get()[0]['liveGameID'];

        $games = Matchz::where('round_id', $round_id)->get();
        $round = Round::where('id', $round_id)->first();
        $maps = Map::get();
        return view('games.squad', ['teams' => $teams, 'round' => $round, 'round_id' => $round_id, 'match_id' => $match_id, 'games' => $games, 'round' => $round, 'maps' => $maps, 'group_id' => $group_id, 'group' => $group]);
    }

    public function game_status($match_id)
    {

        $teams = TeamStat::where('match_id', $match_id)->with('playerStatement', function ($q) use ($match_id) {
            $q->where('match_id', $match_id);
        })->get()->sortBy('team.slot');
        $round = Round::find($teams->first()->round_id);
        // return $teams;
        // return view('games.gameStatus', ['teams' => $teams, 'match_id' => $match_id]);
        return view('new_layout.pages.newGameStatus', ['teams' => $teams, 'match_id' => $match_id, 'round' => $round]);
    }

    public function teamDetails($team_id)
    {
        try {
            $teams = Team::where('id', $team_id)->with('player')->first();
            $round = Round::where('id', $teams->group->round_id)->first();
            foreach ($teams->player as $player) {
                $player->totalKill = PlayerStat::where('player_id', $player->id)->where('round_id', $round->id)->sum('kill');
                $player->gamePlayed = PlayerStat::where('player_id', $player->id)->where('round_id', $round->id)->where('active', 1)->count();
                if ($player->gamePlayed != 0) {
                    $player->kd = round($player->totalKill / $player->gamePlayed, 2);
                }
            }
            $groupid = Group::where('round_id', $round->id)->pluck('id');
            $allTeam = Team::whereIn('group_id', $groupid)->get();
            $count = Team::whereIn('group_id', $groupid)->count();
            $allTeam = collect($allTeam)->values()->all();
            $first_row_team = collect($allTeam)->take($count / 2)->values()->all();
            $second_row_team = array_diff($allTeam, $first_row_team);
            // return response()->json([
            //     'allTeam' => $allTeam,
            //     'first_row_team' => $first_row_team,
            //     'second_row_team' => $second_row_team
            // ]);
            // return $team;
            $tournament = Tournament::where('id', $round->tournament_id)->first();
            return view('games.teamDetails', compact('teams', 'round', 'tournament', 'first_row_team', 'second_row_team'));
        } catch (Expectation $e) {
            return back();
        }
    }
}
