<div class="m-0 p-0" style="height: 970px !important;">
    <div class="row">
        <!-- survival status table -->
        <div class="col-3">
            <table class="secondary-bg fourth-color table-sm table-border" style="width: 27rem;">
                <thead>
                    <tr class="primary-bg-gd">
                        <th colspan="3" class="col-lg-12 text-center ml-5 h4 primary-bg-gd fourth-color table-border-bottom">
                            <h3 class="display-5 m-0 primary-font-color">OVERALL RANKING</h3>
                        </th>
                    </tr>
                    <tr class="secondary-bg fourth-color table-border-bottom">
                        <th scope="col p-0">
                            <h6 class="m-0 text-center primary-font-color">#</h6>
                        </th>
                        <th scope="col">
                            <h6 class="text-center m-0 primary-font-color">Teams</h6>
                        </th>
                        <th colspan="2">
                            <h6 class="m-0 text-center primary-font-color">TOTAL PTS</h6>
                        </th>
                    </tr>
                </thead>
                <tbody class="primary-bg fourth-color table-border-bottom table-border-right">
                    @foreach($overllRankTeam as $team)
                    <tr class="table-border-bottom table-border-right">
                        <td class="pt-2 primary-font-color text-center ">{{$team->rank}}</td>
                        <th scope="row">
                            <div class="d-flex">
                                <img src="{{$team->team->smallLogoURL}}" alt="team logo" class="secondary-bg glass-curved-border" width="35px">
                                <h5 class="ml-1 mt-2 primary-font-color">{{$team->team->name}}</h5>
                            </div>
                        </th>
                        <td class="text-center">
                            <h4 class="mt-1 ml-2 primary-font-color">{{$team->totalPoint}}</h4>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-5"></div>
        <!-- survival status -->
        <div class="col-md-3 col-lg-3" style="left: 15px;">
            <table class="table secondary-bg fourth-color table-sm table-borderless" style="width:26rem;">
                <thead>
                    <tr class="primary-bg-gd">
                        <th colspan="3" class="col-lg-12 text-center ml-5 h4">
                            <h3 class="display-5 m-0 primary-font-color">Survival Status</h3>
                        </th>
                    </tr>
                </thead>
                <tbody class="primary-bg fourth-color table-border-bottom">
                    @foreach($players as $player)
                    <tr class="table-border-bottom">
                        <th scope="row">
                            <div class="row col-12 d-flex">
                                <div class="col-5 secondary-bg">
                                    <img src="{{$player->team->logoURL}}" alt="" class="survival-logo secondary-bg shiny-border-right shiny-border ml-1 glass-curved-border" width="60px" height="50px">
                                    @if($player->player->photoURL)
                                    <img src="{{$player->player->photoURL}}" alt="player image" class="survival-player-img ">
                                    @else
                                    <img src="{{ asset('pubg/character/char' . $loop->iteration . '.png') }}" alt="player image" class="survival-player-img ">
                                    @endif
                                </div>
                                <div class="col-7 primary-bg" style="left:5px;">
                                    <div class="col-6 ">
                                        <h3 class="text-start mt-2 primary-font-color" style="margin-left: 60px;">#{{ $loop->iteration }}</h6>
                                    </div>
                                    <div class="d-flex ml-2">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-5">
                                                <h2 class="text-center primary-font-color">ELIMS</h2>
                                                <h3 class="text-center primary-font-color">{{$player->totalKill}}</h3>

                                            </div>
                                            <div class="col-5" style="margin-left:10px">

                                                <h2 class="text-center primary-font-color" style="margin-left:20px;">KPM</h2>
                                                @if(@$player->gamePlayed==0)
                                                <h3 class="text-center primary-font-color" style="margin-left:20px;">{{$player->totalKill}}</h3>

                                                @else
                                                <h3 class="text-center primary-font-color" style="margin-left:20px;">{{round($player->totalKill/$player->gamePlayed,2)}}</h3>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="ml-2 mt-2">
                                <h4 class="primary-font-color">{{$player->player->name}}</h4>
                            </div>
                        </th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>