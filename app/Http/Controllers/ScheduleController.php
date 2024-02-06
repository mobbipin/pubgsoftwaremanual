<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Group;
use App\Models\Round;
use App\Models\Matchz;
use App\Models\Player;
use App\Models\Schedule;
use Mockery\Expectation;
use App\Models\Tournament;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function schedule($round_id)
    {
        // return view('misc.schedule');
        try {
            $round = Round::findorfail($round_id);
            $schedule = Schedule::where('round_id', $round_id)->first();
            $matchs = Matchz::where('round_id', $round_id)->get();

            $round = Round::findorfail($round_id);
            $tournament = Tournament::where('id', $round->tournament_id)->get();
            if ($schedule) {
                return view('liveStats.schedule', compact(['schedule', 'matchs', 'round', 'tournament']));
            } else {
                return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
            }
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }

    public function match(Request $request, $id)
    {
        $schedule = Schedule::where('round_id', $id);
        $schedule->update($request->all());
        return json_encode(array('statusCode' => 200,  'msg' => "Tournament updated successfully"));
    }

    public function liveSchedule($round_id)
    {
        $round = Round::findorfail($round_id);
        $schedule = Schedule::where('round_id', $round_id)->first();
        return view('liveStats.liveSchedule', compact('schedule', 'round'))->render();
    }

    public function searchPlayer(Request $request)
    {
        try {
            $players = Player::where('team_id', $request->team_id)->get();
            return response()->json([
                'players' => $players
            ]);
        } catch (Expectation $e) {
            return json_encode(array('statusCode' => 400,  'msg' => "Something went wrong"));
        }
    }
}
