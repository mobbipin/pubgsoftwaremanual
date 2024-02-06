<table class="table secondary-bg fourth-color table-sm table-borderless">
    <thead>
        <tr class="primary-bg-gd">
            <th colspan="3" class="col-lg-12 text-center ml-5 h4">
                <h3 class="display-5 m-0 primary-font-color">{{$title}}</h3>
            </th>
        </tr>
    </thead>
    <tbody class="primary-bg fourth-color table-border-bottom">
        @foreach($players as $player)
        <tr class="table-border-bottom">
            <th scope="row">
                <div class="row col-12 d-flex">
                    <div class="col-5 secondary-bg">
                        <img src="{{$player->team->logoURL}}" alt="team logo" class="survival-logo secondary-bg shiny-border-right shiny-border ml-1 glass-curved-border" width="60px" height="50px">
                        @if($player->player->photoURL)
                        <img src="{{$player->player->photoURL}}" alt="player image" class="survival-player-img ">
                        @else
                        <img src="{{ asset('pubg/character/char' . $loop->iteration . '.png') }}" alt="player image" class="survival-player-img ">
                        @endif
                    </div>
                    <div class="col-7">
                        <div class="col-6 ml-4">
                            <h3 class="text-start mt-1 ml-1 mt-2 secondary-font-color">#{{ $loop->iteration }}</h6>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-6">
                                <h4 class="text-center primary-font-color">ELIMS</h4>
                                @if($title=="Overall Kill")
                                <h3 class="text-center secondary-font-color">{{$player->totalKill}}</h3>
                                @else
                                <h3 class="text-center secondary-font-color">{{$player->kill}}</h3>
                                @endif
                            </div>
                            <div class="col-6">
                                @if($title=="Overall Kill")
                                <h4 class="text-center primary-font-color">KILL/MATCH</h4>
                                @if(@$player->gamePlayed==0)
                                <h3 class="text-center secondary-font-color">{{$player->totalKill}}</h3>
                                @else
                                <h3 class="text-center secondary-font-color">{{round($player->totalKill/$player->gamePlayed,2)}}</h3>
                                @endif
                                @else
                                <h4 class="text-center primary-font-color" style="margin-left: -10px;">CONTRIBUTION</h4>
                                <h3 class="text-center secondary-font-color">{{$player->contribution}}%</h3>
                                @endif
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