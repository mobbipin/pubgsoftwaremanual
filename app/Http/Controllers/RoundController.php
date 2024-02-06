<?php

namespace App\Http\Controllers;

use App\Models\Map;
use App\Models\Alert;
use App\Models\Group;
use App\Models\Point;
use App\Models\Round;
use App\Models\Matchz;
use App\Events\MapEvent;
use App\Models\Schedule;
use App\Models\TeamStat;
use App\Events\AlertEvent;
use App\Models\PlayerStat;
use App\Models\Tournament;
use Illuminate\Http\Request;
use App\Events\ShowCaseEvent;
use App\Events\GameIntroEvent;
use App\Events\ComingNextEvent;
use App\Events\StatEvent;
use Illuminate\Support\Facades\DB;

class RoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255'
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            DB::beginTransaction();
            $round = Round::create(array_filter($request->all()));
            $schedule = Schedule::create(['round_id' => $round->id]);
            $alert = Alert::create(['round_id' => $round->id, 'tournament_id' => $round->tournament_id]);
            DB::commit();
            return json_encode(array('statusCode' => 200,  'msg' => "Round added successfully"));
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $games = Matchz::where('round_id', $id)->orderBy('created_at', 'desc')->get();
        $round = Round::where('id', $id)->first();
        $maps = Map::get();
        $groups = Group::where('round_id', $round['id'])->get();
        // dd($round->id);
        $tournament = Tournament::where('id', $round->tournament_id)->get();
        return view('new_layout.pages.round', compact(['round', 'games', 'maps', 'groups', 'tournament']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $round = Round::find($id);
        return [
            'modal_view' => view('tournaments.round.editModelRound', compact('round'))->render(),
        ];
    }

    public function update(Request $request, $id)
    {

        if (!isset($request->showRoster)) {
            $request->request->add(['showRoster' => 0]);
        }
        if (!isset($request->isTest)) {
            $request->request->add(['isTest' => 0]);
        }
        if (!isset($request->showAlert)) {
            $request->request->add(['showAlert' => 0]);
        }
        if (!isset($request->needLogo)) {
            $request->request->add(['needLogo' => 0]);
        }
        if (!isset($request->showLower)) {
            $request->request->add(['showLower' => 0]);
        }
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255'
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $round = Round::find($id);
            $round->update(array_filter($request->all(), 'strlen'));
            event(new ComingNextEvent($round->id));
            event(new GameIntroEvent($round->id));
            event(new MapEvent($round->id, 'refresh'));
            event(new AlertEvent($round->id, '', 'refresh', '', '', '', '', ''));
            event(new ShowCaseEvent($round->id, '', '', ''));
            event(new StatEvent($round->id, "refresh", "", "refresh", "", ""));
            return json_encode(array('statusCode' => 200,  'msg' => "Round updated successfully"));
        } catch (\Exception $e) {
            return $e->getMessage();
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
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
    public function matchz($id)
    {
        $match = Matchz::where('round_id', $id)->get();
        return $match;
    }

    public function result_entry(Request $request, $match_id)
    {
        $match = Matchz::findorfail($match_id);
        $data = TeamStat::where('match_id', $match_id)->get();
        $tournament_data = Tournament::find($data->first()->tournament_id);
        $round_data = Round::find($data->first()->round_id);
        $data = collect($data)->values()->all();
        $team_with_player = collect(TeamStat::where('match_id', $match_id)->whereHas('PlayerStatement', function ($query) use ($match_id) {
            $query->where('match_id', $match_id)
                ->where('active', 1);
        })->get())->values()->all();
        $team_without_player = array_diff($data, $team_with_player);
        $team_sort = [];
        if ($request->sortBy == "position") {
            foreach ($team_with_player as $key => $player) {
                if ($player->position != 0) {
                    $team_sort[] = $player;
                }
            }
            $team_sort = collect($team_sort)->sortBy($request->sortBy)->values()->all();
            $team_with_player = array_diff($team_with_player, $team_sort);
            // return $team_with_player;
            // $team_without_player = collect($team_without_player)->sortBy($request->sortBy)->values()->all();
        } elseif ($request->sortBy == "slot") {
            // $team_sort = $team_with_player;

            $team_with_player = collect($team_with_player)->sortBy('team.slot')->values()->all();
            // return $team_with_player;
        }
        // return response()->json([
        //     'data' => $data,
        //     'team_with_player' => $team_with_player,
        //     'team_without_player' => $team_without_player,
        // ]);
        // return $team_without_player;
        // return view('games.resultEntry', ['data' => $data, 'round_data' => $round_data]);
        return view('new_layout.pages.newResultEntry', ['team_sort' => $team_sort, 'match' => $match, 'data' => $data, 'round_data' => $round_data, 'match_id' => $match_id, 'tournament_data' => $tournament_data, 'team_with_player' => $team_with_player, 'team_without_player' => $team_without_player]);
    }

    public function teamkill(Request $request)
    {
        $data  = $request->all();
        $team_stat_id = $data['team_stat_id'];
        $team_kill = $data['kills'];
        $result_team_data = TeamStat::where('id', $data['team_stat_id'])->update(['kill' => $team_kill]);
        if ($result_team_data) {
            return json_encode(array('statusCode' => 200,  'msg' => "Successfully"));
        } else {
            return json_encode(array('statusCode' => 400,  'msg' => "Unsuccessful"));
        }
    }
    public function updateData(Request $request)
    {
        $team_id = $request->all()['team_id'];
        $total_kills = $request->all()['total_kills'];
        $player_stat_id = $request->all()['player_stat_id'];
        $player_kill = $request->all()['player_kill'];
        $result_team_data = TeamStat::where('id', $team_id)->update(['kill' => $total_kills]);
        $result_player_data = PlayerStat::where('id', $player_stat_id)->update(['kill' => $player_kill]);
        $player_stat = PlayerStat::where('id', $player_stat_id)->first();
        $alert = ALert::where('round_id', $player_stat->round_id)->first();
        $showAlert = $player_stat->round->showAlert;
        if ($alert) {
            if (!$alert->first_blood) {
                $alert->first_blood = $player_stat->player_id;
                if ($showAlert) {
                    event(new AlertEvent($player_stat->round_id, 'FIRST BLOOD', 'player', '', $player_stat->player->name, $player_stat->player->photoURL, $player_stat->team->smallLogoURL, ''));
                }
            }
            $count = PlayerStat::where('round_id', $player_stat->round_id)->where('player_id', $player_stat->player_id)->sum('kill');
            //Player to reach 50 and 100 kIlls
            if ($count == 50 && !$alert->first_fifty_kill) {
                $alert->first_fifty_kill = $player_stat->player_id;
                if ($showAlert) {
                    event(new AlertEvent($player_stat->round_id, 'FIRST FIFTY KILLS', 'player', '', $player_stat->player->name, $player_stat->player->photoURL, $player_stat->team->smallLogoURL, ''));
                }
            } elseif ($count == 100 && !$alert->first_hundred_kill) {
                $alert->first_hundred_kill = $player_stat->player_id;
                if ($showAlert) {
                    event(new AlertEvent($player_stat->round_id, 'FIRST HUNDRED KILLS', 'player', '', $player_stat->player->name, $player_stat->player->photoURL, $player_stat->team->smallLogoURL, ''));
                }
            }
            //FIRST TEAM TO REACH 50KILLS and 100 KILLS
            $teamKill = TeamStat::where('round_id', $player_stat->round_id)->where('team_id', $player_stat->team_id)->sum('kill');
            if ($teamKill == 50 && !$alert->first_team_fifty_kill) {
                $alert->first_team_fifty_kill = $player_stat->team_id;
                if ($showAlert) {
                    event(new AlertEvent($player_stat->round_id, 'FIRST FIFTY KILLS', 'team', '', $player_stat->team->name, $player_stat->team->logoURL, $player_stat->team->smallLogoURL, ''));
                }
            } elseif ($teamKill == 100 && !$alert->first_team_hundred_kill) {
                $alert->first_team_hundred_kill = $player_stat->team_id;
                if ($showAlert) {
                    event(new AlertEvent($player_stat->round_id, 'FIRST HUNDRED KILLS', 'team', '', $player_stat->team->name, $player_stat->team->logoURL, $player_stat->team->smallLogoURL, ''));
                }
            }
            $alert->save();
        }
        if ($result_team_data && $result_player_data) {
            return json_encode(array('statusCode' => 200,  'msg' => "Successfully"));
        } else {
            return json_encode(array('statusCode' => 400,  'msg' => "Unsuccessful"));
        }
    }

    public function updatePositionData(Request $request)
    {
        $team_stat_id = $request->all()['team_stat_id'];
        $position = $request->all()['position'];
        if ($position > 16) {
            $point = 0;
        } elseif ($position == 0) {
            $point = 0;
        } else {
            $point = Point::where('position', $position)->get()[0]['position_points'];
        }
        // dd($point);
        $result_team_data = TeamStat::where('id', $team_stat_id)->update(['position' => $position, 'position_points' => $point]);

        if ($result_team_data) {
            return json_encode(array('statusCode' => 200,  'msg' => "Successfully"));
        } else {
            return json_encode(array('statusCode' => 400,  'msg' => "Unsuccessful"));
        }
    }

    public function updateTeamDeadData(Request $request)
    {
        $team_stat_id = $request->all()['team_stat_id'];
        $dead = $request->all()['dead'];
        $match_id = TeamStat::where('id', $team_stat_id)->get()[0]['match_id'];
        $team_id = TeamStat::where('id', $team_stat_id)->get()[0]['team_id'];
        $result_team_data = TeamStat::where('id', $team_stat_id)->update(['dead' => $dead]);
        $result_player_data = PlayerStat::where('team_id', $team_id)->where('match_id', $match_id)->update(['dead' => $dead]);

        if ($result_team_data && $result_player_data) {
            return json_encode(array('statusCode' => 200,  'msg' => "Successfully"));
        } else {
            return json_encode(array('statusCode' => 400,  'msg' => "Unsuccessful"));
        }
    }
    public function updatePlayerDeadData(Request $request)
    {
        $dead = $request->all()['dead'];
        $player_stat_id = $request->all()['player_stat_id'];
        $team_stat_id = $request->all()['team_stat_id'];

        $result_player_data = PlayerStat::where('id', $player_stat_id)->update(['dead' => $dead]);
        if (!$dead) {
            $result_team_data = TeamStat::where('id', $team_stat_id)->update(['dead' => $dead]);
        }

        if ($result_player_data) {
            return json_encode(array('statusCode' => 200,  'msg' => "Successfully"));
        } else {
            return json_encode(array('statusCode' => 400,  'msg' => "Unsuccessful"));
        }
    }

    // Not to remove the Empty Value
    public function myFilter($var)
    {
        return ($var !== NULL && $var !== FALSE && $var !== "");
    }
}
