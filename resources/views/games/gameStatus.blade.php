@extends('layout.result.app')
@section('title', 'Update Team')
@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('pubg/css/styles.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('pubg/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/squad.css">
    <style>
        .cont {
            margin-top: 20px;
            border: 1px solid rgba(128, 128, 128, 0.329);
            border-radius: 10px;
        }

        .labelrow {
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .button1 {
            background-color: blue;
            color: white;
            float: right;
        }

        .cardrow {
            justify-content: space-between;
        }

        .card {
            height: 300px;
            margin-bottom: 20px;
        }

        .form1 {
            padding-top: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        .teamname {
            padding-top: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .icon {
            color: blue;
            padding-left: 3px;
        }

        .trash {
            color: red;
            padding-left: 3px;
        }

        .form2 {
            border-top: 1px solid grey;
        }

        .name {
            border-top: 1px solid rgba(128, 128, 128, 0.329);
            margin-right: 20px;
            padding-left: 5px;
        }

        .box1 {
            background-color: green;
            margin-right: 4px;
            font-size: 8px;
        }

        .checked {
            color: white;
        }

        .edit {
            font-size: 13px;
            color: blue;
            padding-left: 5px;
        }
    </style>
@endpush

@section('topBase')
    {{-- @include('layout.menu') --}}
@stop
@section('content')
    <div class="container cont p-3">
        <div class="row cardrow">
            @foreach ($teams as $key => $team)
                <div class="col-md-3 col-lg-3">
                    <div class="card">
                        <p class="team">

                        </p>
                        <p class="teamname">
                            {{ ++$key }} {{ App\Models\Team::where('id', $team['team_id'])->get()[0]['name'] }}
                            <a href="#" class="addPlayerButton" data-team_id="{{ $team['id'] }}"
                                data-target="#editModal" data-toggle="modal">
                                <i class="bi bi-file-plus-fill icon"></i>
                            </a>
                        </p>
                        <?php
                        $playerPlays = App\Models\PlayerStat::where([['team_stat_id', '=', $team['id']], ['match_id', '=', $match_id]])->get();
                        ?>
                        <form class="form2">
                            @forelse ($playerPlays as $player)
                                <?php
                                $playerDetail = App\Models\Player::where('id', $player['player_id'])->get();
                                ?>
                                <div class="name">
                                    <input type="checkbox" name="playerName" class="playerAddInGame"
                                        data-player_stat_id="{{ $player['id'] }}" {{ $player->active }}
                                        {{ $player->active ? 'checked' : '' }}>
                                    {{ $playerDetail[0]['name'] }}<br>
                                </div>
                            @empty
                                <div class="name">
                                    <span> no player</span>
                                </div>
                            @endforelse
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-xl" style="width: 800px; margin: auto;">
            <div class="modal-content" id="editContentRound">
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

            $(".playerAddInGame").on('click', function(event) {
                var value = $(this).prop("checked") ? 1 : 0;
                $.ajax({
                    type: "post",
                    url: "{{ url('/player/addInStat') }}/",
                    data: {
                        'id': $(this).data('player_stat_id'),
                        'active': value,
                    },
                    success: function(data) {
                        if (data.statusCode = 200) {
                            // location.reload();
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }

                })

            });
        });
    </script>
@endpush
