@extends('layout.main')
@section('title', 'Tournaments')
@push('styles')
    <link rel="stylesheet" href="{{ asset('pubg/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('pubg/css/main.css') }}">
@endpush
@section('topBase')
    @include('layout.menu')
@stop
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <section>
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap">
                <!-- card -->
                @foreach ($data as $item)
                    <?php $player_stats = $item
                        ->PlayerStatement()
                        ->where('active', 1)
                        ->where('match_id', $item->match_id)
                        ->get();
                    
                    ?>
                    <div class="col-lg-4 card mb-3">
                        <!-- top -->
                        <div class="d-flex justify-content-start mt-2">
                            <h6 class="mt-1 text-dark">
                                {{ App\Models\Team::where('id', $item->team_id)->get()[0]['name'] }}
                            </h6>
                            <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2" data-toggle="modal"
                                data-target="#exampleModal" type="button">+</button>
                        </div>
                        <!-- body -->
                        <div class="d-flex justify-content-evenly text-dark">
                            <div class="col-4">
                                <h6 class="mr-3">Place </h6>
                                {{-- <h6 class="place-border col-9 position{{ $item->id }}">{{ $item->position }}</h6> --}}
                                <input type="text" name="position" class="positionChange position{{ $item->id }}"
                                    style="width: 100%" value="{{ $item->position }}" size="2"
                                    data-team_stat_id="{{ $item->id }}">
                            </div>
                            <div class="col-4 d-flex flex-column">
                                <h6 class="">Kill </h6><br>
                                <div class="d-flex mb-3">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                                    <h6 class="ml-2 pt-1 kill{{ $item->id }}"><a href=""
                                            class="stat{{ $item->id }}">{{ $item->kill }}</a>
                                    </h6>
                                    <input type="hidden" name="kill" class="kill{{ $item->id }}">
                                    <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKill">+</button>
                                </div>

                            </div>
                            <div class="col-4">
                                <h6>Dead</h6>
                                <input type="checkbox" name="dead" class="w-25 deadTeam dead{{ $item->id }}"
                                    data-team_stat_id="{{ $item->id }}"
                                    @if ($item->dead) checked @endif>
                            </div>
                        </div>
                        <hr>
                        <!-- footer -->
                        @foreach ($player_stats as $stat)
                            <div class=" d-flex justify-content-around text-dark block{{ $stat->id }}Player block{{ $item->id }}Team"
                                @if ($item->dead || $stat->dead) style= 'opacity:0.3' @endif>
                                <div class="col-4">
                                    <h6 class="text-start">
                                        {{ App\Models\Player::where('id', $stat->player_id)->get()[0]['name'] }}
                                    </h6>

                                </div>
                                <div class="col-4">
                                    <div class="d-flex justify-content-around mb-3">
                                        <button @if ($stat->dead) disabled @endif
                                            class="btn btn-sm btn-dark bg-dark ml-2 counter-btn btnKillMinus{{ $item->id }}Team btnKillMinus{{ $stat->id }}Player btnKillMinus"
                                            data-player_stat_id="{{ $stat->id }}"
                                            data-team_stat_id="{{ $item->id }}">-</button>

                                        <h6 class="ml-2 pt-1" id="clicks"><a href="#">{{ $stat->kill }}</a></h6>

                                        <button @if ($stat->dead) disabled @endif
                                            class="btn btn-sm btn-dark bg-dark ml-2 counter-btn add btnKillAdd{{ $item->id }}Team btnKillAdd{{ $stat->id }}Player btnKillAdd"
                                            data-player_stat_id="{{ $stat->id }}"
                                            data-team_stat_id="{{ $item->id }}">+</button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="float-none">
                                        <input type="checkbox" name="dead" id=""
                                            class="w-100 deadPlayer deadPlayer{{ $item->id }}"
                                            data-team_stat_id="{{ $item->id }}"
                                            data-player_stat_id="{{ $stat->id }}"
                                            @if ($stat->dead) checked @endif>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="container">
                        <form>
                            <h5 class="modal-title text-start" id="exampleModalLabel">Add Players</h5>
                            <div class="d-flex">
                                <div class="form-group col-lg-6">
                                    <label for="">Game ID</label>
                                    <input type="email" class="form-control" id="exampleInputId"
                                        aria-describedby="emailHelp" placeholder="Pubg ID">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Team</label>
                                    <input type="text" class="form-control" id="exampleInputTeam" placeholder="Team">
                                </div>
                            </div>
                            <textarea name="" class="border border-muted" id="" cols="40" rows="10"></textarea>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn add-btn">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

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
                            console.log('success');
                        } else {
                            alert(result.errors);
                        }
                    }
                });
            });

            //Dead Team
            $('.deadTeam').change(function() {
                var team_id = parseInt($(this).data('team_stat_id'));
                var dead = (this.checked) ? 1 : 0;
                var data1 = {
                    'dead': dead,
                    'team_stat_id': parseInt($(this).data('team_stat_id'))
                };
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
                            console.log('success');
                            if (dead) {
                                $(".block" + team_id + "Team").css({
                                    "opacity": 0.3
                                });
                                // $(".dead" + team_id).prop("disabled", true);
                                $(".btnKillAdd" + team_id + "Team").prop("disabled", true);
                                $(".btnKillMinus" + team_id + "Team").prop("disabled", true);
                                $('.deadPlayer' + team_id).attr('checked', true);
                            } else {
                                $(".block" + team_id + "Team").css({
                                    "opacity": 1
                                });
                                // $(".dead" + team_id).prop("disabled", false);
                                $(".btnKillAdd" + team_id + "Team").prop("disabled", false);
                                $(".btnKillMinus" + team_id + "Team").prop("disabled", false);
                                $('.deadPlayer' + team_id).attr('checked', false);
                            }
                        } else
                            console.log('error');
                    }
                });
            });
            //Dead Player
            $('.deadPlayer').change(function() {
                // var this = $(this);
                var team_stat_id = parseInt($(this).data('team_stat_id'));
                var player_stat_id = parseInt($(this).data('player_stat_id'));
                var dead = (this.checked) ? 1 : 0;
                // console.log($('deadPlayer:checkbox:checked'));
                // return;
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
                            console.log('success');
                            if (dead) {
                                $('.block' + player_stat_id + "Player")
                                    .css({
                                        "opacity": 0.3
                                    });
                                // $(".dead" + team_id).prop("disabled", true);
                                $('.btnKillAdd' + player_stat_id + "Player").prop(
                                    "disabled", true);
                                $('.btnKillMinus' +
                                    player_stat_id + "Player").prop(
                                    "disabled", true);
                                // $(".btnKillMinus" + team_id).prop("disabled", true);
                            } else {
                                $('.block' + player_stat_id + "Player").css({
                                    "opacity": 1
                                });
                                // $(".dead" + team_id).prop("disabled", false);
                                $('.btnKillAdd' +
                                    player_stat_id + "Player").prop(
                                    "disabled", false);
                                $('.btnKillMinus' +
                                    player_stat_id + "Player").prop(
                                    "disabled", false);
                                // $(".btnKillAdd" + team_id).prop("disabled", false);
                                // $(".btnKillMinus" + team_id).prop("disabled", false);
                            }
                        } else
                            console.log('error');
                    }
                });
            });

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
                            console.log('success');
                        } else {
                            alert(result.errors);
                        }
                    }
                });

            }

            function takeData(team_stat_id, player_stat_id, ) {
                var data = value.data('team_id');
                console.log(data + d);
            }
        });
    </script>
@endpush
