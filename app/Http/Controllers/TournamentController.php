<?php

namespace App\Http\Controllers;

use App\Models\Matchz;
use App\Models\Round;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Mockery\Expectation;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::orderby('id', 'desc')->get();
        $title = 'Tournaments';
        return view('new_layout.pages.tournament', ['tournaments' => $tournaments]);
    }

    public function show($tournamentID)
    {
        session(['tournament_id' => $tournamentID]);
        $rounds = Round::where('tournament_id', $tournamentID)->get();
        return view('new_layout.pages.tournamentRoundShow', ['rounds' => $rounds]);
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:|max:255'
        ]);
        if ($validator->fails()) {
            return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
        }
        $data = $request->all();
        $tournament = new Tournament;
        $tournament->fill($data);
        $result = $tournament->save();
        // $tournament = $data;
        // unset($tournament['_token']);
        // $serialData = serialize($tournament);
        // $result = $serialData->save();
        // dd($result);
        return json_encode(array('statusCode' => 200,  'msg' => "Tournament added successfully"));
    }
    public function edit($id)
    {
        $tournament = Tournament::find($id);
        return [
            'modal_view' => view('tournaments.editModalTournment', compact('tournament'))->render(),
        ];
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required|min:|max:255'
            ]);
            if ($validator->fails()) {
                return json_encode(array('statusCode' => 400, 'errors' => $validator->errors()->all()));
            }
            $tournament = Tournament::find($id);
            $tournament->update($request->all());
            return json_encode(array('statusCode' => 200,  'msg' => "Tournament updated successfully"));
        } catch (\Exception $e) {
            return $e->getMessage();
            return json_encode(array('statusCode' => 400, 'errors' => $e->getMessage()));
        }
    }

    public function round($id)
    {
        $round = Round::where('tournament_id', $id)->get();
        return $round;
    }

    public function gameIntro($round_id)
    {
        try {
            $round = Round::findorfail($round_id);
            $tournament = Tournament::where('id', $round->tournament_id)->get();
            $match = Matchz::where('id', $round->liveGameID)->first();
            return view('liveStats.tournamentGameIntro', compact('round', 'tournament', 'match'));
        } catch (Expectation $e) {
            return back()->with('msg', 'Something Went Wrong!');
        }
    }
}
