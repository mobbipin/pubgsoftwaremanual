<x-new-master-layout :round="$round" :tournament="$singleTournament">
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    <section>
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
        <!-- Prize pool 1 -->
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
                                <h5 class="primary-font-color">RANK PRIZE </h5>
                            </div>
                            <div class="col">
                                <h5 class="primary-font-color">WWCD</h5>
                            </div>
                            <div class="col">
                                <h5 class="primary-font-color">TOTAL PRIZE WON</h5>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($first_row as $team )
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
                                <h3 class="secondary-font-color text-center mt-3">{{@$team->totalPlayed??0}}</h3>
                            </div>
                            <div class="col matches">
                                <h3 class="secondary-font-color text-center mt-3">{{@$team->Prize($team->rank,$round->id)/1000}}K</h3>
                            </div>
                            <div class="col matches">
                                <h3 class="secondary-font-color text-center mt-3">{{(@$team->totalWin*$team->WWCPRIZE($round->id))/1000}}K</h3>
                            </div>
                            <div class="col matches">
                                <h3 class="secondary-font-color text-center mt-3">{{(@$team->Prize($team->rank,$round->id)+@$team->totalWin*$team->WWCPRIZE($round->id))/1000}}K</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <br>



        <!-- Prize pool 2 -->

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
                                <h5 class="primary-font-color">RANK PRIZE </h5>
                            </div>
                            <div class="col">
                                <h5 class="primary-font-color">WWCD</h5>
                            </div>
                            <div class="col">
                                <h5 class="primary-font-color">TOTAL PRIZE WON</h5>
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
                                <h3 class="secondary-font-color text-center mt-3">{{@$team->totalPlayed??0}}</h3>
                            </div>
                            <div class="col matches">
                                <h3 class="secondary-font-color text-center mt-3">{{@$team->Prize($team->rank,$round->id)/1000}}K</h3>
                            </div>
                            <div class="col matches">
                                <h3 class="secondary-font-color text-center mt-3">{{(@$team->totalWin*$team->WWCPRIZE($round->id))/1000}}K</h3>
                            </div>
                            <div class="col matches">
                                <h3 class="secondary-font-color text-center mt-3">{{(@$team->Prize($team->rank,$round->id)+@$team->totalWin*$team->WWCPRIZE($round->id))/1000}}K</h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-new-master-layout>