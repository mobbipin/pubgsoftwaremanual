<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\TeamStat;
use App\Events\AlertEvent;
use App\Models\Alert;
use App\Models\PlayerStat;
use App\Models\PrizePool;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Mockery\Expectation;

class AlertController extends Controller
{

    public function tournamentData($round_id)
    {
        $round = Round::findorfail($round_id);
        $tournament = Tournament::where('id', $round->tournament_id)->get();
        return $tournament;
    }
    public function index($round_id)
    {
        $round = Round::findorfail($round_id);
        $tournament = $this->tournamentData($round_id);
        return view('liveStats.alerts', compact('round', 'tournament'));
    }

    public function alerts(Request $request, $id)
    {
        $round = Round::findorfail($id);
        if ($round->showAlert) {
            if ($request->type == 'player') {
                $player = PlayerStat::findorfail($request->player_id);
                if (!$player->dead) {
                    event(new AlertEvent($round->id, $request->message, $request->type, $request->kills, $player->player->name, $player->player->photoURL, $player->team->smallLogoURL, ''));
                } else {
                    return response()->json(['message' => 'Player is dead'], 200);
                }
            } else {
                $team = TeamStat::findorfail($request->team_id);
                event(new AlertEvent($round->id, $request->message, $request->type, $request->kills, $team->team->name, "", $team->team->smallLogoURL, $request->position));
            }
        }
    }

    public function playerAlerts(Request $request)
    {
        return view('new_layout.alerts.playerAlert', compact('request'));
    }

    public function teamAlerts(Request $request)
    {
        return view('new_layout.alerts.teamAlert', compact('request'));
    }

    public function restAlerts(Request $request)
    {
        try {
            $alert = Alert::where('round_id', $request->round_id)->first();
            // return $alert;
            if ($alert) {
                $alert->first_blood = null;
                $alert->save();
            }
            return json_encode(array('statusCode' => 200,  'msg' => "Alert Reset Successfully"));
        } catch (\Exception $e) {
            return json_encode(array('statusCode' => 500,  'msg' => $e->getMessage()));
        }
    }
    public function prizePool($round_id)
    {
        // return "still in made";
        try {
            $round = Round::findorfail($round_id);
            $tournament = $this->tournamentData($round_id);
            $prizePool = PrizePool::where('tournament_id', $tournament[0]->id)->get();
            return view('liveStats.results.prizePool', compact('round', 'tournament', 'prizePool'));
        } catch (Expectation $e) {
            return $e;
        }
    }
    public function prizePoolSave(Request $request)
    {
        // return "still in made";
        $data = $request->all();
        // return $data;
        $datas = collect($data)->except('tournament_id', '_token', 'round_id');
        foreach ($datas as $index => $data) {
            if ($data != null) {
                $data = PrizePool::create(['position' => $index, 'prize' => $data, 'round_id' => $request->round_id, 'tournament_id' => $request->tournament_id]);
            }
        }
        return back();
    }

    public function prizePoolUpdate(Request $request, $prizeId)
    {
        try {
            // return $request->all(0);
            $prize = PrizePool::findorfail($prizeId);
            // return $prize;
            $prize->update($request->all());
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
