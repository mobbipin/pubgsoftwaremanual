<x-new-master-layout :round="$round" :tournament="$singleTournament">
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @push('styles')
    <style>
        .header-bold {
            font-weight: 700;
        }

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
            height: 155px;
            bottom: 0px;
            left: 65px;
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
            height: 272px;
            left: -5px;
        }

        .team-logo {
            position: absolute;
            margin-left: -15%;
            height: 135px;
        }

        .team-name {
            font-weight: 800;
            text-align: center;
        }

        .team-sub-name {
            font-weight: 800;
            text-align: center;
        }

        .player-actions {
            font-size: 26px;
            margin-left: -5px;
        }

        .logo-image {
            position: relative;
            height: 125px;
            left: 12px;
        }

        .margin {
            margin: 5px 5px 5px 5px;
        }

        /* typography for frame design */
        .card-head {
            font-size: 2rem;
            font-weight: 800;
        }

        .colrowcol2 {
            font-size: 36px;
            font-weight: bold;
            text-align: center;
            border: 5px solid {{$round->tournament->forthColor}} !important;
        }

        .padding-row {
            padding-top: 35px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .card-sub-head {
            font-size: 1.5rem;
            font-weight: 800;
        }

        .card-logo-img {
            position: inherit;
            max-width: 100px;
        }

        .player-card-img {
            position: absolute;
            height: 120px;
            top: -20px;
        }

        .position-box {
            position: absolute;
            height: 35px;
            left: -18px;
            top: -5px;
            transform: rotate(350deg);
            box-shadow: 0px 5px 23px -1px rgba(0, 0, 0, 0.63);
        }

        /* overall ranking */
        .logo {
            position: relative;
            height: 70px !important;
        }

        .score-row {
            height: 73px;
            margin-left: -10px;
        }

        .squad-name-text {
            font-size: 25px;
            text-align: center;
            font-weight: 800;
        }

        .list-name-text {
            font-size: 1.8rem;
            text-align: center;
            font-weight: 800;
            padding-top: 20px;
            padding-bottom: 10px;
        }

        .logo-image {
            position: absolute;
        }

        .player-image {
            height: 31rem;
            position: relative;
            top: 28px;
        }

        /* top fraggers */
        .player-frag-image {
            position: relative;
            top: 110px;
        }

        .logo-frag-image {
            position: relative;
            max-width: 65%;
            left: 15%;
            margin-bottom: 25px;
        }

        .rest-position-card {
            height: 45%;
        }

        .rest-logo-frag-image {
            position: relative;
            max-width: 45%;
            left: 15%;
            margin-bottom: 10px;
        }

        .team-logo-image {
            max-height: 120px;
            max-width: 120px;
        }

        .rest-player-frag-image {}

        .rest-kills-h {
            font-size: 1.5rem;
            font-weight: 800;
            text-align: center;
        }

        .fragger-rank {
            position: absolute;
            height: 63px;
            box-shadow: 0px 5px 23px -1px rgba(0, 0, 0, 0.63);
        }

        .fragger-team-logo {
            position: relative;
            height: 70px !important;
            left: 40px;

        }

        .fragger-rank-rest {
            position: absolute;
            height: 35px;
            box-shadow: 0px 5px 23px -1px rgba(0, 0, 0, 0.63);
        }

        .background-url {
            background-image: url({{$singleTournament[0]->instaBgURL}});
            background-size: 100%;
            height: 1080px;
            width: 1080px;
        }

        .margin-top {
            margin-top: 100px;
        }

        .box {
            height: 10rem;
            width: 10rem;
            margin: 25px -5px 0px;
            display: flex;
            vertical-align: middle;
            align-items: center;
            justify-content: center;
        }

        .team-name-logo {
            border-top: 1px solid #fff;
            width: 10rem;
            margin-left: -5px;
        }
    </style>
    @endpush
    <div class="container">
        <form id="generateResult" method="get" action="{{url('instaResult')}}">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-2">
                            <label for="title"><span>TITLE</span></label><br>
                            <input type="text" class="form-control" id="title" name="title" placeholder="TITLE">
                        </div>
                        <div class="col-2">
                            <label for="match1">SUB-TITLE</label><br>
                            <input type="text" class="form-control" id="sub-title" name="sub-title" placeholder="SUB TITLE">
                        </div>
                        <div class="col-2">
                            <label for="match1">TOURNAMENT</label><br>
                            <select class="p-2 bg-white border border-none rounded" name="tournament_id" id="tournament">
                                <option value="">none</option>
                                @foreach ($tournaments as $tournament)
                                <option value="{{$tournament->id}}">
                                    {{ $tournament->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="match1">ROUND</label><br>
                            <select class="p-2 bg-white border border-none rounded" id="round" name="round">
                                <option value="">none</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="match1">BULK SELECT</label><br>
                            <select class="p-2 bg-white border border-none rounded" id="bulk">
                                <option value="">none</option>
                                <option value="4">FIRST 4</option>
                                <option value="8">FIRST 8</option>
                                <option value="12">FIRST 12</option>
                                <option value="all">ALL</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="match1">Match</label><br>
                            <select class="p-2 bg-white border border-none rounded" name="match_id[]" id="match" multiple aria-label="multiple select example">
                                <option value="">none</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="row">
                        <button class="btn btn-primary btn-sm" id="generate" type="submit">Generate</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Insta Result FOrms -->
    <section class="d-flex justify-content-center  padding-top">
        <div class="conatiner">
            <!-- tournament Background -->
            <div class="container background-url">
            </div>
            <br>
            <!-- top five team -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 margin-top primary-font-color "> {{$round->name}}</h1>
                </div>
                <div class="d-flex justify-content-center mb-4">
                    <div class="primary-bg" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- player Cards -->
                @foreach($teams as $team)
                @if($loop->iteration>5)
                @break
                @endif
                <div class="col d-flex primary-bg-gd mb-4" style="left:4rem;background-image: linear-gradient(90deg, {{$team->team->color}}, transparent) !important;">
                    <div class="col-1">
                        <span class="position-box secondary-bg p-1">
                            <h3>#{{$loop->iteration}}</h3>
                        </span>
                    </div>
                    <div class="col-2">
                        <img src="{{$team->team->smallLogoURL}}" class="card-logo-img" alt="team logo">
                    </div>
                    <div class="col-6">
                        <h4 class="display-4 pt-2 card-head primary-font-color">{{$team->team->name}}</h4>
                        <h4 class="display-4  card-sub-head primary-font-color">TOTAL POINTS: {{$team->totalPoint}}</h4>
                    </div>
                    <div class="col-3">
                        @if(@$team->PlayerStatement[0]->player->photoURL)
                        <img src="{{$team->PlayerStatement[0]->player->photoURL}}" class="player-card-img" alt="player-image">
                        @else
                        <img src="{{ asset('pubg/character/char' . $loop->iteration . '.png') }}" class="player-card-img" alt="player-image">
                        @endif
                    </div>
                </div>


                @endforeach
            </div>
            <br>
            <!-- team name with their logo -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 margin-top primary-font-color"> overall result</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <div class="row d-flex  justify-content-center ">
                    @forelse($teams as $team)
                    @if($loop->iteration>18)
                    @break
                    @endif
                    <div class="col-2">
                        <div class="box" style="background-color:{{$team->team->color}}">
                            <div class="row">
                                <img src="{{$team->team->logoURL}}" class="team-logo-image" alt="">
                            </div>
                        </div>
                        <div class="row d-flex d-flex justify-content-center align-item-center team-name-logo secondary-bg">
                            <h3 class=" text-center primary-font-color pt-2" style="font-size: 15px">{{$team->team->name}}</h3>
                        </div>

                    </div>


                    @empty
                    @endforelse
                </div>
            </div>
            <br>
            <!-- overall Ranking 1 -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 primary-font-color"> overall Ranking</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg mb-2" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- ranking table 1 -->
                <div class="container animate__animated animate__fadeInLeft">
                    <div class="row row1st secondary-font-color primary-bg mb-1" style="text-align: center">
                        <div class="col-md-1 col-lg-1 pt-2">
                            <h4 class="primary-font-color">#</h4>
                        </div>
                        <div class="col-md-3 col-lg-4 pt-2">
                            <h4 class="primary-font-color">SQUADS</h4>
                        </div>
                        <div class="col-md-8 col-lg-7 pt-2">
                            <div class="row">
                                <div class="col">
                                    <h5 class="primary-font-color">MATCHES</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">WWCD</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">PLACEPTS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">ELIMINATIONS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">TOTALPTS</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($first_row as $team)
                    <div class="row result-row animate__animated animate__fadeInLeft animate__delay-1s">
                        <div class="col-md-1 col-lg-1 secondary-bg mb-1">
                            <h3 class="secondary-font-color ml-3 mt-4">{{$team->rank}}</h3>
                        </div>

                        <div class="col-md-3 col-lg-4 squad mb-1" style="background-image: linear-gradient(45deg,  {{$team->team->color}}, transparent);">
                            <div class="row">
                                <div class="col-3" style="text-align: right; ">
                                    <img src="{{$team->team->smallLogoURL}}" alt="" class="logo">
                                </div>
                                <div class="col-9" style="text-align: left">
                                    <h3 class="primary-font-color mt-4" style="font-size: 20px;">{{$team->team->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <div class="row secondary-font-color score-row secondary-bg rowlast animate__animated animate__fadeIn animate__delay-2s mb-1">
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPlayed??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalWin??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->placePoint}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalkill}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPoint}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            <!-- Overall Ranking 2 -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 primary-font-color"> overall Ranking</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg mb-2" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- ranking table 2 -->
                <div class="container animate__animated animate__fadeInLeft">
                    <div class="row row1st secondary-font-color primary-bg mb-1" style="text-align: center">
                        <div class="col-md-1 col-lg-1 pt-2">
                            <h4 class="primary-font-color">#</h4>
                        </div>
                        <div class="col-md-3 col-lg-4 pt-2">
                            <h4 class="primary-font-color">SQUADS</h4>
                        </div>
                        <div class="col-md-8 col-lg-7 pt-2">
                            <div class="row">
                                <div class="col">
                                    <h5 class="primary-font-color">MATCHES</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">WWCD</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">PLACEPTS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">ELIMINATIONS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">TOTALPTS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($second_row as $team )
                    <div class="row result-row animate__animated animate__fadeInLeft animate__delay-1s">
                        <div class="col-md-1 col-lg-1 secondary-bg mb-1">
                            <h3 class="secondary-font-color ml-3 mt-4">{{$team->rank}}</h3>
                        </div>

                        <div class="col-md-3 col-lg-4 squad mb-1" style="background-image: linear-gradient(45deg,  {{$team->team->color}}, transparent);">
                            <div class="row">
                                <div class="col-3" style="text-align: right; ">
                                    <img src="{{$team->team->smallLogoURL}}" alt="" class="logo">
                                </div>
                                <div class="col-9" style="text-align: left">
                                    <h3 class="primary-font-color mt-4" style="font-size: 20px;">{{$team->team->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <div class="row secondary-font-color score-row secondary-bg rowlast animate__animated animate__fadeIn animate__delay-2s mb-1">
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPlayed??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalWin??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->placePoint}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalkill}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPoint}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            @if($third_row != null)
            <!-- Overall Ranking 3 -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 primary-font-color"> overall Ranking</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg mb-2" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- ranking table 2 -->
                <div class="container animate__animated animate__fadeInLeft">
                    <div class="row row1st secondary-font-color primary-bg mb-1" style="text-align: center">
                        <div class="col-md-1 col-lg-1 pt-2">
                            <h4 class="primary-font-color">#</h4>
                        </div>
                        <div class="col-md-3 col-lg-4 pt-2">
                            <h4 class="primary-font-color">SQUADS</h4>
                        </div>
                        <div class="col-md-8 col-lg-7 pt-2">
                            <div class="row">
                                <div class="col">
                                    <h5 class="primary-font-color">MATCHES</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">WWCD</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">PLACEPTS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">ELIMINATIONS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">TOTALPTS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($third_row as $team )
                    <div class="row result-row animate__animated animate__fadeInLeft animate__delay-1s">
                        <div class="col-md-1 col-lg-1 secondary-bg mb-1">
                            <h3 class="secondary-font-color ml-3 mt-4">{{$team->rank}}</h3>
                        </div>

                        <div class="col-md-3 col-lg-4 squad mb-1" style="background-image: linear-gradient(45deg,  {{$team->team->color}}, transparent);">
                            <div class="row">
                                <div class="col-3" style="text-align: right; ">
                                    <img src="{{$team->team->smallLogoURL}}" alt="" class="logo">
                                </div>
                                <div class="col-9" style="text-align: left">
                                    <h3 class="primary-font-color mt-4" style="font-size: 20px;">{{$team->team->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <div class="row secondary-font-color score-row secondary-bg rowlast animate__animated animate__fadeIn animate__delay-2s mb-1">
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPlayed??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalWin??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->placePoint}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalkill}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPoint}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            @endif
            @if($fourth_row != null)
            <!-- Overall Ranking 4 -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 primary-font-color"> overall Ranking</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg mb-2" style="width:33rem;">
                        <h2 class="secondary-font-color">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- ranking table 2 -->
                <div class="container animate__animated animate__fadeInLeft">
                    <div class="row row1st secondary-font-color primary-bg mb-1" style="text-align: center">
                        <div class="col-md-1 col-lg-1 pt-2">
                            <h4 class="primary-font-color">#</h4>
                        </div>
                        <div class="col-md-3 col-lg-4 pt-2">
                            <h4 class="primary-font-color">SQUADS</h4>
                        </div>
                        <div class="col-md-8 col-lg-7 pt-2">
                            <div class="row">
                                <div class="col">
                                    <h5 class="primary-font-color">MATCHES</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">WWCD</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">PLACEPTS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">ELIMINATIONS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">TOTALPTS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($fourth_row as $team )
                    <div class="row result-row animate__animated animate__fadeInLeft animate__delay-1s">
                        <div class="col-md-1 col-lg-1 secondary-bg mb-1">
                            <h3 class="secondary-font-color ml-3 mt-4">{{$team->rank}}</h3>
                        </div>

                        <div class="col-md-3 col-lg-4 squad mb-1" style="background-image: linear-gradient(45deg,  {{$team->team->color}}, transparent);">
                            <div class="row">
                                <div class="col-3" style="text-align: right; ">
                                    <img src="{{$team->team->smallLogoURL}}" alt="" class="logo">
                                </div>
                                <div class="col-9" style="text-align: left">
                                    <h3 class="primary-font-color mt-4" style="font-size: 20px;">{{$team->team->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <div class="row secondary-font-color score-row secondary-bg rowlast animate__animated animate__fadeIn animate__delay-2s mb-1">
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPlayed??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalWin??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->placePoint}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalkill}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPoint}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            @endif
            @if($fifth_row != null)
            <!-- Overall Ranking 5 -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 primary-font-color"> overall Ranking</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg mb-2" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- ranking table 2 -->
                <div class="container animate__animated animate__fadeInLeft">
                    <div class="row row1st secondary-font-color primary-bg mb-1" style="text-align: center">
                        <div class="col-md-1 col-lg-1 pt-2">
                            <h4 class="primary-font-color">#</h4>
                        </div>
                        <div class="col-md-3 col-lg-4 pt-2">
                            <h4 class="primary-font-color">SQUADS</h4>
                        </div>
                        <div class="col-md-8 col-lg-7 pt-2">
                            <div class="row">
                                <div class="col">
                                    <h5 class="primary-font-color">MATCHES</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">WWCD</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">PLACEPTS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">ELIMINATIONS</h5>
                                </div>
                                <div class="col">
                                    <h5 class="primary-font-color">TOTALPTS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($fifth_row as $team )
                    <div class="row result-row animate__animated animate__fadeInLeft animate__delay-1s">
                        <div class="col-md-1 col-lg-1 secondary-bg mb-1">
                            <h3 class="secondary-font-color ml-3 mt-4">{{$team->rank}}</h3>
                        </div>

                        <div class="col-md-3 col-lg-4 squad mb-1" style="background-image: linear-gradient(45deg,  {{$team->team->color}}, transparent);">
                            <div class="row">
                                <div class="col-3" style="text-align: right; ">
                                    <img src="{{$team->team->smallLogoURL}}" alt="" class="logo">
                                </div>
                                <div class="col-9" style="text-align: left">
                                    <h3 class="primary-font-color mt-4" style="font-size: 20px;">{{$team->team->name}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-7">
                            <div class="row secondary-font-color score-row secondary-bg rowlast animate__animated animate__fadeIn animate__delay-2s mb-1">
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPlayed??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalWin??0}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->placePoint}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalkill}}</h3>
                                </div>
                                <div class="col matches">
                                    <h3 class="secondary-font-color text-center mt-3">{{$team->totalPoint}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <br>
            @endif

            <!-- Squad Face Off -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 margin-top primary-font-color">SQUAD FACE OFF</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- squad section -->
                <div class="container" style="margin-top: 80px;">
                    <div class="row rowcard">
                        <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s d-flex justify-content-center align-items-center">
                            <img src="{{$teams[0]->team->logoURL}}" alt="" class="logoImage animate__animated animate__backInLeft animate__delay-1s">
                        </div>

                        <div class="col-md-6 col-lg-6 colresult animate__animated animate__backInUp animate__delay-2s padding-row">
                            <div class="row mb-1">
                                <div class="col-md-2 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1">{{$teams[0]->totalWin??0}}</h2>
                                </div>
                                <div class="col-md-8 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">MATCH</h2>
                                </div>
                                <div class="col-md-2 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1">{{$teams[1]->totalWin??0}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-2 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[0]->totalWin??0}}</h2>
                                </div>
                                <div class="col-md-8 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">WWCD</h2>
                                </div>
                                <div class="col-md-2 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[1]->totalWin??0}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-2 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[0]->totalkill}}</h2>
                                </div>
                                <div class="col-md-8 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">KILL POINTS</h2>
                                </div>
                                <div class="col-md-2 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[1]->totalkill}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[0]->placePoint}}</h2>
                                </div>
                                <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">PLACE POINTS</h2>
                                </div>
                                <div class="col-md-3 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[1]->placePoint}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[0]->totalPoint}}</h2>
                                </div>
                                <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">TOTAL POINTS</h2>
                                </div>
                                <div class="col-md-3 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$teams[1]->totalPoint}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3"> #{{$teams[0]->rank}}</h2>
                                </div>
                                <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">RANKING</h2>
                                </div>
                                <div class="col-md-3 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3"> #{{$teams[1]->rank}}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s d-flex justify-content-center align-items-center">
                            <img src="{{$teams[1]->team->logoURL}}" alt="" class="logoImage animate__animated animate__backInRight animate__delay-1s">
                        </div>
                    </div>
                    <div class="row rowcard1">
                        <div class="col-md-3 col-lg-3 colcard1 secondary-bg primary-color  animate__animated animate__backInUp animate__delay-2s">

                            <h1 class="display-4 primary-font-color pt-2 squad-name-text">{{$teams[0]->team->name}}</h1>
                        </div>
                        <div class="col-md-6 col-lg-6"></div>
                        <div class="col-md-3 col-lg-3 colcard1 secondary-bg primary-color  animate__animated animate__backInUp animate__delay-2s">
                            <h1 class="display-4 primary-font-color pt-2 squad-name-text ">{{$teams[1]->team->name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- PLAYER FACE OFF -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 margin-top primary-font-color"> PLAYER FACE OFF</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg" style="width:33rem;">
                        <h2 class="secondary-font-color text-center">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>

                <!-- player section -->
                <div class="container" style="margin-top: 85px;">
                    <div class="row rowcard">
                        <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s d-flex justify-content-center align-items-center">
                            <img src="{{$mvpPlayer[0]->team->logoURL}}" alt="" class="logo-image animate__animated animate__backInLeft animate__delay-1s">
                            @if($mvpPlayer[0]->player->photoURL)
                            <img src="{{$mvpPlayer[0]->player->photoURL}}" alt="" class="player-image animate__animated animate__backInDown animate__delay-1s">
                            @else
                            <img src="{{ asset('pubg/character/char1.png') }}" alt="" class="player-image animate__animated animate__backInDown animate__delay-1s">
                            @endif
                        </div>

                        <div class="col-md-6 col-lg-6 colresult animate__animated animate__backInUp animate__delay-2s padding-row">
                            <div class="row mb-1">
                                <div class="col-md-2 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1">{{$mvpPlayer[0]->totalKill}}</h2>
                                </div>
                                <div class="col-md-8 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">KILL</h2>
                                </div>
                                <div class="col-md-2 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1">{{$mvpPlayer[1]->totalKill}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-2 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$mvpPlayer[0]->gamePlayed??0}}</h2>
                                </div>
                                <div class="col-md-8 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">MATCH</h2>
                                </div>
                                <div class="col-md-2 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$mvpPlayer[1]->gamePlayed??0}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-2 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    @if($mvpPlayer[0]->gamePlayed!=0)
                                    <h2 class="mt-3 ml-1"> {{round($mvpPlayer[0]->totalKill/$mvpPlayer[0]->gamePlayed,2)}}</h2>
                                    @else
                                    <h2 class="mt-3 ml-1"> 0</h2>
                                    @endif
                                </div>
                                <div class="col-md-8 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">KILL/MATCH</h2>
                                </div>
                                <div class="col-md-2 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    @if($mvpPlayer[1]->gamePlayed!=0)
                                    <h2 class="mt-3 ml-1"> {{round($mvpPlayer[1]->totalKill/$mvpPlayer[1]->gamePlayed,2)}}</h2>
                                    @else
                                    <h2 class="mt-3 ml-1"> 0</h2>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$mvpPlayer[0]->contribution}}</h2>
                                </div>
                                <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">CONTRIBUTION</h2>
                                </div>
                                <div class="col-md-3 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> {{$mvpPlayer[1]->contribution}}</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> #1</h2>
                                </div>
                                <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">PLAYER RANK</h2>
                                </div>
                                <div class="col-md-3 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3 ml-1"> #2</h2>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-md-3 col-lg-3 colrowcol1 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3" style="margin-left: -12px !important;"> #{{$mvpPlayer[0]->teamRank}}</h2>
                                </div>
                                <div class="col-md-6 col-lg-6 colrowcol2 secondary-bg primary-font-color primary-bg">
                                    <h2 class="list-name-text primary-font-color">TEAM RANK</h2>
                                </div>
                                <div class="col-md-3 col-lg-3 colrowcol3 text-center secondary-font-color primary-bg">
                                    <h2 class="mt-3" style="margin-left: -12px !important;"> #{{$mvpPlayer[1]->teamRank}}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-lg-3 colcard primary-bg-gd animate__animated animate__backInDown animate__delay-1s d-flex justify-content-center align-items-center">
                            <img src="{{$mvpPlayer[1]->team->logoURL}}" alt="" class="logo-image animate__animated animate__backInRight animate__delay-1s">
                            @if($mvpPlayer[1]->player->photoURL)
                            <img src="{{$mvpPlayer[1]->player->photoURL}}" alt="" class="player-image  animate__animated animate__backInLeft animate__delay-1s">
                            @else
                            <img src="{{ asset('pubg/character/char2.png') }}" alt="" class="player-image  animate__animated animate__backInLeft animate__delay-1s">
                            @endif
                        </div>
                    </div>
                    <div class="row rowcard1">
                        <div class="col-md-3 col-lg-3 colcard1 secondary-bg primary-font-color  animate__animated animate__backInUp animate__delay-2s">
                            <div class="row d-flex justify-content-center">
                                <h1 class="display-4 primary-font-color pt-2 squad-name-text">{{$mvpPlayer[0]->player->name}}</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6"></div>
                        <div class="col-md-3 col-lg-3 colcard1 secondary-bg primary-font-color  animate__animated animate__backInUp animate__delay-2s">
                            <div class="row d-flex justify-content-center">
                                <h1 class="display-4 primary-font-color pt-2 squad-name-text">{{$mvpPlayer[1]->player->name}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- TOP FRAGGERS -->
            <div class="container background-url animate__animated animate__fadeIn ">
                <div class="d-flex justify-content-center pt-2">
                    <h1 class="text-center header-bold display-3 margin-top primary-font-color"> TOP FRAGGERS</h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg" style="width:33rem;">
                        <h2 class="text-center secondary-font-color">{{$round->name}}-{{$round->tagLine}}</h2>
                    </div>
                </div>
                <div class="row justify-content-between mt-5">
                    <!-- valuable player card -->
                    <div class="col-4 ml-2">
                        <div class="border-1 row2nd fourth-bg clip-path">
                            <div class="bg-1 fourth-bg row2nd">
                                <div class="border-2 fourth-bg clip-path row2nd">
                                    <div class="bg-2 primary-bg">
                                        <div class="animate__animated animate__fadeIn animate__delay-3s">
                                            <div class="card-head primary-bg">
                                                <div class="row cont1 primary-bg animate__animated animate__fadeInLeft animate__delay-1s">
                                                    <p class="rank1 ml-3 primary-font-color">#1</p>
                                                    @if ($mvpPlayer[0]->player->photoURL)
                                                    <img src="{{ $mvpPlayer[0]->player->photoURL }}" class="player-img  animate__animated animate__fadeIn animate__delay-4s" alt="team player image">
                                                    @else
                                                    <img src="{{ asset('pubg/character/char1.png') }}" class="player-img  animate__animated animate__fadeIn animate__delay-4s">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row card-body player-info d-flex  secondary-bg">
                                                <div class="col-3">
                                                    <img src="{{ $mvpPlayer[0]->team->logoURL }}" class="team-logo" alt="logo image">
                                                </div>
                                                <div class="col-9 col text-center">
                                                    <h2 class="text-start primary-font-color team-name" style="font-size: 35px;">{{ $mvpPlayer[0]->player->name }}</h2>
                                                    <h4 class="display-5 text-start secondary-font-color">{{ $mvpPlayer[0]->team->name }}</h4>
                                                </div>
                                            </div>
                                            <div class="card-footer player-info row pt-3 primary-bg">
                                                <div class="col-6 mt-3 mb-3">
                                                    <h2 class="d-flext align-items-center text-center secondary-font-color">{{ $mvpPlayer[0]->totalKill }}
                                                    </h2>
                                                </div>
                                                <div class="col-6 mt-3 mb-3">
                                                    @if(@$mvpPlayer[0]->gamePlayed!=0)
                                                    <h2 class="d-flext align-items-center ml-2 text-center secondary-font-color">{{ round($mvpPlayer[0]->totalKill/$mvpPlayer[0]->gamePlayed,2) }}</h2>
                                                    @else
                                                    <h2 class="d-flext align-items-center ml-2 text-center secondary-font-color">{{ round($mvpPlayer[0]->totalKill,2) }}</h2>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center row secondary-bg">
                                                <div class="col-6 mt-3 mb-3">
                                                    <h3 class="display-6 text-center top-player-size primary-font-color">TOTAL KILL</h3>
                                                </div>
                                                <div class="col-6 mt-3 mb-3">
                                                    <h3 class="display-6 text-center top-player-size primary-font-color">KPM</h3>
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
                    <div class="col-md-7 col-lg-7 colrank2 animate__animated animate__fadeInRight animate__delay-2s mr-4">
                        @foreach ($mvpPlayer as $player)
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
                                        <img src="{{ $player->team->logoURL }}" alt="" class="fragger-team-logo">
                                    </div>
                                    <div class="col-6">
                                        <span class="primary-font-color" style="font-size: 20px;">{{ $player->player->name }}</span> <br>
                                        <span class="secondary-font-color" style="font-size: 15px;">{{ $player->team->tag }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-5 colrank23 py-1 secondary-color">
                                <div class="row">
                                    <div class="col-5 text-bold d-flex">
                                        <h3 class="player-actions pt-2 primary-font-color">ELIMS</h3>
                                        <h2 class=" secondary-font-color display-5 ml-2">{{ $player->totalKill }}</h2>
                                    </div>
                                    <div class="col-7 d-flex">
                                        <h3r class="player-actions pt-2 primary-font-color" style="margin-left: 16px;">KPM</h3r>
                                        @if($player->gamePlayed == 0)
                                        <h2 class="secondary-font-color display-5 ml-2">{{$player->totalKill}}</h2>
                                        @else
                                        <h2 class="secondary-font-color display-5 ml-2">{{ round($player->totalKill/$player->gamePlayed,1) }}</h2>
                                        @endif
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
            <br>
            <!-- WINNER TEAM -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h2 class="text-center margin-top primary-font-color"> {{$singleTournament[0]->name}}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg" style="width:33rem;">
                        <h1 class="text-center header-bold secondary-font-color">CHAMPIONS</h1>
                    </div>
                </div>

                <!-- champions frame section -->
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <!-- <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; left: 350px;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; left: 155px;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; z-index: 11;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; right: 150px; z-index: 1;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; right: 350px;"> -->
                            @if($teams[0]->team->teamPhotoURL)
                            <img src="{{$teams[0]->team->teamPhotoURL}}" alt="team photo">
                            @else
                            <img src="{{$teams[0]->team->logoURL}}" alt="">
                            @endif
                        </div>
                        <div class="col-12 d-flex secondary-bg pt-3">

                            <div class="row d-flex justify-content-center">
                                <img src="{{$teams[0]->team->logoURL}}" alt="top fragger logo" class="logo-frag-image animate__animated animate__backInRight animate__delay-1s" style="height: 90px; float: right;">
                                <h1 style="margin-left: 160px;">{{$teams[0]->team->name}}</h1>
                            </div>

                        </div>
                        <div class="col-12 d-flex justify-content-center pt-3">
                            <div class="col-2">
                                <h2 class="m-0 display-3 text-center rest-kills-h">MATCHES</h2>
                                <h1 class="m-0 text-center">{{$teams[0]->gamePlayed??0}}</h1>
                            </div>
                            <div class="col-2">
                                <h2 class="m-0 display-3 text-center rest-kills-h"> WWCD</h3>
                                    <h1 class="m-0 text-center">{{$teams[0]->totalWin??0}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h">PLACE POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[0]->placePoint??0}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h text-center">KILL POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[0]->totalkill}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h text-center">TOTAL POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[0]->totalPoint}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- 1st Runner up -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h2 class="text-center margin-top primary-font-color"> {{$singleTournament[0]->name}}</h2>
                </div>
                <div class=" d-flex justify-content-center">
                    <div class="primary-bg" style="width:45rem;">
                        <h1 class="secondary-font-color text-center">1st runner up</h1>
                    </div>
                </div>

                <!-- 1st runnerup frame section -->
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <!-- <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; left: 350px;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; left: 155px;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; z-index: 11;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; right: 150px; z-index: 1;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; right: 350px;"> -->
                            @if($teams[1]->team->teamPhotoURL)
                            <img src="{{$teams[1]->team->teamPhotoURL}}" alt="team photo">
                            @else
                            <img src="{{$teams[1]->team->logoURL}}" alt="">
                            @endif
                        </div>
                        <div class="col-12 d-flex secondary-bg pt-3">
                            <div class="row d-flex justify-content-center">
                                <img src="{{$teams[1]->team->logoURL}}" alt="top fragger logo" class="logo-frag-image animate__animated animate__backInRight animate__delay-1s" style="height: 90px; float: right;">
                                <h1 style="margin-left: 160px;">{{$teams[1]->team->name}}</h1>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center pt-3">
                            <div class="col-2">
                                <h2 class="m-0 display-3 text-center rest-kills-h">MATCHES</h2>
                                <h1 class="m-0 text-center">{{$teams[1]->gamePlayed??0}}</h1>
                            </div>
                            <div class="col-2">
                                <h2 class="m-0 display-3 text-center rest-kills-h"> WWCD</h3>
                                    <h1 class="m-0 text-center">{{$teams[1]->totalWin??0}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h">PLACE POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[1]->placePoint??0}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h text-center">KILL POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[1]->totalkill}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h text-center">TOTAL POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[1]->totalPoint}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- 2nd Runner Up -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h2 class="text-center margin-top primary-font-color"> {{$singleTournament[0]->name}}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg" style="width:45rem;">
                        <h1 class="secondary-font-color text-center">2nd runner up</h1>
                    </div>
                </div>

                <!-- 2nd runnerup frame section -->
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <!-- <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; left: 350px;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; left: 155px;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; z-index: 11;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; right: 150px; z-index: 1;">
                            <img src="https://media.discordapp.net/attachments/909246609831890994/920483133550366720/zyol.png" alt="top player image" class="player-frag-image animate__animated animate__backInDown animate__delay-1s" style="height: 550px; position: relative; right: 350px;"> -->
                            @if($teams[2]->team->teamPhotoURL)
                            <img src="{{$teams[2]->team->teamPhotoURL}}" alt="team photo">
                            @else
                            <img src="{{$teams[2]->team->logoURL}}" alt="">
                            @endif
                        </div>
                        <div class="col-12 d-flex secondary-bg pt-3">
                            <div class="row d-flex justify-content-center">
                                <img src="{{$teams[2]->team->logoURL}}" alt="top fragger logo" class="logo-frag-image animate__animated animate__backInRight animate__delay-1s" style="height: 90px; float: right;">
                                <h1 style="margin-left: 160px;">{{$teams[2]->team->name}}</h1>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center pt-3">
                            <div class="col-2">
                                <h2 class="m-0 display-3 text-center rest-kills-h">MATCHES</h2>
                                <h1 class="m-0 text-center">{{$teams[2]->gamePlayed??0}}</h1>
                            </div>
                            <div class="col-2">
                                <h2 class="m-0 display-3 text-center rest-kills-h"> WWCD</h3>
                                    <h1 class="m-0 text-center">{{$teams[2]->totalWin??0}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h">PLACE POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[2]->placePoint??0}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h text-center">KILL POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[2]->totalkill}}</h1>
                            </div>
                            <div class="col-2">
                                <div class="row d-flex justify-content-center">
                                    <h2 class="m-0 display-3 text-center rest-kills-h text-center">TOTAL POINTS</h2>
                                </div>
                                <h1 class="m-0 text-center">{{$teams[2]->totalPoint}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <!-- top Fraggers -->
            <div class="container background-url">
                <div class="d-flex justify-content-center pt-2">
                    <h2 class="text-center margin-top primary-font-color"> {{$singleTournament[0]->name}}</h2>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="primary-bg mb-2" style="width: 45rem;">
                        <h1 class="secondary-font-color text-center">TOP FRAGGER</h1>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="col-5">
                        <div class="border-1 fourth-bg clip-path">
                            <div class="bg-1 fourth-bg">
                                <div class="border-2 fourth-bg clip-path">
                                    <div class="bg-2 primary-bg">
                                        <div class="animate__animated animate__fadeIn animate__delay-3s">
                                            <div class="card-head primary-bg">
                                                <div class="row cont1 primary-bg animate__animated animate__fadeInLeft animate__delay-1s">
                                                    <h1 class="rank-1 ml-3 primary-font-color">#1</h1>
                                                    @if ($mvpPlayer[0]->player->photoURL)
                                                    <img src="{{ $mvpPlayer[0]->player->photoURL }}" class="player-img  animate__animated animate__fadeIn animate__delay-4s" alt="team player image" style="left:-10px;height:27rem;">
                                                    @else
                                                    <img src="{{ asset('pubg/character/char1.png') }}" class="player-img  animate__animated animate__fadeIn animate__delay-4s" style="left: -10px;height: 27rem;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class=" row card-body player-info d-flex secondary-bg">
                                                <div class="col-3">
                                                    <img src="{{ $mvpPlayer[0]->team->logoURL }}" class="team-logo" alt="logo image">
                                                </div>
                                                <div class="col-9 col text-center">
                                                    <h2 class="display-3 text-start primary-font-color team-name" style="font-size: 45px;">{{ $mvpPlayer[0]->player->name }}</h2>
                                                    <h3 class="text-start secondary-font-color" style="font-size: 28px;">{{ $mvpPlayer[0]->team->name }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- statistics table -->
                    <div class="col-7 mb-3">
                        <table class="table table-lg table-borderless align-middle mb-0 bg-transparent">
                            <thead class="primary-bg">
                                <tr class="primary-bg">
                                    <th colspan="2">
                                        <h1 class="display-3 pt-2 text-center primary-font-color" style="font-size: 60px;">PLAYER STATISTICS</h1>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="player-img animate__animated animate__fadeIn animate__delay-3s">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mt-3 ml-5">
                                                <h1 class="display-4 fw-bold mb-1 primary-font-color">KILLS </h1>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h1 class=" display-4 fw-normal secondary-font-color mt-3">{{ $mvpPlayer[0]->kill }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mt-3 ml-5">
                                                <h1 class="display-4 fw-bold mb-1 primary-font-color">CONTRIBUTION</h1>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h1 class=" display-4 fw-normal secondary-font-color mt-3">{{ round($mvpPlayer[0]->contribution,1) }}%
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mt-3 ml-5">
                                                <h2 class="display-4 fw-bold mb-1 primary-font-color">OVERALL KILLS</h2>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h1 class=" display-4 fw-normal secondary-font-color mt-3">{{ $mvpPlayer[0]->totalKill }}</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mt-3 ml-5">
                                                <h1 class="display-4 fw-bold mb-1 primary-font-color">OVERALL RANK </h1>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h1 class=" display-4 fw-normal secondary-font-color mt-3">#{{ $mvpPlayer[0]->rank }}</h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
    </section>

    @push('scripts')
    <script>
        $('#tournament').on('change', function(e) {
            var tournmanet_id = e.target.value;

            $.ajax({
                url: "{{ url('/searchRound') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    tournmanet_id: tournmanet_id
                },
                success: function(data) {
                    $('#round').empty();
                    $('#round').append('<option value="">Select Round </option>');
                    $.map(data.rounds, function(rounds, index) {
                        $('#round').append('<option value="' +
                            rounds.id +
                            '">' +
                            rounds.name + '</option>');
                    })
                }
            })
        });
        $('#round').on('change', function(e) {
            var round_id = e.target.value;
            $.ajax({
                url: "{{ url('/searchMatch') }}",
                type: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    round_id: round_id,
                },
                success: function(data) {
                    $('#match').empty();
                    $('#match').append('<option value="">Select Match </option>');
                    $.map(data.matches, function(matches, index) {
                        $('#match').append('<option value="' +
                            matches.id +
                            '">' +
                            matches.name + '</option>');
                    })
                }
            })
        });
    </script>
    @endpush
</x-new-master-layout>