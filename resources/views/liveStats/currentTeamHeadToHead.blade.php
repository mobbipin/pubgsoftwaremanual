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
        padding-top: 30px;
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
        max-width: 95%;
    }

    .rowresult {
        background-color: #4d7810;
    }

    .colresult {
        margin-top: 110px;
    }

    .colrowcol1 {
        font-size: 25px;
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
        padding: 10px;
    }

    .colrowcol3 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        padding: 5px;
    }

    .colcard1 {
        /* height: 50px; */
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-top: 5px;
    }

    .ping {
        background: #fff;
        border-radius: 50%;
        border: 50px solid #222;
        width: 40px;
        height: 40px;
        animation: load 1.5s ease-out infinite;
    }

    .ping-home {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        background: rgba(0, 0, 0, 0.1);
        z-index: -11;
        opacity: 0.3;
    }


    @keyframes load {
        0% {
            background: #222;
            border: 0px solid #fff;
        }

        50% {
            background: #222;
            border: 150px solid #fff;
            box-shadow: -10px 8px 81px -7px rgba(130, 155, 48, 1);
        }

        100% {
            background: #222;
            border: 0px solid #fff;

            box-shadow: -10px 8px 201px 74px rgba(130, 155, 48, 1);
        }
    }
</style>

<section class="d-flex justify-content-center align-items-center">
    <div class="frame-height">
        <h1 class="third-color-border animate__animated animate__backInDown animate__delay-1s text-center mt-5">SQUAD FACE OFF<span class="span1 third-color-border">{{ $round->liveMatch->name }}</span></h1>
        <div class="row rowcard">
            <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s">
                <img src="{{ $first_team->team->logoURL }}" alt="" class="logoImage animate__animated animate__backInLeft animate__delay-1s">
                <div class="ping-home ping">
                </div>
            </div>

            <div class="col-md-6 col-lg-6 colresult animate__animated animate__backInUp animate__delay-2s">
                <div class="row rowresult mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->position }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">POSITION</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->position }}</div>
                </div>
                <div class="row rowresult mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->totalWin ?? 0 }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">TOTAL WWCD</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->totalWin ?? 0 }}</div>
                </div>
                <div class="row rowresult mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->kill }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">KILL POINTS</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->kill }}</div>
                </div>
                <div class="row rowresult mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->position_points }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">PLACE POINTS</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->position_points }}</div>
                </div>
                <div class="row rowresult mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->totalPoint }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">TOTAL POINTS</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->totalPoint }}</div>
                </div>
                <div class="row rowresult mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">#{{ $first_team->rank }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">OVERALL RANKING</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">#{{ $second_team->rank }}</div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s">
                <img src="{{ $second_team->team->logoURL }}" alt="" class="logoImage animate__animated animate__backInRight animate__delay-1s">
                <div class="ping-home ping">
                </div>
            </div>
        </div>
        <div class="row rowcard1">
            <div class="col-md-3 col-lg-3 colcard1 secondary-bg primary-color  animate__animated animate__backInUp animate__delay-2s">
                <h1 class="display-4 primary-font-color pt-2">{{ $first_team->team->name }}</h1>
            </div>
            <div class="col-md-6 col-lg-6"></div>
            <div class="col-md-3 col-lg-3 colcard1 secondary-bg primary-color  animate__animated animate__backInUp animate__delay-2s">
                <h1 class="display-4 primary-font-color pt-2">{{ $second_team->team->name }}</h1>
            </div>
        </div>

    </div>
</section>
