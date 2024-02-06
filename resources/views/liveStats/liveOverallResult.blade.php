<style>
    .heading1 {
        color: white;
        /* font-size: 70px; */
        font-weight: bold;
        padding-top: 20px;
        /* margin-left: -15px; */
        text-align: center;
    }

    .span1 {
        font-size: 40px;
    }

    .row1st {
        /* background-image: linear-gradient(to right, #8cb736, #4d7810); */
        border: 5px solid #fff;
        padding: 10px;
        font-size: 33px;
        font-weight: bold;
        color: white;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .col1st {
        text-align: left;
    }

    @if($round->resultPerPageOverall==10) .result-row {
        padding: 2px;
        font-size: 34px;
        font-weight: bold;
        color: white;
        justify-content: space-between;
    }

    @else .result-row {
        padding: 5px;
        font-size: 34px;
        font-weight: bold;
        color: white;
        justify-content: space-between;
    }

    @endif .num {
        background-color: #8cb736;
        padding: 5px;
        font-weight: bold;
        text-align: center;
    }

    .squad {
        background-color: black;
        padding: 5px;
        font-weight: bold;
        padding-left: 15px;
    }

    .rowlast {
        padding: 10px;
        font-weight: bold;
        background-color: beige;
        color: black;
        text-align: center;
    }

    .logo {
        height: 60px;
    }
</style>

<section class="d-flex justify-content-center align-items-center">
    <div class="frame-height animate__animated animate__fadeInLeft">
        <h1 class="heading1 third-color-border">OVERALL RANKING <span class="span1 third-color-border">{{$round->tagLine}} </span>
        </h1>
        <div class="row row1st primary-font-color primary-bg" style="text-align: center">
            <div class="col-md-1 col-lg-1">#</div>
            <div class="col-md-3 col-lg-4">SQUADS</div>
            <div class="col-md-8 col-lg-7">
                <div class="row">
                    <div class="col">MATCHES</div>
                    <div class="col">WWCD</div>
                    <div class="col">PLACEPTS</div>
                    <div class="col">ELIMINATIONS</div>
                    <div class="col">TOTALPTS</div>
                </div>
            </div>
        </div>
        @foreach ($team_stat as $team)
        <div class="row result-row animate__animated animate__fadeInLeft animate__delay-1s">
            <div class="col-md-1 col-lg-1 num secondary-bg secondary-font-color">{{ $team['rank'] }}</div>

            <div class="col-md-3 col-lg-4 squad" style="background-image: linear-gradient(45deg,  {{ $team['team']['color'] }}, transparent);">
                <div class="row">
                    <div class="col-2" style="text-align: right; ">
                        <img src="{{ $team['team']['smallLogoURL'] }}" alt="" class="logo">
                    </div>
                    <div class="col-10 primary-font-color" style="text-align: left">
                        {{ $team['team']['name'] }}
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-7">
                <div class="row secondary-font-color secondary-bg rowlast animate__animated animate__fadeIn animate__delay-2s">
                    <div class="col matches">{{ @$team['totalPlayed'] ?? 0 }}</div>
                    <div class="col matches">{{ $team['totalWin'] ? $team['totalWin'] : 0 }}</div>
                    <div class="col matches">{{ $team['placePoint'] }}</div>
                    <div class="col matches">{{ $team['totalkill'] }}</div>
                    <div class="col matches">{{ $team['totalPoint'] }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
