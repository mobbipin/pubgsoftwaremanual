<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Group;
use App\Models\Matchz;
use App\Models\Player;
use App\Models\PlayerStat;
use App\Models\TeamStat;
use App\Models\Map;
use App\Models\Round;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function team(Request $request)
    {
        $team = Team::where('group_id', $request->group_id)->get();
        return response()->json([
            'teams' => $team
        ]);
    }

    public function playerStore(Request $request)
    {
        // dd($request->all());
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255',
                'team_id' => 'required|min:|max:255',
                // 'group_id' => 'required|min:|max:255'
            ]);
            // dd($request->all());
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $player = Player::create(['name' => $request->name, 'team_id' => $request->team_id, 'photoURL' => $request->photoURL]);
            return json_encode(array('statusCode' => 200,  'msg' => "Round added successfully"));
        } catch (\Exception $e) {
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function playerStoreResult(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'playerName' => 'required|min:|max:255',
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $match = Matchz::where('id', $request->match_id)->first();
            $round_id = $match->round_id;
            $match_id = Matchz::where('created_at', '>=', $match->created_at)->where('round_id', $round_id)->pluck('id');
            // return $match_id;
            $player = Player::create(['name' => $request->playerName, 'team_id' => $request->team_id]);
            foreach ($match_id as $key => $value) {
                PlayerStat::create(['match_id' => $value, 'player_id' => $player->id, 'round_id' => $match->round_id, 'team_id' => $request->team_id, 'active' => 1]);
            }
            // $PlayerStat = PlayerStat::create(['match_id' => $match->id, 'player_id' => $player->id, 'round_id' => $match->round_id, 'team_id' => $request->team_id, 'active' => 1]);
            return json_encode(array('statusCode' => 200,  'msg' => "Player  added successfully"));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function playerUpdate(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255',
                'team_id' => 'required|min:|max:255',
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $player = Player::find($request->all()['id']);
            $player->update($request->all());
            return json_encode(array('statusCode' => 200,  'msg' => "Player updated successfully"));
        } catch (\Exception $e) {
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function playerDelete(Request $request)
    {
        $result = Player::find($request->all()['id']);
        return $result->delete()
            ?
            json_encode(array('statusCode' => 200,  'msg' => "Player deleted successfully"))
            :  json_encode(array('statusCode' => 400, 'msg' => 'There was some issue with the server. Please try again.'));
    }

    public function teamDelete(Request $request)
    {
        $result = Team::find($request->all()['id']);
        return $result->delete()
            ?
            json_encode(array('statusCode' => 200,  'msg' => "Team deleted successfully"))
            :  json_encode(array('statusCode' => 400, 'msg' => 'There was some issue with the server. Please try again.'));
    }

    public function teamUpdate(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255',
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $team = Team::find($request->all()['id']);
            // return $request->all();
            $result = $team->update($request->all());
            if ($result)
                return json_encode(array('statusCode' => 200,  'msg' => "Team updated successfully"));
            return json_encode(array('statusCode' => 400,  'msg' => "error"));
        } catch (\Exception $e) {
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function addGroup(Request $request)
    {
        // dd($request->all());
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255'
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $group = Group::create($request->all());
            return json_encode(array('statusCode' => 200,  'msg' => "Group added successfully"));
        } catch (\Exception $e) {
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function addTeam(Request $request)
    {
        // dd($request->all());
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255',
                'group_id' => 'required|min:|max:255'
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $team = Team::create($request->all());
            return json_encode(array('statusCode' => 200,  'msg' => "Round added successfully"));
        } catch (\Exception $e) {
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function addMatch(Request $request)
    {
        // dd($request->all());
        // dd('es');
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                "map" => 'required',
                "group_id" => 'required'
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            DB::beginTransaction();
            $match = Matchz::create([
                'name' => $request->name,
                'map' => $request->map,
                'round_id' => $request->round_id,
                'subname' => $request->subName,
                'number' => $request->number,
                'time' => $request->time,
            ]);
            $teams = Team::whereIn('group_id', $request->group_id)->with('player')->get();
            foreach ($teams as $team) {
                $teamStatData = TeamStat::create([
                    'team_id' => $team->id,
                    'match_id' => $match->id,
                    'group_id' => $team->group_id,
                    'round_id' => $match->round_id,
                    'tournament_id' => $match->round->tournament_id,
                ]);
                foreach ($team->player as $player) {
                    PlayerStat::create([
                        'team_id' => $team->id,
                        'match_id' => $match->id,
                        'team_stat_id' => $teamStatData->id,
                        'player_id' => $player->id,
                        'round_id' => $match->round_id,
                    ]);
                }
            }
            DB::commit();

            return json_encode(array('statusCode' => 200,  'msg' => "Round added successfully"));
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function teamRoster(Request $request)
    {

        $teams = Team::where('name', 'like', '%' . $request->teamName . '%')->get();
        // return $team;
        foreach ($teams as $team) {
            $team->tournament_name = $team->group->round->tournament->name;
        }
        return response()->json([
            'teams' => $teams
        ]);
    }

    public function addExistingTeam(Request $request)
    {
        try {
            $team = Team::findorFail($request->team_id);
            DB::beginTransaction();
            $creatTeam = Team::Create(
                [
                    'name' => $team->name,
                    'group_id' => $request->group_id,
                    'teamPhotoURL' => $team->teamPhotoURL,
                    'logoURL' => $team->logoURL,
                    'smallLogoURL' => $team->smallLogoURL,
                    'color' => $team->color,
                    'tag' => $team->tag,
                ]
            );
            foreach ($team->player as $player) {
                $creatPlayer = Player::Create(
                    [
                        'name' => $player->name,
                        'team_id' => $creatTeam->id,
                        'photoURL' => $player->photoURL,
                    ]
                );
            }
            DB::commit();
            return json_encode(array('statusCode' => 200,  'msg' => "Team added successfully"));
        } catch (\Exception $e) {
            DB::rollBack();
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function fetchTeam(Request $request)
    {
        $team = Team::where('id', $request->all()['team_id'])->get();
        return json_encode(array('statusCode' => 200, 'msg' => "Team fetched"));
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $team = Team::find($request->all()['id']);
        return [
            'modal_view' => view('team.editModalTeam', compact('team'))->render(),
        ];
    }
    public function playerEdit(Request $request)
    {
        // dd($request->all());
        $teams = Team::where('group_id', $request->all()['group_id'])->get();
        // $teamData = Team::find($request->all()['team_id']);
        $player = Player::find($request->all()['id']);
        return [
            'modal_view' => view('player.editModalPlayer', compact('player', 'teams'))->render(),
        ];
    }
    public function playerAdd(Request $request)
    {
        // dd($request->all()['id']);
        $teams = Team::where('group_id', $request->all()['group_id'])->get();
        $teamData = Team::find($request->all()['id']);
        // dd($teamData);
        return [
            'modal_view' => view('player.addModalPlayer', compact('teams', 'teamData'))->render(),
        ];
    }

    public function resultPlayerAdd(Request $request)
    {
        // return ($request->all());
        $team = Team::where('id', $request->id)->first();
        $match_id = $request->match_id;
        // dd($teamData);resources\views\player\addPlayerResultEntry.blade.php
        return [
            'modal_view' => view('player.addPlayerResultEntry', compact('team', 'match_id'))->render(),
        ];
    }

    public function playerAddInStat(Request $request)
    {
        // return $request->all();
        $data = PlayerStat::find($request->all()['id']);
        //    return  $data->player_id;
        $result = PlayerStat::where('player_id', $data->player_id)->where('created_at', '>=', $data->created_at)->update(['active' => $request->active]);
        // return $player;
        // $result = $data->update(array_filter($request->all(), 'strlen'));
        if ($result)
            return json_encode(array('statusCode' => 200,  'msg' => "Updated"));
        else
            return json_encode(array('statusCode' => 400,  'msg' => "failed"));
    }

    public function matchEdit(Request $request)
    {
        $data = $request->all();
        $match = Matchz::find($request->all()['id']);
        $maps  = Map::get();
        $groups = Group::where('round_id', $match->round_id)->get();
        $round = Round::where('id', $match->round_id)->first();
        return [
            'modal_view' => view('match.editMatchModal', compact('match', 'maps', 'groups', 'round'))->render(),
        ];
    }

    public function matchUpdate(Request $request)
    {
        try {

            $match = Matchz::find($request->all()['id']);
            $result = $match->update(array_filter($request->all(), 'strlen'));

            if ($result)
                return json_encode(array('statusCode' => 200,  'msg' => "Match updated successfully"));
            return json_encode(array('statusCode' => 400,  'msg' => "error"));
        } catch (\Exception $e) {
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function matchDelete(Request $request)
    {
        $result = Matchz::find($request->all()['id']);
        $Schedule = Schedule::where('round_id', $result->round_id)->first();
        $Schedule->update([
            'first_match_id' => null,
            'second_match_id' => null,
            'third_match_id' => null,
            'fourth_match_id' => null,
            'fifth_match_id' => null,
            'sixth_match_id' => null,
        ]);
        return $result->delete()
            ?
            json_encode(array('statusCode' => 200,  'msg' => "Match deleted successfully"))
            :  json_encode(array('statusCode' => 400, 'msg' => 'There was some issue with the server. Please try again.'));
    }
}
