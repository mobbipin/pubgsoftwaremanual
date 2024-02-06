<x-new-master-layout :round="$round">
    <x-new-yellow-bar :round="$round" />
    @push('styles')
    <style>
        .box {
            height: 10rem;
            width: 10rem;
            margin: 25px -5px 0px;
            display: flex;
            vertical-align: middle;
            align-items: center;
            justify-content: center;
            background: rgb(121, 39, 9);
            background: linear-gradient(209deg, rgba(121, 39, 9, 0.8102591378348214) 34%, rgba(36, 0, 0, 0.9671218829328606) 59%, rgba(0, 212, 255, 1) 100%);
        }

        .background-url {
            background-image: url({{$tournament->instaThumbBg}});
            background-size: 100%;
            height: 1080px;
            width: 1080px;
        }

        .logo-image {
            max-width: 120px;
            max-height: 120px;
        }

        .player-details {
            color: #fff !important;
            border-collapse: initial;
            width: 40%;
            font-size: 20px;
            position: relative;
            font-weight: 700;
            border-spacing: 5px;
            border: 0;
            margin: auto;
        }

        tr {
            background: linear-gradient(209deg, rgba(131, 58, 180, 1) 0%, rgba(253, 51, 29, 0.9475140397956058) 68%, rgba(252, 176, 69, 1) 100%);
        }

        .youtube-icon {
            position: relative;
            max-height: 80px;
            bottom: 5px;
        }

        .team-logo {
            position: relative;
            max-height: 50px;
            min-height: 50px;
        }
    </style>
    @endpush
    <div class="container">
        <div class="row d-flex  justify-content-center">
            @forelse($teams->player as $player)
            <div class="col-2">
                <div class="box">
                    <div class="row">
                        <img src="{{$player->photoURL}}" class="team-logo-image" alt="" style="height: 160px;">
                    </div>
                </div>
                <div class="row d-flex d-flex justify-content-center align-item-center team-name-logo">
                    <h3 class=" text-center text-dark" style="font-size: 15px;">{{$player->name}}</h3>
                </div>

            </div>
            @empty
            @endforelse
        </div>
    </div>
    <!-- PLAYER STAT -->
    <div class="container background-url">
        <div class="d-flex justify-content-center pt-2">
            <h2 class="text-center display-5 bg-dark" style="margin-top: 45px; width: 35rem;"> {{$tournament->name}}</h2>
        </div>
        <div class="d-flex justify-content-center">
            <h2 class="display-4">PLAYER STATS-{{$round->tagLine}}</h2>
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{$teams->logoURL}}" alt="" class="logo-image">
        </div>
        <div class="d-flex justify-content-center">
            <table class="table player-details" style="width: 35%;">
                <thead>
                    <tr>
                        <td scope="col" class="text-center">Player</td>
                        <td scope="col" class="text-center">KILL</td>
                        <td scope="col" class="text-center">KPM</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams->player as $player)
                    <tr>
                        <td class="text-center">{{$player->name}}</td>
                        <td class="text-center">{{$player->totalKill}}</td>
                        <td class="text-center">{{$player->kd}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <!-- LIVE DETAILS -->
    <div class="container background-url">
        <div class="d-flex justify-content-between">
            <div class="col-3">
                <div class="row d-flex  justify-content-center " style="margin-top: 6rem;margin-left: 1rem;">
                    @foreach($first_row_team as $team)
                    <div class="col-4">
                        <img src="{{$team->smallLogoURL}}" alt="" class="team-logo">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <div class="tournament-logo d-flex justify-content-center">
                    <img src="{{$tournament->logoURL}}" alt="">
                </div>
                <div class="d-flex justify-content-center bg-dark text-white" style="font-size: 60px;font-weight: 700;">
                    {{$round->name}}
                </div>
                <div class="d-flex justify-content-center">
                    <img src="{{$teams->logoURL}}" alt="" style="height: 18rem;">
                </div>
            </div>
            <div class=" col-3">
                <div class="row d-flex  justify-content-center " style="margin-top: 6rem;margin-right: 1rem;">
                    @foreach($second_row_team as $team)
                    <div class="col-4">
                        <img src="{{$team->smallLogoURL}}" alt="" class="team-logo">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- youtube Details -->
        <div class=" d-flex justify-content-center youtube-content" style="background-color: black;">
            <p style=" font-size: 35px;text-align: center;">
                WATCH US IN ACTION LIVE FROM {{$round->time}}<br>
                ONWARDS ON <img src="{{asset('pubg/logo/youtube-icon.png')}}" alt="" class="youtube-icon"> {{$round->channel}}
            </p>
        </div>
    </div>

</x-new-master-layout>