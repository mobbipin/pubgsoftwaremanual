<x-new-master-layout :round="$round" :tournament="$tournament">
    @auth
    <x-new-yellow-bar :round="$round" />
    <x-new-map-header :round="$round"></x-new-map-header>
    @endauth
    @push('styles')
    <style>
        .maincol {

            /* font-size: 11px; */
            height: 107.8px;
            width: 27rem;

        }

        .collogo {
            /* background-color: rgb(0, 0, 36); */
            /* height: 106px; */
        }

        .logo {
            margin-top: 10px;
            max-height: 50%;
            position: relative;
            left: 32px;
        }

        .name {
            text-align: center;
        }

        .teamCenter {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
        }

        /* TABLE */

        .player-img {
            position: absolute;
            bottom: -1vh;
            z-index: 111;
        }

        .player-rank {
            background: var(--clr-black-low);
            padding: 5px;
        }

        .player-rank h3 {
            color: var(--clr-white-high);
        }

        .glass-curved-border {
            background: rgba(0, 0, 0, 0.4) !important;
            backdrop-filter: blur(6px) !important;
            border-radius: 35% !important;
            padding: 2px;
        }

        .shiny-border {
            border-right: 2px solid #C0C0C0;
            border-bottom: 2px solid #C0C0C0;
            border-radius: 35%;
            /* box-shadow: 1px 1px 5px 0px rgba(255, 215, 0, 0.9); */
        }



        /* for heading and border */
        h3 {
            color: #d0e2a5 !important;
        }


        .table-border-bottom {
            border-bottom: 3px solid {{$tournament[0]['thirdColorBorder']}}!important;
        }

        .table-border-left {
            border-left: 5px solid #d0e2a5 !important;
        }

        /* border gradient animamtion  */
        :root {
            --borderWidth: 5px;
        }

        .table-border-gradient {
            background: #1D1F20 !important;
            position: relative;
            border-radius: var(--borderWidth) !important;
        }

        .table-border-gradient:after {
            content: '';
            position: absolute;
            top: calc(-1 * var(--borderWidth));
            left: calc(-1 * var(--borderWidth));
            height: calc(100% + var(--borderWidth) * 2);
            width: calc(100% + var(--borderWidth) * 2);
            background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
            border-radius: calc(2 * var(--borderWidth));
            z-index: -1;
            animation: animatedgradient 3s ease alternate infinite;
            background-size: 300% 300%;
        }

        .table-border {
            border: 5px solid {{$round->tournament->forthColor}}!important;
        }


        .table-border-top {
            border-top: 3px solid {{$tournament[0]['thirdColorBorder']}}!important;
        }

        .table-border-right {
            border-right: 5px solid {{$round->tournament->forthColor}}!important;
        }

        /* survival logo */
        .survival-logo {
            /* height: 50%; */
            position: relative;
            width: 48%;
            right: 10px;
            top: -5px;
        }

        .survival-player-img {
            position: relative;
            height: 91px;
            left: 43px;
            top: 47px;
            z-index: 1;
        }

        .col-lg-2 {
            height: 984px !important;
        }
    </style>
    <link rel="stylesheet" href="/style/map.css">
    @endpush

    <?php
    if ($tournament[0]['thumbnailBgURL']) {
        $url = $tournament[0]['thumbnailBgURL'];
    } else {
        $url = asset('pubg/background/background1.jpg');
    }
    ?>

    <section id="mapOverView">
        <div class="container-fluid">
            <div class="row">
                <div class="frame-height col-md-3 col-lg-3">
                    @forelse($first_row_team as $key=>$team)
                    <div class="row d-flex maincol">
                        <div class="col-md-5 col-lg-5 collogo  " style="background:{{ $team['team']['color'] }};">
                            <img src="{{ $team->team->logoURL }}" alt="" class="logo">
                        </div>
                        @if($round->showRoster)
                        <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif pt-2">
                            @forelse(@$team->playerStatement->sortBy('dead') as $player)
                            @if($player->dead!=1)
                            <div class="col primary-font-color text-bold" style="font-weight:600">
                                {{ $player->player->name }}
                            </div>
                            @else
                            <div class="col text-black text-bold" style="font-weight:600">
                                {{ $player->player->name }}
                            </div>
                            @endif
                            @empty
                            @endforelse
                        </div>
                        @else
                        <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                            <h3 class="primary-font-color"> {{ $team->team->name }}</h3>
                        </div>

                        @endif
                    </div>
                    @empty
                    @endforelse
                    @php
                    $count=9-count($first_row_team);
                    @endphp
                    @for($i=0;$i<$count;$i++) <div class="row d-flex maincol">
                        <div class="col-md-5 col-lg-5 collogo @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif ">
                            <img src="" alt="" class="logo">
                        </div>
                        @if($round->showRoster)
                        <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif pt-2">

                            <div class="col primary-font-color text-bold" style="font-weight:600">

                            </div>
                        </div>
                        @else
                        <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                            <h3 class="primary-font-color"> </h3>
                        </div>

                        @endif
                </div>
                @endfor
            </div>

            <div class="col-md-5 col-lg-5">
            </div>
            <div class="frame-height col-md-3 col-lg-3" style="margin-left:15px;">
                @forelse($second_row_team as $key=>$team)
                <div class="row d-flex maincol">
                    <div class="col-md-5 col-lg-5 collogo  " style="background:{{ $team['team']['color'] }};">
                        <img src="{{ $team->team->logoURL }}" alt="" class="logo">
                    </div>
                    @if($round->showRoster)
                    <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif pt-2">
                        @forelse(@$team->playerStatement->sortBy('dead') as $player)
                        @if($player->dead!=1)
                        <div class="col primary-font-color text-bold" style="font-weight:600">
                            {{ $player->player->name }}
                        </div>
                        @else
                        <div class="col text-black text-bold" style="font-weight:600">
                            {{ $player->player->name }}
                        </div>
                        @endif
                        @empty
                        @endforelse
                    </div>
                    @else
                    <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                        <h3 class="primary-font-color"> {{ $team->team->name }}</h3>
                    </div>

                    @endif
                </div>
                @empty
                @endforelse
                @php
                $count=9-count($second_row_team);
                @endphp
                @for($i=0;$i<$count;$i++) <div class="row d-flex maincol">
                    <div class="col-md-5 col-lg-5 collogo @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif ">
                        <img src="" alt="" class="logo">
                    </div>
                    @if($round->showRoster)
                    <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif pt-2">

                        <div class="col primary-font-color text-bold" style="font-weight:600">
                            {{ $player->player->name }}
                        </div>

                    </div>
                    @else
                    <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                        <h3 class="primary-font-color"> </h3>
                    </div>

                    @endif
            </div>
            @endfor

        </div>
        </div>
        </div>
    </section>


    @push('scripts')
    <script>
        var channel = pusher.subscribe('map-channel');
        channel.bind('map-event-' + '{{$round->id}}', function(data) {
            console.log(data);
            switch (data.type) {
                case 'Roaster':
                    $.ajax({
                        type: "get",
                        url: "{{ url('map-roaster') }}/" + data.id,
                        success: function(data) {
                            $('#mapOverView').html(data.modal_view);
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'OverallResult':
                    $.ajax({
                        type: "get",
                        url: "{{ url('map-overallKill') }}/" + data.id,
                        success: function(data) {
                            $('#mapOverView').html(data.modal_view);
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                default:
                    location.reload();
            }
        });

        function MapPusher(id, type) {
            $.ajax({
                type: "post",
                url: "{{ url('map-pusher') }}",
                data: {
                    'id': id,
                    '_token': "{{ csrf_token() }}",
                    'type': type,
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }
    </script>
    @endpush
</x-new-master-layout>