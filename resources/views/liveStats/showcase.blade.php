<x-new-master-layout :round="$round" :tournament="$tournament">
    @auth
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @endauth
    <style>
        .sub_div {
            position: absolute;
            top: 887px;
            padding: 0;
            margin: 0;
            left: 15px;
        }

        .text {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .padding-0 {
            padding-left: 0;
        }

        .bg-darkBlue {
            background-color: darkblue;
        }

        .bg-darkSoftBlue {
            background-color: rgb(5, 5, 248);
        }

        .imgPosition-logo {
            position: absolute;
            top: -20px;
            z-index: 1;
            height: 110px;
        }

        .imgPosition-sponser {
            position: relative;
            top: -25px;
            z-index: 1;
            height: 110px;
            left: 12px;
        }


        /* for player showcase */
        .player-img {
            position: relative;
            max-height: 70%;
            float: right;
            top: 30rem;
            left: 17rem;
            z-index: 2;
        }

        .logo-img {
            position: relative;
            height: 150px;
        }

        .text-center {
            text-align: center !important;
        }

        .overall-rank-text {
            font-size: 12px;
            font-weight: 800;
        }

        .overall-rank-number {
            font-size: 30px;
            font-weight: 800;
        }

        .kills-info {
            margin-right: 40px;
        }


        /* showcase team */
        .top-row {
            height: 853px;
        }

        .logo-img-team {
            height: 50px;
        }

        .player-img-team-1 {
            position: absolute;
            height: 150px;
            bottom: 0vh;
        }

        .player-img-team-2 {
            position: absolute;
            height: 150px;
            bottom: 0vh;
            z-index: 1;
            left: 75px;
        }

        .player-img-team-3 {
            position: absolute;
            height: 150px;
            bottom: 0vh;
            z-index: 0;
            left: 140px;
        }

        .player-img-team-4 {
            position: absolute;
            height: 150px;
            bottom: 0vh;
            left: 205px;

        }

        .team-members h6 {
            font-weight: 400;
        }

        .team-showcase {
            position: absolute;
        }
    </style>
    <!-- dropdown menu -->
    @auth
    <div class="container section-wrapper">
        <div class="row">
            <div class="col-3">
                <select class="p-2  border-none rounded" id="team">
                    <option value="">Team</option>
                    @forelse($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="col-3">
                <select class="p-2  border-none rounded" id="team_player">
                    <option value="">Team Player</option>
                    @forelse($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="col-2">
                <select class="p-2  border-none rounded" id="player">
                    <option value="">Player</option>
                </select>
            </div>
            <div class="col-2">
                <select class="p-2  border-none rounded" id="fragger">
                    <option value="">Top Fragger</option>
                    @forelse($players as $player)
                    <option value="{{$player->player->id}}">{{$player->player->name}}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="col-2">
                <button class="btn btn-primary" id="hideall">HideAll</button>
            </div>
        </div>

    </div>
    @endauth

    <section class="d-flex justify-content-center align-items-center">
        <div class="frame-height">
            <!-- wrapper -->
            <div class="row d-flex">

                <!-- image and sponser showcase -->
                <div class="sub_div col-4" id="tournamentShowCase">
                    <div class="row" style="font-size: 18px;">
                        <div class="col-lg-3 col-md-3 padding-0 secondary-bg">
                            <div id="box1" class="d-flex justify-content-center">
                                <img class="imgPosition-logo" src="{{ $round->tournament->logoURL }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 padding-0 text-center">
                            <div id="box2" class="row primary-bg text">
                                <div class="secondary-font-color">
                                    {{ @$round->name }}
                                </div>
                            </div>
                            <div id="box2" class="row secondary-bg text">
                                <div class="primary-font-color">
                                    {{ @$round->subname }} | {{ @$round->liveMatch->name }} |
                                    {{ @$round->liveMatch->map }}
                                </div>
                            </div>
                            <div id="box3" class="row primary-bg text">
                                <div class="secondary-font-color">
                                    {{ @$round->tournament->ticketText }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 padding-0 secondary-bg">
                            <div id="box1" class="d-flex justify-content-center">
                                <img class="imgPosition-sponser" src="{{ @$round->tournament->lowerOrgOrSponsorLogo }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- player showcase -->
                <div class="col-12 showcase-player d-flex" id="playerShowCase">


                </div>

                <!-- team showcase -->
                <div class="col-12 showcase-team team-showcase animate__animated animate__fadeInLeft animate__faster">

                    <!-- top row -->
                    <div class="top-row row">
                    </div>

                    <!-- bottom row -->
                    <div id="teamShowCase">
                    </div>
                </div>
                <!-- END  showcase-->
            </div>

        </div>
    </section>


    @push('scripts')
    <script>
        var channel = pusher.subscribe('showcase-channel');
        channel.bind('showcase-event-' + '{{$round->id}}', function(data) {
            switch (data.type) {
                case 'player':
                    $.ajax({
                        url: "{{ url('/player-show-case') }}/" + data.player_id + '/round/' + "{{ $round->id }}",
                        type: "get",
                        success: function(data) {
                            $('#playerShowCase').empty();
                            $('#teamShowCase').empty();
                            $('#tournamentShowCase').show();
                            $('#playerShowCase').append(data);
                        }
                    })
                    break;
                case 'team':
                    $.ajax({
                        url: "{{ url('/team-show-case') }}/" + data.team_id + '/round/' + "{{ $round->id }}",
                        type: "get",
                        success: function(data) {
                            $('#tournamentShowCase').hide();
                            $('#teamShowCase').empty();
                            $('#playerShowCase').empty();
                            $('#teamShowCase').html(data);
                        }
                    })
                    break;
                case 'hideall':
                    $('#teamShowCase').empty();
                    $('#playerShowCase').empty();
                    $('#tournamentShowCase').show();
                    break;
                default:
                    location.reload();
                    break;
            }
        });
        $('#team_player').on('change', function(e) {
            var team_id = e.target.value;

            $.ajax({
                url: "{{ url('/searchPlayer') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    team_id: team_id
                },
                success: function(data) {
                    $('#player').empty();
                    $('#player').append('<option value="">Select Player </option>');
                    $.map(data.players, function(players, index) {
                        $('#player').append('<option value="' +
                            players.id +
                            '">' +
                            players.name + '</option>');
                    })
                }
            })
        });
        $('#player').on('change', function(e) {
            var player_id = e.target.value;
            showcase('{{$round->id}}', player_id, '', 'player');
        });
        $('#fragger').on('change', function(e) {
            var player_id = e.target.value;
            showcase('{{$round->id}}', player_id, '', 'player');

        })
        $('#team').on('change', function(e) {
            var team_id = e.target.value;
            showcase('{{$round->id}}', '', team_id, 'team');

        });
        $('#hideall').on('click', function(e) {
            var team_id = e.target.value;
            showcase('{{$round->id}}', '', '', 'hideall');
        });

        function showcase(round_id, player_id, team_id, type) {
            $.ajax({
                url: "{{ url('/show-case') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    round_id: round_id,
                    player_id: player_id,
                    team_id: team_id,
                    type: type
                },
                success: function(data) {
                    console.log(data);
                }
            })
        }
    </script>
    @endpush

</x-new-master-layout>