<style>
    .container1 {
        background-image: linear-gradient(#8cb736, #4d7810);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.527);
        height: 306px;
    }

    .rank1 {
        font-size: 100px;
        font-weight: bold;
        color: #151722;
        margin: 0px 0px 0px;
    }

    .img1st {
        height: 235px;
        margin-left: 25%;
        margin-top: -83px;
    }

    .teamname {
        background-color: #151722;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        color: #4d7810;
        margin-left: -12px;
        margin-right: -12px;
        border-top: 1px solid rgba(255, 255, 255, 0.527);
    }

    .colrank2 {
        text-align: center;
    }

    .row2nd {
        justify-content: space-evenly;
        border: 5px solid #d3e4aa;
        position: relative;
        z-index: 1;
        /*         height: 135px; */
    }

    .logoimg {
        position: absolute;
        z-index: 9;
        height: 175px;
        bottom: 0px;
        left: 100px;
    }

    .colrank21 {
        /*   */
        font-size: 40px;
        font-weight: bold;
        text-align: left;
    }

    .colrank22 {
        background-color: #151722;
        color: #4d7810;
        font-size: 18px;
        font-weight: bold;
    }

    .logo {
        padding: 10px;
        height: 100px;
    }

    .colrank23 {
        /*  background-image: linear-gradient( #8cb736, #4d7810); */
        font-size: 20px;
        text-align: center;
        /*   */
    }

    .span3 {
        color: white;
    }

    .span2 {
        padding-left: 7rem;
    }

    .numpoints {
        font-size: 25px;
        font-weight: bold;
    }

    .rowpoints {
        margin-top: -140px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
    }

    .rowfooter {
        margin-top: -26px;
        /* background-image: linear-gradient(to right, #8cb736, #2828287e); */
        border: 1px solid rgba(255, 255, 255, 0.527);
        font-size: 18px;
        font-weight: bold;
        text-align: center;
    }

    .result-card-img {
        width: 100px;
        position: relative;
        /*  right: 35px; */
        height: 210px;

    }

    .top-player-size {
        font-size: 15px;
    }

    .logo-img {
        max-width: 70% !important;
        height: 70% !important;
        margin-top: 10px;
    }

    .card-footer {
        padding: 0 !important;
    }

    .team-logo {
        max-height: 100%;
        position: absolute;
        margin-left: 20%;
    }

    .team-text {
        position: relative;
        right: 20px;
        top: 10px;
    }

    /* polygon borders */
    .border-1 {
        border: 6px solid var(--clr-white-high);

    }

    .bg-1 {
        background-color: var(--clr-white-high);
        z-index: -11;
    }

    .border-2 {
        border: 2px solid var(--clr-white-high);
    }

    .bg-2 {
        /*  padding: 25px; */
        z-index: -11;
    }

    .player-img {
        position: relative;
        height: 400px;
        left: 25px;
    }

    .team-logo {
        position: absolute;
        margin-left: 20%;
        height: 135px;
    }

    .team-name {
        font-size: 44px;
        font-weight: 800;
        text-align: center;
    }

    .team-sub-name {
        font-weight: 800;
        text-align: center;
    }

    .player-actions {
        font-size: 26px;
    }

    .span1 {
        font-size: 40px;
    }
</style>

<section class="d-flex justify-content-center align-items-center">
    <div class="frame-height animate__animated animate__fadeIn ">
        <h1 class="text-center third-color-border mt-5 mb-3">TOP PLAYERS <span class="span1 third-color-border">{{$round->tagLine}}</span></h1>
        <div class="row justify-content-between mt-5">
            <!-- valuable player card -->
            <div class="col-4 ml-2">
                <div class="border-1 fourth-bg clip-path animate__animated animate__fadeInLeft animate__delay-2s">
                    <div class="bg-1 fourth-bg ">
                        <div class="border-2 fourth-bg clip-path">
                            <div class="bg-2 primary-bg">
                                <div class="animate__animated animate__fadeIn animate__delay-3s">
                                    <div class="card-head primary-bg">
                                        <div class="row cont1 primary-bg animate__animated animate__fadeInLeft animate__delay-1s">
                                            <p class="rank1  primary-font-color ml-3">#1</p>
                                            @if ($top_player->player->photoURL)
                                            <img src="{{ $top_player->player->photoURL }}" class="player-img  animate__animated animate__fadeIn animate__delay-3s" alt="team player image">
                                            @else
                                            <img src="{{ asset('pubg/character/char1.png') }}" class="player-img  animate__animated animate__fadeIn animate__delay-3s">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row card-body player-info d-flex  secondary-bg">
                                        <div class="col-3">
                                            <img src="{{ $top_player->team->logoURL }}" class="team-logo" alt="logo image">
                                        </div>
                                        <div class="col-9 col text-center">
                                            <h2 class="text-start primary-font-color team-name">{{ $top_player->player->name }}</h2>
                                            <h3 class="display-5 text-start secondary-font-color">{{ $top_player->team->name }}</h3>
                                        </div>
                                    </div>
                                    <div class="card-footer player-info row pt-3 primary-bg">
                                        <div class="col-4">
                                            <h2 class="d-flext align-items-center text-center secondary-font-color">{{ $top_player->totalKill }}
                                            </h2>
                                        </div>
                                        <div class="col-4">
                                            <h2 class="d-flext align-items-center ml-2 text-center secondary-font-color">{{ round($top_player->totalKill/$top_player->gamePlayed,2) }}</h2>
                                        </div>
                                        <div class="col-4 d-flex">
                                            <h2 class="d-flext align-items-center ml-1 text-center secondary-font-color">{{ $top_player->contribution }}%
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center row secondary-bg">
                                        <div class="col-4 mt-3 mb-3">
                                            <h3 class="display-6 text-center primary-font-color top-player-size">TOTAL KILL</h3>
                                        </div>
                                        <div class="col-4 mt-3 mb-3">
                                            <h3 class="display-6 text-center primary-font-color top-player-size">KPM</h3>
                                        </div>
                                        <div class="col-4 mt-3 mb-3">
                                            <h3 class="display-6 text-center primary-font-color top-player-size">CONTRIBUTION</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end valualble player card -->

            <!-- rest winner col -->
            <div class="col-md-7 col-lg-7 colrank2 animate__animated animate__fadeInRight animate__delay-1s mr-4">
                @foreach ($player_stat as $player)
                @if ($loop->iteration != 1)
                <div class="row row2nd mb-5 primary-bg">
                    @if ($player->player->photoURL)
                    <img src="{{ $player->player->photoURL }}" alt="" class="logoimg">
                    @else
                    <img src="{{ asset('pubg/character/char' . $loop->iteration . '.png') }}" alt="" class="logoimg">
                    @endif
                    <div class="col-md-2 col-lg-2 colrank21 pt-1 primary-font-color">
                        #{{ $loop->iteration }}</div>
                    <div class="col-md-5 col-lg-5 colrank22 py-2 secondary-bg">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{ $player->team->logoURL }}" alt="" class="logo">
                            </div>
                            <div class="col-6">
                                <span class="primary-font-color" style="font-size: 32px;">{{ $player->player->name }}</span> <br>
                                <span class="secondary-font-color" style="font-size: 28px;">{{ $player->team->tag }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 colrank23 py-1 secondary-color">
                        <div class="row">
                            <div class="col-5 text-bold d-flex">
                                <h3 class="player-actions primary-font-color pt-2">ELIMS</h3>
                                <h2 class=" secondary-color display-5 secondary-font-color ml-2">{{ $player->totalKill }}</h2>
                            </div>
                            <div class="col-7 d-flex">
                                <h3 class="player-actions primary-font-color pt-2">KPM</h3>
                                @if($player->gamePlayed == 0)
                                <h2 class="secondary-color display-5 secondary-font-color ml-2">{{$player->totalKill}}</h2>
                                @else
                                <h2 class="secondary-color display-5 secondary-font-color ml-2">{{ round($player->totalKill/$player->gamePlayed,2) }}</h2>
                                @endif
                            </div>
                        </div>
                        <div class="row d-flex">
                            <div class="col-6">
                                <h3 class="player-actions primary-font-color pt-2">CONTRIBUTION</h3>
                            </div>
                            <div class="col-6">
                                <h2 class="secondary-color display-5 secondary-font-color ml-2">{{ $player->contribution }}%</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <!-- END rest winner col -->
        </div>
    </div>
</section>
