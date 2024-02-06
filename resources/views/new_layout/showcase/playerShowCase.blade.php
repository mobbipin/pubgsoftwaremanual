{{--<div class="col-9">
    <img src="{{$player->photoURL}}" class="player-img animate__animated animate__fadeInRightBig animate__slower" alt="player-image">
</div>
<div class="col-3 pl-2 pr-2">
    <!-- bottom row -->
    <div class="row">
        <!-- misc information -->
        <div class="col d-flex flex-column justify-content-center align-items-end p-2 animate__animated animate__fadeInRight animate__delay-2s  animate__slower">
            <div class="row mb-4">
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <img src="{{$player->team->logoURL}}" class="logo-img" alt="logo image"><br>
                    <h2 class="display-6 ">{{$player->team->name}}</h2>
                    <h2 class="display-4 ml-4T">{{$player->name}}</h2>
                </div>
            </div>
            <div class="mb-4">
                <h2 class="display-4">KILL/MATCH</h2>
                <h2 class="display-1 match-kill-result">{{round($player->kills/$player->gamePlayed,2)}}</h2>
            </div>
            <div class="kills-info mb-4">
                <h2 class="display-4 mr-5">KILLS</h2>
                <h2 class="display-1 mr-5 text-center">{{$player->kills}}</h2>
            </div>
            <div>
                <h3 class="display-5 mr-5">Overall Rank</h2>
                    <h2 class="display-2">#{{$player->rank}}</h2>
            </div>
        </div>
    </div>
</div>--}}


<div class="col-9">
    @if($player->photoURL)
    <img src="{{$player->photoURL}}" class="player-img animate__animated animate__fadeInRightBig animate__slower" alt="player-image">
    @else
    <img src="{{asset('pubg/character/char1.png')}}" class="player-img animate__animated animate__fadeInRightBig animate__slower" alt="player-image">
    @endif
</div>
<div class="col-3 pl-2 pr-2">
    <!-- bottom row -->
    <!-- misc information -->
    <div class="col d-flex  primary-bg flex-column justify-content-center  p-2 animate__animated animate__fadeInRight animate__delay-2s  animate__slower" style="top: 25rem;left: 51px;width: 350px;">
        <div class="row mb-4">
            <div class="col d-flex flex-column justify-content-center align-items-center" style="left:5rem;">
                <img src="{{$player->team->smallLogoURL}}" class="logo-img" alt="logo image"><br>
                <h3 class="display-5 " style="margin-right: 30px">{{$player->team->name}}</h3>
                <h2 style="margin-right: 30px">{{$player->name}}</h2>
            </div>
        </div>
        <div class="mb-2 d-flex flex-column justify-content-end align-items-end">
            <h3 class="display-5">KILL/MATCH</h3>
            @if($player->gamePlayed)
            <h3 class="display-4 match-kill-result" style="margin-right:3rem">{{round($player->kills/$player->gamePlayed,2)}}</h3>
            @else
            <h3 class="display-4 match-kill-result" style="margin-right:3rem">{{$player->kills}}</h3>
            @endif
        </div>
        <div class="kills-info mb-2 d-flex flex-column justify-content-end align-items-end">
            <h3 class="display-5 ">KILLS</h3>
            <h3 class="display-5" style="margin-right:20px ;">{{$player->kills}}</h3>
        </div>
        <div class="d-flex flex-column justify-content-end align-items-end">
            <h4 class="display-5  ">Overall Rank</h2>
                <h3 class="display-5" style="margin-right: 3rem;">#{{$player->rank}}</h3>
        </div>
    </div>
</div>