@extends('layout.main')
@section('title', 'Tournaments')
@push('styles')
<link rel="stylesheet" href="{{ asset('pubg/css/styles.css') }}">
<link rel="stylesheet" href="{{ asset('pubg/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/grand-finale/finale.css') }}">
<style>
    body {
        background-color: #282828;
    }

    .heading1 {
        color: white;
        font-size: 70px;
        font-weight: bolder;
        padding-top: 20px;
        margin-left: -15px
    }

    .span1 {
        color: white;
        font-size: 40px;
    }

    .row1st {
        justify-content: space-between;
    }

    .menu {
        font-size: 10px;
        color: #151722;
    }

    .ranking {
        justify-content: space-between;
    }

    .colrank2 {
        background-image: linear-gradient(to right, #8cb736, #4d7810);
        text-align: center;
    }

    .colrank21 {
        font-size: 25px;
        font-weight: bold;
        text-align: center;
    }

    .colrank22 {
        background-color: #151722;
        color: #4d7810;
        font-size: 25px;
        font-weight: bold;
    }

    .row2nd {
        justify-content: space-evenly;
        border-bottom: 5px solid #282828;
    }

    .cont1 {
        background-image: linear-gradient(#8cb736, #4d7810);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.527);
        height: 306px;
    }

    .rank1 {
        font-size: 40px;
        font-weight: bold;
        color: #151722;
        margin: 0px 0px 0px;
    }

    .img11 {
        margin-right: -30px;
        position: relative;
        height: 175px;
    }

    .img12 {
        margin-right: -30px;
        height: 175px;
        position: relative;
    }

    .img13 {
        position: relative;
        z-index: 2;
        height: 175px;
    }

    .img14 {
        z-index: 1;
        margin-left: -50px;
        position: relative;
        height: 175px;
    }

    .teamname {
        background-color: #151722;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        color: #4d7810;
        margin: 0px 0px 0px;
        padding-bottom: 4px;
        padding-top: 4px;
        margin-left: -15px;
        margin-right: -15px;
        margin-bottom: -20px;
        border-top: 1px solid rgba(255, 255, 255, 0.527);
    }

    .rowpoints {
        margin-top: -20px;
        color: white;
        font-size: 60px;
        font-weight: bold;
        text-align: center;
    }

    .rowfooter {
        background-image: linear-gradient(to right, #8cb736, #2828287e);
        border: 1px solid rgba(255, 255, 255, 0.527);
        font-size: 20px;
        font-weight: bold;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endpush
@section('topBase')
@include('layout.menu')
@include('layout.submenu')
@stop
@section('content')
<section>
    <div class="container player-menu pb-5">
        @foreach ($games as $game)
        <div class="row row5">
            <div class="col-md-6 col5">
                <span class="text123">
                    NAME: {{ $game->name }} -- MAP: {{ $game->map }} -- NUMBER: {{ $game->number }} --
                    SUBNAME: {{ $game->subname }} -- TIME: {{ $game->time }}
                </span>
            </div>
            <div class="col-md-1">
                <button class="btn btn5" onclick="location.href='{{ url('/result_entry',$game->id) }}';">Results
                    Entry</button>
            </div>
            <div class="col-md-1">
                <button class="btn btn5">Insta Results</button>
            </div>
            <div class="col-md-1 col51"><i class="bi bi-graph-down bi1"></i></div>
            <div class="col-md-1 col51">
                <i class="bi bi-pencil-square bi2"></i>
            </div>
            <div class="col-md-1 col51"><i class="bi bi-box bi3"></i></div>
            <div class="col-md-1 col51"><i class="bi bi-trash bi4"></i></div>
        </div>
        @endforeach
    </div>
</section>
<div class="modal fade" id="addGroup">
    <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="addtournament text-white">Add Group</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formGroup">
                    @csrf
                    <input type="hidden" name="round_id" value="{{ $round->id }}">
                    <div class="col">
                        <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">
                            <div class="col-3">
                                <label for="">Player Name</label>
                                <input type="text" placeholder="Name" name="name">
                            </div>
                            <div class="d-flex justify-content-around mt-3 col-4 mb-2">
                                <div class="col-3 mt-3"><button class="btn btn-lg btn52 btn-success" id="submitGroup">ADD</button></div>
                                <div class="col-3 ml-4 mb-4 modal-footer">
                                    <button class="btn btn-lg btn51 btn-danger bg-danger ml-3" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>
                            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}

                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
</div>
<div class="modal fade" id="addTeam">
    <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="addtournament">Add Team</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formTeam">
                    @csrf
                    <div class="col">
                        <div class="col-12 d-flex flex-wrap justify-content-between add-tournament-form">
                            <div class="col-6">
                                <label for="">Groups</label><br>
                                <select name="group_id" class="p-2 bg-white border border-none rounded">
                                    <option value="">Select Group</option>
                                    @forelse (@$round->group as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="">Team Name</label>
                                <input type="text" placeholder="Team Name" name="name" class="p-2 bg-white border border-none">
                            </div>

                        </div>
                        <div class="d-flex justify-content-between col-3 mb-2 mt-3 player-btn-div">
                            <div class="col-4 mt-3"><button class="btn btn-lg btn52 btn-success" id="submitTeam">ADD</button></div>
                            <div class="col-4  modal-footer">
                                <button class="btn btn-lg btn51 btn-danger bg-danger border border-none" data-dismiss="modal">CANCEL</button>
                            </div>
                            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="addGame">
    <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <label for="">
                    <h2>Round</h2>
                </label>
                <h5 class="addtournament text-white">Add Game</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formMatch">
                    @csrf
                    <input type="hidden" name="round_id" value="{{$round->id}}">
                    <div class="col">
                        <div class="col-lg-12 d-flex flex-wrap justify-content-around add-tournament-form">

                            <div class="col-6 mb-2">
                                <label for="">Name</label>
                                <input type="text" placeholder="Name" name="name">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">SubName</label>
                                <input type="text" name="subName" placeholder="subName">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Time</label>
                                <input type="text" name="time" placeholder="time">
                            </div>
                            <div class="col-6 mb-2">
                                <label for="">Number</label>
                                <input type="number" name="number" placeholder="number">
                            </div>
                            <div class="col-2 mb-2">
                                <label for="">Maps</label><br>
                                <select name="map" class="p-2 border border-none bg-white">
                                    <option value="">Select Map</option>
                                    @forelse (@$maps as $map)
                                    <option value="{{ $map->name }}">{{ $map->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-2 mb-2">
                                <label for="Groups">Add Groups</label><br>
                                <select name="group_id[]" multiple class="bg-white p-2 border border-none rounded">
                                    @forelse (@$round->group as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-3 d-flex justify-content-between">
                                <div class="col-2 mt-3"><button class="btn btn-lg btn52 btn-success mt-3" id="submitMatch">ADD</button></div>
                                <div class="col-2 ml-4 mb-5 modal-footer">
                                    <button class="btn btn-lg btn51 btn-danger bg-danger ml-3" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>
                            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
</div>
<div class="modal fade" id="addPlayer">
    <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <label for="">
                    <h2>Players</h2>
                </label>
                <h5 class="addtournament text-white">Add Player</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formPlayer">
                    @csrf
                    <div class="col">
                        <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">

                            <div class="col-3">
                                <label for="">Groups</label><br>
                                <select name="group_id" id="group_id" class="p-2 border border-none bg-white">
                                    <option value="">Select Group</option>
                                    @forelse($round->group as $group)
                                    <option value="{{$group->id}}"> {{$group->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="">Teams</label>
                                <select class="form-control" id="team_id" name="team_id">
                                    <option value="">Select Team</option>
                                </select>
                            </div>
                            <div class="col-4 mb-2">
                                <label for="">Player Name</label><br>
                                <input type="text" name="name" placeholder="playerName" class="add-player-input">
                            </div>
                            <div class="d-flex justify-content-around col-4 mb-2 mt-5 player-btn-div">
                                <div class="col-3 mb-4 mt-3"><button class="btn btn-lg btn52 btn-success" id="submitPlayer">ADD</button></div>
                                <div class="col-2 ml-2 mb-4 modal-footer">
                                    <button class="btn btn-lg btn51 btn-danger bg-danger ml-3" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>
                            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}

                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="editRound">
    <div class="modal-dialog modal-xl" style="width: 800px; margin: auto;">
        <div class="modal-content" id="editContentRound">
        </div>
    </div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />

@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#group_id').on('click', function(event) {
            var groupId = event.target.value;
            $.ajax({
                url: "{{ route('teamId') }}",
                type: "POST",
                data: {
                    group_id: groupId
                },
                success: function(data) {
                    $('#team_id').empty();
                    $('#team_id').append('<option value="">Select Team </option>');
                    $.map(data.teams, function(team, index) {
                        $('#team_id').append('<option value="' +
                            team.id +
                            '">' +
                            team.name + '</option>');
                    })
                }
            })
        });
        $("#submitPlayer").on('click', function(event) {
            console.log('submitPlayer')
            event.preventDefault();
            $.ajax({
                url: "{{ Route('player.store') }}",
                type: 'POST',
                data: $("#formPlayer").serialize(),
                success: function(result) {
                    var result = JSON.parse(result);
                    if (result.statusCode == 200) {
                        location.reload();
                    } else {
                        alert(result.errors);
                    }
                }
            })
        })
        $("#submitGroup").on('click', function(event) {
            console.log('submitGroup')
            event.preventDefault();
            $.ajax({
                url: "{{ Route('group.store') }}",
                type: 'POST',
                data: $("#formGroup").serialize(),
                success: function(result) {
                    var result = JSON.parse(result);
                    if (result.statusCode == 200) {
                        location.reload();
                    } else {
                        alert(result.errors);
                    }
                }
            })
        })
        $("#submitMatch").on('click', function(event) {
            console.log('submitMatch')
            event.preventDefault();
            $.ajax({
                url: "{{ Route('match.store') }}",
                type: 'POST',
                data: $("#formMatch").serialize(),
                success: function(result) {
                    var result = JSON.parse(result);
                    if (result.statusCode == 200) {
                        location.reload();
                    } else {
                        alert(result.errors);
                    }
                }
            })
        })
        $("#submitTeam").on('click', function(event) {
            console.log('submitTeam')
            event.preventDefault();
            $.ajax({
                url: "{{ Route('team.store') }}",
                type: 'POST',
                data: $("#formTeam").serialize(),
                success: function(result) {
                    var result = JSON.parse(result);
                    if (result.statusCode == 200) {
                        location.reload();
                    } else {
                        alert(result.errors);
                    }
                }
            })
        })
    });

    function EditViewRound(id) {
        console.log('modal');
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('/round/edit') }}/" + id,
            success: function(data) {
                console.log(data);
                // $('#editContent').addClass('show');
                $('#editContentRound').html(data.modal_view);

            },
            error: function(data) {
                console.log(data);
            }

        })

    }
</script>