<style>
    .heading1 {
        font-size: 70px;
        font-weight: bold;
        padding-top: 20px;
        margin-left: -15px
    }

    .span1 {
        font-size: 40px;
    }

    .rowcard {
        padding-top: 10px;
    }

    .colcard {
        padding-left: -15px;
        padding-right: -15px;
        text-align: center;
        padding-bottom: 15px;

    }

    .logoImage {
        margin-top: 25%;
        position: relative;
    }

    .playerImage1 {
        max-width: 100%;
        position: absolute;
        left: 5%;
        top: 25px;
        animation: spin 8s linear infinite;
        max-width: 95%;
    }

    .playerImage2 {
        max-width: 100%;
        position: absolute;
        left: 5%;
        top: 25px;
        max-width: 95%;
    }

    @keyframes spin {
        100% {
            transform: rotateY(360deg);
        }
    }

    .rowresult {
        background-color: #4d7810;
    }

    .colresult {
        margin-top: 110px;
    }

    .colrowcol1 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        border-bottom: 5px solid transparent;
    }

    .colrowcol2 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;

        border: 5px solid {{ $round->tournament->forthColor }} !important;
        /* border: 5px solid transparent; */
        padding: 10px;
    }

    .colrowcol3 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
    }

    .colcard1 {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-top: 5px;
    }
</style>
<section class="d-flex justify-content-center align-items-center">
    <div class="frame-height">
        <h1 class="third-color-border animate__animated animate__backInDown animate__delay-1s mt-5 text-center">HEAD TO HEAD <span class="span1 third-color-border">@if($tagline) {{$tagline}} @else {{ $round->liveMatch->name }} @endif</span></h1>
        <div class="row rowcard">
            <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s">
                <img src="{{ $first_player->team->logoURL }}" alt="" class="logoImage playerImage1">
                @if ($first_player->player->photoURL)
                <img src="{{ $first_player->player->photoURL }}" alt="" class=" playerImage2 animate__animated animate__backInLeft animate__delay-1s">
                @else
                <img src="{{ asset('pubg/character/char5.png') }}" alt="" class=" playerImage2 animate__animated animate__backInLeft animate__delay-1s">
                @endif
            </div>

            <div class="col-md-6 col-lg-6 colresult animate__animated animate__backInUp animate__delay-2s">
                <div class="row mb-1">
                    <div class="col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_player->totalKill }}</div>
                    <div class="col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">KILL</div>
                    <div class="col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_player->totalKill }}</div>
                </div>
                <div class="row  mb-1">
                    <div class="col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_player->gamePlayed }}</div>
                    <div class="col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">MATCH</div>
                    <div class="col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_player->gamePlayed }}</div>
                </div>
                <div class="row  mb-1">
                    <div class="col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ round($first_player->killPerMatch,2) }}</div>
                    <div class="col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">KILL/MATCH</div>
                    <div class="col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ round($second_player->killPerMatch,2) }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_player->contribution }}
                    </div>
                    <div class="col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">CONTRIBUTION</div>
                    <div class="col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_player->contribution }}
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-3 colrowcol1 secondary-font-color primary-bg">#1</div>
                    <div class="col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">PLAYER RANK</div>
                    <div class="col-lg-3 colrowcol3 secondary-font-color primary-bg">#2</div>
                </div>
                <div class="row mb-1">
                    <div class="col-lg-3 colrowcol1 secondary-font-color primary-bg">#{{ $first_player->teamRank }}</div>
                    <div class="col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">TEAM RANK</div>
                    <div class="col-lg-3 colrowcol3 secondary-font-color primary-bg">#{{ $second_player->teamRank }}</div>
                </div>
            </div>


            <div class="col-md-3 col-lg-3 colcard primary-bg-gd  animate__animated animate__backInDown animate__delay-1s">
                <img src="{{ $second_player->team->logoURL }}" alt="" class="logoImage playerImage1">
                @if ($second_player->player->photoURL)
                <img src="{{ $second_player->player->photoURL }}" alt="" class="playerImage2 animate__animated animate__backInDown animate__delay-1s">
                @else
                <img src="{{ asset('pubg/character/char2.png') }}" alt="" class="playerImage2 animate__animated animate__backInDown animate__delay-1s">
                @endif


            </div>
        </div>
        <div class="row  ">
            <div class="col-md-3 col-lg-3 colcard1 secondary-bg animate__animated animate__backInUp animate__delay-2s pt-2">
                <h1 class="display-4 primary-font-color">{{ $first_player->player->name }}</h1>
            </div>
            <div class="col-md-6 col-lg-6"></div>
            <div class="col-md-3 col-lg-3 colcard1 secondary-bg animate__animated animate__backInUp animate__delay-2s pt-2">
                <h1 class="display-4 primary-font-color">{{ $second_player->player->name }}</h1>
            </div>
        </div>

    </div>
</section>
