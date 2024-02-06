<?php

namespace App\Http\Controllers;

use App\Events\StatEvent;
use Illuminate\Http\Request;
use App\Events\ShowCaseEvent;
use App\Events\SquadRosterEvent;
use App\Events\ChickenDinnerNotification;
use App\Events\MapEvent;

class PusherController extends Controller
{
    public function resultPusher(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        $page = $request->page;
        event(new ChickenDinnerNotification($type, $id, $page));
    }

    public function roasterPusher(Request $request)
    {
        $id = $request->id;
        $page = $request->page;
        event(new SquadRosterEvent($id, $page));
    }

    public function liveStatFromResult(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        $display = ($request->display == "off") ? false : true;
        $activestatus = true;
        $page = null;
        event(new StatEvent($id, $type, $display, $activestatus, '', $page));
    }
    public function liveStat(Request $request)
    {
        $type = $request->type;
        $id = $request->id;
        $divActive = $request->divActive;
        $display = ($request->display == "off") ? false : true;
        event(new StatEvent($id, $type, $display, '', $divActive, $request->page));
    }

    public function showCase(Request $request)
    {
        $round_id = $request->round_id;
        $team_id = $request->team_id;
        $player_id = $request->player_id;
        $type = $request->type;
        event(new ShowCaseEvent($round_id, $team_id, $player_id, $type));
    }

    public function mapPusher(Request $request)
    {
        $round_id = $request->id;
        $type = $request->type;
        event(new MapEvent($round_id, $type));
    }
}
