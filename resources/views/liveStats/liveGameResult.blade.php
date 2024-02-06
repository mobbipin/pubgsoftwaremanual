<style>
    .heading1 {
        color: white;
        font-size: 70px;
        font-weight: bolder;
        padding-top: 20px;
        margin-left: -15px
    }

    .span1 {
        color: white;
        font-size: 40px;
    }

    .row1st {
        justify-content: space-between;
    }

    .menu {
        font-size: 10px;
        color: #151722;
    }

    .ranking {
        justify-content: space-between;
    }

    .colrank2 {
        text-align: center;
    }

    .table-text {
        font-size: 28px;
        font-weight: bold;
        text-align: center;
    }

    .colrank22 {
        font-size: 25px;
        font-weight: bold;
    }

    .row2nd {
        justify-content: space-evenly;
        box-shadow: -2px -1px 11px 3px rgba(0, 0, 0, 0.61) inset;
        -webkit-box-shadow: -2px -1px 11px 3px rgba(0, 0, 0, 0.61) inset;
        -moz-box-shadow: -2px -1px 11px 3px rgba(0, 0, 0, 0.61) inset;
    }

    .cont1 {
        border: 1px solid rgba(255, 255, 255, 0.527);
        height: 375px;
        box-shadow: inset 0 -1.5px 16px 3.5px #000;
    }

    .rank1 {
        font-size: 60px;
        font-weight: bold;
        color: #151722;
        margin: 0px 0px 0px;
    }

    .img11 {
        margin-right: -30px;
        position: relative;
        height: 175px;
    }

    .img12 {
        margin-right: -30px;
        height: 175px;
        position: relative;
    }

    .img13 {
        position: relative;
        z-index: 2;
        height: 175px;
    }

    .img14 {
        z-index: 1;
        margin-left: -50px;
        position: relative;
        height: 175px;
    }

    .teamname {
        background-color: #151722;
        font-size: 40px;
        font-weight: bold;
        text-align: center;
        color: #4d7810;
        margin: 0px 0px 0px;
        padding-bottom: 4px;
        padding-top: 4px;
        margin-left: -15px;
        margin-right: -15px;
        margin-bottom: -20px;
        border-top: 1px solid rgba(255, 255, 255, 0.527);
    }

    .rowpoints {
        margin-top: -20px;
        color: white;
        font-size: 60px;
        font-weight: bold;
        text-align: center;
    }

    .rowfooter {
        background-image: linear-gradient(to right, #8cb736, #2828287e);
        border: 1px solid rgba(255, 255, 255, 0.527);
        font-size: 20px;
        font-weight: bold;
    }

    /*    .teamname {
        padding-bottom: 68px;
    } */

    .player-img {
        position: absolute;
    }

    .img-parent {
        position: relative;
    }

    .result-card-img {
        position: relative;
    }

    .player-info {
        margin-top: 0;
        padding: 0;
        border-top: 6px solid white;
    }

    .bg-transparent {
        background-color: #00FF00 !important;
    }

    .footer-info {
        height: 75px;
        margin-top: 0;
        padding: 0;
    }

    .table-logo {
        /* position: absolute; */
        /* height: 51px; */
        /*  right: 17px; */
    }

    /* player imgae size */
    .player-img1 {
        position: absolute !important;
        ;
        height: 400px !important;
        max-height: 85%;
        top: 57px;
        margin-left: 3%;
    }

    .player-img2 {
        position: absolute !important;
        ;
        height: 400px !important;
        max-height: 85%;
        top: 57px;
        margin-left: 23%;
    }

    .player-img3 {
        position: absolute !important;
        ;
        height: 400px !important;
        max-height: 85%;
        top: 57px;
        margin-left: 47%;
    }

    .player-img4 {
        position: absolute !important;
        ;
        height: 400px !important;
        max-height: 85%;
        top: 57px;
        z-index: -1;
        margin-left: 69%;
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



    /*************************************
 * RESPONSIVENESS FOR SMALLER DESIGN *
 *************************************/

    /*************************************
 * RESPONSIVENESS FOR SMALLER DESIGN *
 *************************************/
</style>

<section class="d-flex justify-content-center align-items-center">

    <div class="frame-height">
        <h1 class="display-1 third-color-border text-center">MATCH RANKING <h2 class="display-4 third-color-border text-center mb-2">{{ $round->name }} -
                {{ $round->liveMatch->name }}
            </h2>
        </h1>
        <!-- main container -->
        <div>
            <div class="row d-flex justify-content-between ml-2">
                <!-- team player -->
                <div class="col-5">
                    <div class="border-1 fourth-bg clip-path animate__animated animate__fadeIn animate__delay-4s">
                        <div class="bg-1 fourth-bg ">
                            <div class="border-2 fourth-bg clip-path">
                                <div class="bg-2 primary-bg">

                                    <div class="animate__animated animate__fadeIn animate__delay-5s">
                                        <div class="card-head primary-bg">
                                            <!-- <div class="col d-flex">
                                                                <h1 class="display-4 col-3 text-start mt-3 fourth-color img-parent">#1</h1>
                                                                <img src="{{ asset('images/Momba.png') }}" class="col-9 mt-5 result-card-img  animate__animated animate__fadeIn animate__delay-4s" alt="team player image">
                                                            </div> -->
                                            <div class="row cont1 primary-bg animate__animated animate__fadeInLeft animate__delay-1s">
                                                <p class="rank1 ml-3 primary-font-color">#1</p>
                                                @foreach ($first_team->PlayerStatement as $player)
                                                @if ($player->player->photoURL == '')
                                                <img src="{{ asset('pubg/character/char' . $loop->iteration . '.png') }}" class="{{ 'img1 player-img' . $loop->iteration }}">
                                                @else
                                                <img src="{{ $player->player->photoURL }}" class="{{ 'img1 player-img' . $loop->iteration }}">
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row card-body player-info d-flex  secondary-bg">
                                            <div class="col-3">
                                                <img src="{{ $first_team->team->logoURL }}" alt="logo image" class="team-logo">
                                            </div>
                                            <div class="col-9 col mt-2 text-center">
                                                <h2 class="text-start secondary-font-color pt-2"> {{ $first_team->team->name }}</h2>
                                            </div>
                                        </div>
                                        <div class="card-footer player-info row pt-3 primary-bg">
                                            <div class="col-4">
                                                <h1 class="display-6 text-center secondary-font-color"> {{ $first_team->position_points }}
                                                </h1>
                                            </div>
                                            <div class="col-4">
                                                <h1 class="display-6 ml-2 text-center secondary-font-color">{{ $first_team->kill }}</h1>
                                            </div>
                                            <div class="col-4">
                                                <h1 class="display-6 ml-3 text-center secondary-font-color">{{ $first_team->totalPoint }}
                                                    </h2>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center row secondary-bg pt-2">
                                            <div class="col-4 mt-3 mb-3">
                                                <h3 class="display-6 text-center primary-font-color top-player-size">PLACEPTS</h3>
                                            </div>
                                            <div class="col-4 mt-3 mb-3">
                                                <h3 class="display-6 text-center primary-font-color top-player-size">ELIMINATIONS</h3>
                                            </div>
                                            <div class="col-4 mt-3 mb-3">
                                                <h3 class="display-6 text-center primary-font-color top-player-size">TOTAL PTS</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- team ranking 1 -->
                <div class="col-3">
                    <div class="colrank2 animate__animated animate__fadeIn animate__delay-3s secondary-font-color">
                        <div class="row row2nd primary-bg primary-font-color">
                            <div class="col-lg-1 display-5">RANK</div>
                            <div class="col-lg-4 display-5 pl-5">TEAM
                            </div>
                            <div class="col-lg-3 display-5 pl-5">PLACEPTS</div>
                            <div class="col-lg-1 display-5 ml-3">ELIMS</div>
                            <div class="col-lg-2 display-5 ml-3">PTS</div>
                        </div>
                        @foreach ($first_row_team as $team)
                        <div class="row row2nd primary-bg mt-2">
                            <div class="col-lg-2 secondary-font-color table-text">#{{ $team->rank }}</div>
                            <div class="col-lg-2 table-text secondary-bg"><img src="{{ $team->team->smallLogoURL }}" class="table-logo" alt="" style="width: 51px;"></div>
                            <div class="col-lg-3 table-text primary-color secondary-bg pr-5">
                                <h3 class="team-text secondary-font-color">{{ $team->team->tag }}</h3>
                            </div>
                            <div class="col-lg-2 secondary-font-color table-text">{{ $team->position_points }}</div>
                            <div class="col-lg-1 secondary-font-color table-text"> {{ $team->kill }}</div>
                            <div class="col-lg-2 secondary-font-color table-text"> {{ $team->totalPoint }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- team ranking 2 -->
                <div class="col-3 mr-4">
                    <div class=" colrank2 animate__animated animate__fadeInRight animate__delay-2s secondary-font-color">
                        <div class="row row2nd primary-bg primary-font-color">
                            <div class="col-md-2 col-lg-1 display-5">RANK</div>
                            <div class="col-md-3 col-lg-4 display-5 pl-5">TEAM</div>
                            <div class="col-lg-3 display-5 pl-5">PLACEPTS</div>
                            <div class="col-lg-1 display-5 ml-3">ELIMS</div>
                            <div class="col-lg-2 display-5 ml-3">PTS</div>
                        </div>
                        @foreach ($last_row_team as $team)
                        <div class="row row2nd primary-bg mt-2">
                            <div class="col-lg-2 secondary-font-color table-text">#{{ $team->rank }}</div>
                            <div class="col-lg-2 table-text secondary-bg"><img src="{{ $team->team->smallLogoURL }}" class="table-logo" alt="table team logo" style="width: 51px;"></div>
                            <div class="col-lg-3 table-text primary-color secondary-bg pr-5">
                                <h3 class="team-text secondary-font-color">{{ $team->team->tag }}</h3>
                            </div>
                            <div class="col-lg-2 secondary-font-color table-text">{{ $team->position_points }}</div>
                            <div class="col-lg-1 secondary-font-color table-text"> {{ $team->kill }}</div>
                            <div class="col-lg-2 secondary-font-color table-text"> {{ $team->totalPoint }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
