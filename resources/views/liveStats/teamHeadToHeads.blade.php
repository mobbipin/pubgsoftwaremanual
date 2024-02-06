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
        max-width: 95%;
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
</style>

<section class="d-flex justify-content-center align-items-center">

    <div class="frame-height">
        <h1 class="heading1 third-color-border animate__animated animate__backInDown animate__delay-1s mt-5 text-center third-color-border">SQUAD FACE OFF<span class="span1 third-color-border">{{ $round->tagLine }}</span>
        </h1>
        <div class="row rowcard">
            <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s">
                <img src="{{ $first_team->team->logoURL }}" alt="" class="logoImage animate__animated animate__backInLeft animate__delay-1s">
            </div>

            <div class="col-md-6 col-lg-6 colresult animate__animated animate__backInUp animate__delay-2s">
                <div class="row mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->totalPlayed }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">MATCH</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->totalPlayed }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->totalWin ?? 0 }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">WWCD</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->totalWin ?? 0 }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->totalkill }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">KILL POINTS</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->totalkill }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->placePoint }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">PLACE POINTS</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->placePoint }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">{{ $first_team->totalPoint }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">TOTAL POINTS</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">{{ $second_team->totalPoint }}</div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-3 col-lg-3 colrowcol1 secondary-font-color primary-bg">#{{ $first_team->rank }}</div>
                    <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">RANKING</div>
                    <div class="col-md-3 col-lg-3 colrowcol3 secondary-font-color primary-bg">#{{ $second_team->rank }}</div>
                </div>
            </div>


            <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s">
                <img src="{{ $second_team->team->logoURL }}" alt="" class="logoImage animate__animated animate__backInRight animate__delay-1s">
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
