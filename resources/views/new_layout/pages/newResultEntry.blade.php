<x-new-master-layout :round="$round_data">
    <x-new-yellow-bar :round="$round_data"> </x-new-yellow-bar>
    @push('styles')
    <style>
        .container-team {
            height: auto;
            width: 100%;

        }
    </style>

    @endpush
    <?php
    if ($round_data->EnterPerRow == 2) {
        $col = "col-md-6";
    } elseif ($round_data->EnterPerRow == 3) {
        $col = "col-md-4";
    } elseif ($round_data->EnterPerRow == 4) {
        $col = "col-md-3";
    } elseif ($round_data->EnterPerRow == 6) {
        $col = "col-md-2";
    }
    ?>
    <section>

        <div class="container">
            Name: {{ $match->name }}---Map:{{$match->map}}---{{$match->number}}---
            <a href="{{ url('game_status/' . $match_id) }}" class="btn btn-primary">Update Roster</a>---<a href="{{ url('newResult/' . $round_data->id) }}" class="btn btn-secondary">Live Result </a>
        </div>

        <div class="container pt-2">
            <form class="form-inline" method="get" action="{{url('result_entry/'.$match->id)}}">
                <div class="form-group mb-2">
                    <select id="sortBy" class="form-control" name="sortBy">
                        <option value="">sortby</option>
                        <option value="slot">Slot</option>
                        <option value="position">Place</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Sort</button>
            </form>
        </div>
        <div class="d-flex justify-content-center">
            <div class="container-team mt-5">
                <div class="d-flex justify-content-evenly flex-wrap">
                    <!-- card -->
                    @if($team_sort)
                    @foreach ($team_sort as $item)
                    <?php $player_stats = $item
                        ->PlayerStatement()
                        ->where('active', 1)
                        ->where('match_id', $item->match_id)
                        ->get();

                    ?>
                    <div class="{{$col}} block-{{$item->id}} card mb-3 bg-green-extra-light" @if ($item->dead) style= "opacity:0.4 "@endif>
                        <!-- top -->
                        <div class="d-flex justify-content-start mt-2">
                            <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2">{{$item->team->slot}}</button>
                            <h6 class="mt-1 text-dark">
                                {{ App\Models\Team::where('id', $item->team_id)->get()[0]['name'] }}
                            </h6>
                            <button class=" btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2 addPlayerButton" data-match_id="{{ $match_id }}" data-team_id="{{ App\Models\Team::where('id', $item->team_id)->get()[0]['id'] }}" data-target="#editModal" data-toggle="modal">+</button>

                        </div>
                        <!-- body -->
                        <div class="d-flex justify-content-evenly text-dark">
                            <div class="col-4">
                                <h6 class="mr-3">Places </h6>
                                {{-- <h6 class="place-border col-9 position{{ $item->id }}">{{ $item->position }}</h6> --}}
                                <input type="text" name="position" class="positionChange position{{ $item->id }}" style="width: 100%" value="{{ $item->position }}" size="2" data-team_stat_id="{{ $item->id }}">
                            </div>
                            <div class="col-5 d-flex flex-column">
                                <h6 class="">Kill </h6><br>
                                <div class="d-flex mb-3">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnTeamMinus" data-team_stat_id="{{$item->id}}">-</button>
                                    <h6 class="ml-2 pt-1 kill{{ $item->id }}"><a href="" class="stat{{ $item->id }}">{{ $item->kill }}</a>
                                    </h6>
                                    <input type="hidden" name="kill" class="kill{{ $item->id }}">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKill btnTeamAdd" data-team_stat_id="{{$item->id}}">+</button>
                                </div>

                            </div>
                            <div class="col-3">
                                <h6>Dead</h6><br>
                                <input type="checkbox" style="width: 25px;height: 25px;" name="dead" class="deadTeam dead{{ $item->id }}" data-team_stat_id="{{ $item->id }}" @if ($item->dead) checked @endif>
                            </div>
                        </div>
                        <hr>
                        <!-- footer -->
                        @foreach ($player_stats as $stat)
                        <div class=" d-flex justify-content-around text-dark block{{ $stat->id }}Player block{{ $item->id }}Team" >
                            <div class="col-5">
                                <h6 class="text-start">
                                    {{ App\Models\Player::where('id', $stat->player_id)->get()[0]['name'] }}
                                </h6>

                            </div>
                            <div class="col-5">
                                <div class="d-flex justify-content-around mb-3">
                                    <button {{-- @if ($stat->dead) disabled @endif --}} class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKillMinus{{ $item->id }}Team btnKillMinus{{ $stat->id }}Player btnKillMinus" data-player_stat_id="{{ $stat->id }}" data-team_stat_id="{{ $item->id }}">-</button>

                                    <h6 class="ml-2 pt-1" id="clicks"><a href="#">{{ $stat->kill }}</a>
                                    </h6>

                                    <button {{-- @if ($stat->dead) disabled @endif --}} class="btn btn-sm btn-dark bg-dark ml-2 counter-btn add btnKillAdd{{ $item->id }}Team btnKillAdd{{ $stat->id }}Player btnKillAdd" data-player_stat_id="{{ $stat->id }}" data-team_stat_id="{{ $item->id }}">+</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="float-none">
                                    <input type="checkbox" style="width: 25px;height: 25px;" name="dead" id="" class="w-100 deadPlayer deadPlayer{{ $item->id }}" data-team_stat_id="{{ $item->id }}" data-player_stat_id="{{ $stat->id }}" @if ($stat->dead) checked @endif>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    @endif
                    @foreach ($team_with_player as $item)
                    <?php $player_stats = $item
                        ->PlayerStatement()
                        ->where('active', 1)
                        ->where('match_id', $item->match_id)
                        ->get();

                    ?>
                    <div class="{{$col}} block-{{$item->id}} card mb-3 bg-green-extra-light" @if ($item->dead) style= "opacity:0.4 "@endif>
                        <!-- top -->
                        <div class="d-flex justify-content-start mt-2">
                            <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2">{{$item->team->slot}}</button>
                            <h6 class="mt-1 text-dark">
                                {{ App\Models\Team::where('id', $item->team_id)->get()[0]['name'] }}
                            </h6>
                            <button class=" btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2 addPlayerButton" data-match_id="{{ $match_id }}" data-team_id="{{ App\Models\Team::where('id', $item->team_id)->get()[0]['id'] }}" data-target="#editModal" data-toggle="modal">+</button>

                        </div>
                        <!-- body -->
                        <div class="d-flex justify-content-evenly text-dark">
                            <div class="col-5">
                                <h6 class="mr-4">Place </h6>
                                {{-- <h6 class="place-border col-9 position{{ $item->id }}">{{ $item->position }}</h6> --}}
                                <input type="text" name="position" class="positionChange position{{ $item->id }}" style="width: 100%" value="{{ $item->position }}" size="2" data-team_stat_id="{{ $item->id }}">
                            </div>
                            <div class="col-5 d-flex flex-column">
                                <h6 class="">Kill </h6><br>
                                <div class="d-flex mb-3">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnTeamMinus" data-team_stat_id="{{$item->id}}">-</button>
                                    <h6 class="ml-2 pt-1 kill{{ $item->id }}"><a href="" class="stat{{ $item->id }}">{{ $item->kill }}</a>
                                    </h6>
                                    <input type="hidden" name="kill" class="kill{{ $item->id }}">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKill btnTeamAdd" data-team_stat_id="{{$item->id}}">+</button>
                                </div>

                            </div>
                            <div class="col-3">
                                <h6>Dead</h6>
                                <input type="checkbox" style="width: 25px;height: 25px;" name="dead" class="w-50 deadTeam dead{{ $item->id }}" data-team_stat_id="{{ $item->id }}" @if ($item->dead) checked @endif>
                            </div>
                        </div>
                        <hr>
                        <!-- footer -->
                        @foreach ($player_stats as $stat)
                        <div class=" d-flex justify-content-around text-dark block{{ $stat->id }}Player block{{ $item->id }}Team">
                            <div class="col-4">
                                <h6 class="text-start">
                                    {{ App\Models\Player::where('id', $stat->player_id)->get()[0]['name'] }}
                                </h6>

                            </div>
                            <div class="col-5">
                                <div class="d-flex justify-content-around mb-3">
                                    <button {{-- @if ($stat->dead) disabled @endif --}} class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKillMinus{{ $item->id }}Team btnKillMinus{{ $stat->id }}Player btnKillMinus" data-player_stat_id="{{ $stat->id }}" data-team_stat_id="{{ $item->id }}">-</button>

                                    <h6 class="ml-2 pt-1" id="clicks"><a href="#">{{ $stat->kill }}</a>
                                    </h6>

                                    <button {{-- @if ($stat->dead) disabled @endif --}} class="btn btn-sm btn-dark bg-dark ml-2 counter-btn add btnKillAdd{{ $item->id }}Team btnKillAdd{{ $stat->id }}Player btnKillAdd" data-player_stat_id="{{ $stat->id }}" data-team_stat_id="{{ $item->id }}">+</button>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="float-none">
                                    <input type="checkbox" style="width: 25px;height: 25px;" name="dead" id="" class="w-100 deadPlayer deadPlayer{{ $item->id }}" data-team_stat_id="{{ $item->id }}" data-player_stat_id="{{ $stat->id }}" @if ($stat->dead) checked @endif>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    @foreach ($team_without_player as $item)
                    <?php $player_stats = $item
                        ->PlayerStatement()
                        ->where('active', 1)
                        ->where('match_id', $item->match_id)
                        ->get();

                    ?>
                    <div class="{{$col}} block-{{$item->id}} card mb-3 bg-green-extra-light" @if ($item->dead) style= "opacity:0.4 "@endif>
                        <!-- top -->
                        <div class="d-flex justify-content-start mt-2">
                            <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2">{{$item->team->slot}}</button>
                            <h6 class="mt-1 text-dark">
                                {{ App\Models\Team::where('id', $item->team_id)->get()[0]['name'] }}
                            </h6>
                            <button class=" btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2 addPlayerButton" data-match_id="{{ $match_id }}" data-team_id="{{ App\Models\Team::where('id', $item->team_id)->get()[0]['id'] }}" data-target="#editModal" data-toggle="modal">+</button>

                        </div>
                        <!-- body -->
                        <div class="d-flex justify-content-evenly text-dark">
                            <div class="col-4">
                                <h6 class="mr-3">Place </h6>
                                {{-- <h6 class="place-border col-9 position{{ $item->id }}">{{ $item->position }}</h6> --}}
                                <input type="text" name="position" class="positionChange position{{ $item->id }}" style="width: 100%" value="{{ $item->position }}" size="2" data-team_stat_id="{{ $item->id }}">
                            </div>
                            <div class="col-5 d-flex flex-column">
                                <h6 class="">Kill </h6><br>
                                <div class="d-flex mb-3">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                                    <h6 class="ml-2 pt-1 kill{{ $item->id }}"><a href="" class="stat{{ $item->id }}">{{ $item->kill }}</a>
                                    </h6>
                                    <input type="hidden" name="kill" class="kill{{ $item->id }}">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKill">+</button>
                                </div>

                            </div>
                            <div class="col-3">
                                <h6>Dead</h6>
                                <input type="checkbox" style="width: 25px;height: 25px;" name="dead" class="deadTeam dead{{ $item->id }}" data-team_stat_id="{{ $item->id }}" @if ($item->dead) checked @endif>
                            </div>
                        </div>
                        <hr>
                        <!-- footer -->
                        @foreach ($player_stats as $stat)
                        <div class=" d-flex justify-content-around text-dark block{{ $stat->id }}Player block{{ $item->id }}Team">
                            <div class="col-5">
                                <h6 class="text-start">
                                    {{ App\Models\Player::where('id', $stat->player_id)->get()[0]['name'] }}
                                </h6>

                            </div>
                            <div class="col-5">
                                <div class="d-flex justify-content-around mb-3">
                                    <button {{-- @if ($stat->dead) disabled @endif --}} class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKillMinus{{ $item->id }}Team btnKillMinus{{ $stat->id }}Player btnKillMinus" data-player_stat_id="{{ $stat->id }}" data-team_stat_id="{{ $item->id }}">-</button>

                                    <h6 class="ml-2 pt-1" id="clicks"><a href="#">{{ $stat->kill }}</a>
                                    </h6>

                                    <button {{-- @if ($stat->dead) disabled @endif --}} class="btn btn-sm btn-dark bg-dark ml-2 counter-btn add btnKillAdd{{ $item->id }}Team btnKillAdd{{ $stat->id }}Player btnKillAdd" data-player_stat_id="{{ $stat->id }}" data-team_stat_id="{{ $item->id }}">+</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="float-none">
                                    <input type="checkbox" style="width: 25px;height: 25px;" name="dead" id="" class="w-100 deadPlayer deadPlayer{{ $item->id }}" data-team_stat_id="{{ $item->id }}" data-player_stat_id="{{ $stat->id }}" @if ($stat->dead) checked @endif>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            //live pusher function
            function StatPusher(id, type) {
                event.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{ url('live-stat-result') }}",
                    data: {
                        'id': id,
                        '_token': "{{ csrf_token() }}",
                        'type': type,
                        'display': 'off',
                    },
                    success: function(data) {
                        // console.log('Pusher Working Stat Live');
                    },
                    error: function(data) {
                        // console.log(data);
                    }

                })
            }

            function pushData(type) {
                StatPusher("{{ $round_data->id }}", type, false);
            }

            //Position change
            $('.positionChange').change(function() {
                var team_stat_id = $(this).data('team_stat_id');
                var data1 = {
                    'team_stat_id': team_stat_id,
                    'position': $(this).val(),
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/game-stat-position') }}",
                    type: 'POST',
                    data: data1,
                    success: function(result) {
                        var result = JSON.parse(result);
                        if (result.statusCode == 200) {
                            pushData('aliveKills');
                            pushData('liveRanking');
                        } else {
                            alert(result.errors);
                        }
                    }
                });
            });

            $('#sortBy').change(function(e) {
                e.preventDefault();
                var sortBy = $(this).val();
                // console.log(sortBy);
            })

            //Dead Team
            $('.deadTeam').change(function() {
                var team_id = parseInt($(this).data('team_stat_id'));
                var dead = (this.checked) ? 1 : 0;
                var data1 = {
                    'dead': dead,
                    'team_stat_id': parseInt($(this).data('team_stat_id'))
                };
                var position = parseInt($('.position' + team_id).val());
                var total_kills = parseInt($('.stat' + team_id).html());
                if (dead != 0) {
                    alerts('ELIMINATED', team_id, 'null', total_kills, position, 'team');
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/game-stat-dead-team') }}",
                    type: 'POST',
                    data: data1,
                    success: function(result) {
                        var result = JSON.parse(result);
                        if (result.statusCode == 200) {
                            if (dead) {
                                // $(".block" + team_id + "Team").css({
                                //     "opacity": 0.3
                                // });
                                // // $(".dead" + team_id).prop("disabled", true);
                                // $(".btnKillAdd" + team_id + "Team").prop("disabled", true);
                                // $(".btnKillMinus" + team_id + "Team").prop("disabled", true);
                                $('.deadPlayer' + team_id).attr('checked', true);
                                $('.block-'+team_id).css({"background":"#2f3b18 !important"});
                                $('.block-'+team_id).css({"opacity":"0.4"});
                            } else {
                                // $(".block" + team_id + "Team").css({
                                //     "opacity": 1
                                // });
                                // // $(".dead" + team_id).prop("disabled", false);
                                // $(".btnKillAdd" + team_id + "Team").prop("disabled", false);
                                // $(".btnKillMinus" + team_id + "Team").prop("disabled", false);
                                $('.deadPlayer' + team_id).attr('checked', false);
                                $('.block-'+team_id).css({'background':'#8cb736bb'});
                                $('.block-'+team_id).css({'opacity':'1'});
                            }
                            pushData('aliveKills');
                            pushData('liveRanking');
                            pushData('matchKills');
                            pushData('wwcdForecast');
                        }
                        // console.log('error');
                    }
                });
            });
            //Dead Player
            $('.deadPlayer').change(function() {
                // var this = $(this);
                var team_stat_id = parseInt($(this).data('team_stat_id'));
                var player_stat_id = parseInt($(this).data('player_stat_id'));
                var dead = (this.checked) ? 1 : 0;
                var data1 = {
                    'dead': dead,
                    'team_stat_id': team_stat_id,
                    'player_stat_id': player_stat_id
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/game-stat-dead-player') }}",
                    type: 'POST',
                    data: data1,
                    success: function(result) {
                        var result = JSON.parse(result);
                        if (result.statusCode == 200) {
                            if (dead) {
                                $('.block' + player_stat_id + "Player")
                                    .css({
                                        "opacity": 0.3
                                    });
                                // $(".dead" + team_id).prop("disabled", true);
                                // $('.btnKillAdd' + player_stat_id + "Player").prop(
                                //     "disabled", true);
                                // $('.btnKillMinus' +
                                //     player_stat_id + "Player").prop(
                                //     "disabled", true);
                                // $(".btnKillMinus" + team_id).prop("disabled", true);
                            } else {
                                $('.block' + player_stat_id + "Player").css({
                                    "opacity": 1
                                });
                                // $(".dead" + team_id).prop("disabled", false);
                                // $('.btnKillAdd' +
                                //     player_stat_id + "Player").prop(
                                //     "disabled", false);
                                // $('.btnKillMinus' +
                                //     player_stat_id + "Player").prop(
                                //     "disabled", false);
                                // $(".btnKillAdd" + team_id).prop("disabled", false);
                                // $(".btnKillMinus" + team_id).prop("disabled", false);
                            }
                            pushData('aliveKills');
                            pushData('liveRanking');
                            pushData('matchKills');
                            pushData('wwcdForecast');
                            pushData('teamStatAlive');
                        }
                        // console.log('error');
                    }
                });
            });

            //Team kill increase
            $(".btnTeamAdd").click(function() {
                var team_id = parseInt($(this).data('team_stat_id'));
                // var player_stat_id = parseInt($(this).data('player_stat_id'));
                var team_kill = parseInt($(this).siblings().children('a').html());

                if (team_kill >= 0) {
                    team_kill++;
                    $(this).siblings().children('a').html(team_kill);
                } else {
                    team_kill = 0;
                    $(this).siblings().children('a').html(team_kill);
                }
                updateTotalKillsTeam(team_kill, team_id);
                // updateData(team_id, total_kills, player_stat_id, currentVal);
            });

            //Team Kill decrease
            $(".btnTeamMinus").click(function() {
                var team_id = parseInt($(this).data('team_stat_id'));
                // var player_stat_id = parseInt($(this).data('player_stat_id'));
                var team_kill = parseInt($(this).siblings().children('a').html());

                if (team_kill > 0) {
                    team_kill--;
                    $(this).siblings().children('a').html(team_kill);
                } else {
                    team_kill = 0;
                    $(this).siblings().children('a').html(team_kill);
                }
                updateTotalKillsTeam(team_kill, team_id);
                // updateData(team_id, total_kills, player_stat_id, currentVal);
            });

            //Update total Kills
            function updateTotalKillsTeam(kills, team_stat_id) {
                var data1 = {
                    kills: kills,
                    team_stat_id: team_stat_id
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/update-total-Kills-team') }}",
                    type: 'POST',
                    data: data1,
                    success: function(result) {
                        pushData('liveRanking');
                        pushData('teamStatAlive');
                        pushData('matchKills');
                    }
                });
            }

            $(".btnKillAdd").click(function() {
                var team_id = parseInt($(this).data('team_stat_id'));
                var player_stat_id = parseInt($(this).data('player_stat_id'));
                var currentVal = parseInt($(this).prev().children('a').html());
                var position = parseInt($('.position' + team_id).val());
                if (currentVal >= 0) {
                    currentVal++;
                    $(this).prev().children('a').html(currentVal);

                    //all add kills
                    var total_kills = parseInt($('.stat' + team_id).html());
                    $('.stat' + team_id).html(++total_kills);
                } else {
                    currentVal = 0;
                    $(this).prev().children('a').html(currentVal);
                }
                updateData(team_id, total_kills, player_stat_id, currentVal);
                switch (currentVal) {
                    case 3:
                        alerts('DOMINATION', team_id, player_stat_id, currentVal, 'NULL');
                        break;
                    case 5:
                        alerts('RAMPAGE', team_id, player_stat_id, currentVal, 'NULL');
                        break;
                    case 7:
                        alerts('UNSTOPPABLE', team_id, player_stat_id, currentVal, 'NULL');
                        break;
                    case 10:
                        alerts('LEGENDARY', team_id, player_stat_id, currentVal, 'NULL');
                        break;
                    default:
                        break;
                }
            });

            $(".btnKillMinus").click(function() {
                var team_id = parseInt($(this).data('team_stat_id'));
                var player_stat_id = parseInt($(this).data('player_stat_id'));
                var currentVal = parseInt($(this).next().children('a').html());
                var position = parseInt($('.position' + team_id).val());

                if (currentVal > 0) {
                    currentVal--;
                    $(this).next().children('a').html(currentVal);

                    //all add kills
                    var total_kills = parseInt($('.stat' + team_id).html());
                    $('.stat' + team_id).html(--total_kills);
                } else {
                    currentVal = 0;
                    $(this).next().children('a').html(currentVal);
                }

                updateData(team_id, total_kills, player_stat_id, currentVal);
            });

            function decrease() {
                clicks -= 1;
                document.getElementById('decrease').innerHTML = clicks;
            }

            function updateData(team_id, total_kills, player_stat_id, currentVal) {
                var data1 = {
                    'team_id': team_id,
                    'total_kills': total_kills,
                    'player_stat_id': player_stat_id,
                    'player_kill': currentVal,
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/game-stat') }}",
                    type: 'POST',
                    data: data1,
                    success: function(result) {
                        var result = JSON.parse(result);
                        if (result.statusCode == 200) {
                            pushData('aliveKills');
                            pushData('liveRanking');
                            pushData('matchKills');
                            pushData('wwcdForecast');
                            pushData('teamStatAlive');
                        } else {
                            alert(result.errors);
                        }
                    }
                });

            }

            function takeData(team_stat_id, player_stat_id, ) {
                var data = value.data('team_id');
            }

            $(".addPlayerButton").on('click', function() {
                $.ajax({
                    type: "get",
                    url: "{{ url('result/player/add') }}/",
                    data: {
                        'id': $(this).data('team_id'),
                        'match_id': $(this).data('match_id')
                    },
                    success: function(data) {
                        $('#editModal').addClass('show');
                        $('#editContentRoundSquad').html(data.modal_view);

                    },
                    error: function(data) {
                        // console.log(data);
                    }

                })
            });

            function alerts(message, team_id, player_id, kills, position, type = 'player') {
                var data = {
                    'message': message,
                    'team_id': team_id,
                    'player_id': player_id,
                    'kills': kills,
                    'position': position,
                    'type': type
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('/alerts') }}/" + "{{ $round_data->id }}",
                    type: 'POST',
                    data: data,
                    success: function(result) {
                        // console.log('alerts')
                    }
                });
            }
        });
    </script>
    @endpush
</x-new-master-layout>
