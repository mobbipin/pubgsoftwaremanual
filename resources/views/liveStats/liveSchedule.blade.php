<style>
    .heading1 {
        color: white;
        font-size: 50px;
        font-weight: bolder;
        padding-top: 20px;
        margin-left: 15px
    }

    .span1 {
        color: #333;
        font-size: 30px;
        /* background-image: linear-gradient(to right, rgb(3, 3, 121), rgb(3, 3, 36)) */
    }

    .card {
        margin-right: 5px;
        margin-bottom: 20px;
        border-radius: 6px;
        border: 1px solid rgb(3, 3, 121);
    }

    .card-header {
        text-align: center;
        font-size: 40px;
        font-weight: bolder;
        color: white;
    }

    .img123 {
        z-index: 1;
        position: absolute;
        height: 420px !important;
        text-align: center;
        /* background-image: url(/images/cover.jpg); */
        background-size: cover;
        width: 100%;
        background-repeat: no-repeat;
        font-size: 32px;
    }

    .img456 {
        z-index: 9;
        position: absolute;
        height: 423px;
        width: 100%;
        color: white;
        text-align: center;
        font-size: 36px;
    }

    .img456 p {
        padding-top: 50px;
    }

    .totalkills {
        position: relative;
        font-size: 12px;
        bottom: 35px;
    }

    .image {
        height: 120px;
        /* width: 125px; */
    }

    .divrow,
    .countrow {
        justify-content: center;
    }

    .divcol {
        background-color: rgb(3, 3, 121);
    }

    .countcol {
        background-color: rgb(3, 3, 121);
        font-size: 21px;
    }

    .card-text {
        margin-top: 423px;
        z-index: 9;
        text-align: center;
        font-size: 22px;
        font-weight: bold;
        color: white;
        background-color: rgb(3, 3, 121);
    }

    .match-row {
        margin-top: 100px;
    }
</style>

<section class="d-flex justify-content-center align-items-center">

    <div class="frame-height animate__animated animate__backInDown">
        <h1 class="mt-5 text-center third-color-border">
            DAY SUMMARY <span class="span1 font-weight-bold third-color-border">{{$round->name}} - {{$round->subname}}</span>
        </h1>
        <div class="row d-flex justify-content-between match-row">
            @if($schedule->first_match_id)
            <div class="col-md-2 col-md-2 animate__animated animate__backInDown animate__delay-2s">
                <div class="card primary-bg">
                    <p class="card-header text-uppercase">{{$schedule->match1->name}}</p>
                    <div class="">
                        @php
                        $chickend1=$schedule->match1->chicken_dinner($schedule->match1->id)
                        @endphp
                        <div class="img123" style="background-image: url('{{@$schedule->match1->map_name->imageUrl}}');">
                            <p class="text-white">{{@$schedule->match1->time}}</p>
                        </div>
                        <div class="img456" style="background:linear-gradient(0deg, {{@$chickend1->team->color}} 30%, rgba(3, 3, 34, 0) 70%, rgba(3, 3, 34, 0) 100%); ">
                            <div class="">
                                <p class="text-uppercase">
                                    {{@$schedule->match1->map}} <br />
                                    {{@$schedule->match1->subname}}
                                </p>
                                @if(!empty($chickend1))
                                <div class="totalkills">
                                    <img src="{{@$chickend1->team->logoURL}}" alt="" class="mt-2 image" />
                                    <div class="row divrow ">
                                        <div class="col-md-4 divcol p-2 primary-bg">KILLS</div>
                                        <div class="col-md-4 divcol p-2 primary-bg">TOTAL</div>
                                    </div>
                                    <div class="row countrow mt-1">
                                        <div class="col-md-4 countcol me-1 primary-bg"> {{@$chickend1->kill}}</div>
                                        <div class="col-md-4 countcol ml-1 primary-bg">{{@$chickend1->kill+$chickend1->position_points}}</div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(!empty($chickend1))
                    <p class="card-text p-2 primary-bg">{{@$chickend1->team->name}}</p>
                    @else
                    <p class="card-text p-2 primary-bg">{{@$schedule->match1->time}}</p>
                    @endif

                </div>
            </div>
            @endif
            @if($schedule->second_match_id)
            <div class="col-md-2 col-md-2 animate__animated animate__backInDown animate__delay-2s">
                <div class="card primary-bg">
                    <p class="card-header text-uppercase">{{$schedule->match2->name}}</p>
                    <div class="">
                        <div class="img123" style="background-image: url('{{@$schedule->match2->map_name->imageUrl}}');">
                            <p class="text-white">{{@$schedule->match2->time}}</p>
                        </div>
                        @php
                        $chickend1=$schedule->match2->chicken_dinner($schedule->match2->id)
                        @endphp
                        <div class="img456" style="background:linear-gradient(0deg, {{@$chickend1->team->color}} 30%, rgba(3, 3, 34, 0) 70%, rgba(3, 3, 34, 0) 100%); ">
                            <p class="text-uppercase">
                                {{@$schedule->match2->map}} <br />
                                {{@$schedule->match2->subname}}
                            </p>


                            @if(!empty($chickend1))
                            <div class="totalkills">
                                <img src="{{@$chickend1->team->logoURL}}" alt="" class="mt-2 image" />
                                <div class="row divrow">
                                    <div class="col-md-4 divcol p-2 primary-bg">KILLS</div>
                                    <div class="col-md-4 divcol p-2 primary-bg">TOTAL</div>
                                </div>
                                <div class="row countrow mt-1">
                                    <div class="col-md-4 countcol me-1 primary-bg"> {{@$chickend1->kill}}</div>
                                    <div class="col-md-4 countcol ml-1 primary-bg">{{@$chickend1->kill+$chickend1->position_points}}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if(!empty($chickend1))
                    <p class="card-text p-2 primary-bg">{{@$chickend1->team->name}}</p>
                    @else
                    <p class="card-text p-2 primary-bg">{{@$schedule->match2->time}}</p>
                    @endif
                </div>
            </div>
            @endif

            @if($schedule->third_match_id)
            <div class="col-md-2 col-md-2 animate__animated animate__bounceInInLeft animate__delay-2s">
                <div class="card primary-bg">
                    <p class="card-header text-uppercase">{{$schedule->match3->name}}</p>
                    <div class="">
                        <div class="img123" style="background-image: url('{{@$schedule->match3->map_name->imageUrl}}');">
                            <p class="text-white">{{@$schedule->match3->time}}</p>
                        </div>
                        @php
                        $chickend1=$schedule->match3->chicken_dinner($schedule->match3->id)
                        @endphp
                        <div class="img456" style=" background:linear-gradient(0deg, {{@$chickend1->team->color}} 30%, rgba(3, 3, 34, 0) 70%, rgba(3, 3, 34, 0) 100%); ">
                            <p class="text-uppercase">
                                {{@$schedule->match3->map}} <br />
                                {{@$schedule->match3->subname}}
                            </p>

                            @if(!empty($chickend1))
                            <div class="totalkills ">
                                <img src="{{@$chickend1->team->logoURL}}" alt="" class="mt-2 image" />
                                <div class="row divrow">
                                    <div class="col-md-4 divcol p-2 primary-bg">KILLS</div>
                                    <div class="col-md-4 divcol p-2 primary-bg">TOTAL</div>
                                </div>
                                <div class="row countrow mt-1">
                                    <div class="col-md-4 countcol me-1 primary-bg"> {{@$chickend1->kill}}</div>
                                    <div class="col-md-4 countcol ml-1 primary-bg">{{@$chickend1->kill+$chickend1->position_points}}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if(!empty($chickend1))
                    <p class="card-text p-2 primary-bg">{{@$chickend1->team->name}}</p>
                    @else
                    <p class="card-text p-2 primary-bg">{{@$schedule->match3->time}}</p>
                    @endif

                </div>
            </div>
            @endif
            @if($schedule->fourth_match_id)
            <div class="col-md-2 animate__animated animate__backInDown animate__delay-1s">
                <div class="card primary-bg">
                    <p class="card-header text-uppercase">{{$schedule->match4->name}}</p>
                    <div class="">
                        <div class="img123" style="background-image: url('{{@$schedule->match4->map_name->imageUrl}}');">
                            <p class="text-white">{{@$schedule->match4->time}}</p>
                        </div>
                        @php
                        $chickend1=$schedule->match4->chicken_dinner($schedule->match4->id)
                        @endphp
                        <div class="img456" style="background:linear-gradient(0deg, {{@$chickend1->team->color}} 30%, rgba(3, 3, 34, 0) 70%, rgba(3, 3, 34, 0) 100%); ">
                            <p class="text-uppercase">
                                {{@$schedule->match4->map}} <br />
                                {{@$schedule->match4->subname}}
                            </p>

                            @if(!empty($chickend1))
                            <div class=" totalkills">
                                <img src="{{@$chickend1->team->logoURL}}" alt="" class="mt-2 image" />
                                <div class="row divrow">
                                    <div class="col-md-4 divcol p-2 primary-bg">KILLS</div>
                                    <div class="col-md-4 divcol p-2 primary-bg">TOTAL</div>
                                </div>
                                <div class="row countrow mt-1">
                                    <div class="col-md-4 countcol me-1 primary-bg"> {{@$chickend1->kill}}</div>
                                    <div class="col-md-4 countcol ml-1 primary-bg">{{@$chickend1->kill+$chickend1->position_points}}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if(!empty($chickend1))
                    <p class="card-text p-2 primary-bg">{{@$chickend1->team->name}}</p>
                    @else
                    <p class="card-text p-2 primary-bg">{{@$schedule->match4->time}}</p>
                    @endif

                </div>
            </div>
            @endif
            @if($schedule->fifth_match_id)
            <div class="col-md-2 col-md-2 animate__animated animate__backInDown animate__delay-2s">
                <div class="card primary-bg">
                    <p class="card-header text-uppercase">{{$schedule->match5->name}}</p>
                    <div class="">
                        <div class="img123" style="background-image: url('{{@$schedule->match5->map_name->imageUrl}}');">
                            <p class="text-white">{{@$schedule->match5->time}}</p>
                        </div>
                        @php
                        $chickend1=$schedule->match5->chicken_dinner($schedule->match5->id)
                        @endphp
                        <div class="img456" style="background:linear-gradient(0deg, {{@$chickend1->team->color}} 30%, rgba(3, 3, 34, 0) 70%, rgba(3, 3, 34, 0) 100%); ">
                            <p class="text-uppercase">
                                {{@$schedule->match5->map}} <br />
                                {{@$schedule->match5->subname}}
                            </p>

                            @if(!empty($chickend1))
                            <div class="totalkills ">
                                <img src="{{@$chickend1->team->logoURL}}" alt="" class="mt-2 image" />
                                <div class="row divrow">
                                    <div class="col-md-4 divcol p-2 primary-bg">KILLS</div>
                                    <div class="col-md-4 divcol p-2 primary-bg">TOTAL</div>
                                </div>
                                <div class="row countrow mt-1">
                                    <div class="col-md-4 countcol me-1 primary-bg"> {{@$chickend1->kill}}</div>
                                    <div class="col-md-4 countcol ml-1 primary-bg">{{@$chickend1->kill+$chickend1->position_points}}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if(!empty($chickend1))
                    <p class="card-text p-2 primary-bg">{{@$chickend1->team->name}}</p>
                    @else
                    <p class="card-text p-2 primary-bg">{{@$schedule->match5->time}}</p>
                    @endif

                </div>
            </div>
            @endif
            @if($schedule->sixth_match_id)
            <div class="col-md-2 col-md-2 animate__animated animate__backInDown animate__delay-2s">
                <div class="card primary-bg">
                    <p class="card-header text-uppercase">{{$schedule->match6->name}}</p>
                    <div class="">
                        <div class="img123" style="background-image: url('{{@$schedule->match6->map_name->imageUrl}}');">
                            <p class="text-white">{{@$schedule->match6->time}}</p>
                        </div>
                        @php
                        $chickend1=$schedule->match6->chicken_dinner($schedule->match6->id)
                        @endphp
                        <div class="img456" style="background:linear-gradient(0deg, {{@$chickend1->team->color}} 30%, rgba(3, 3, 34, 0) 70%, rgba(3, 3, 34, 0) 100%); ">
                            <p class="text-uppercase">
                                {{@$schedule->match6->map}} <br />
                                {{@$schedule->match6->subname}}
                            </p>

                            @if(!empty($chickend1))
                            <div class="totalkills ">
                                <img src="{{@$chickend1->team->logoURL}}" alt="" class="mt-2 image" />
                                <div class="row divrow">
                                    <div class="col-md-4 divcol p-2 primary-bg">KILLS</div>
                                    <div class="col-md-4 divcol p-2 primary-bg">TOTAL</div>
                                </div>
                                <div class="row countrow mt-1">
                                    <div class="col-md-4 countcol me-1 primary-bg"> {{@$chickend1->kill}}</div>
                                    <div class="col-md-4 countcol ml-1 primary-bg">{{@$chickend1->kill+$chickend1->position_points}}</div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @if(!empty($chickend1))
                    <p class="card-text p-2 primary-bg">{{@$chickend1->team->name}}</p>
                    @else
                    <p class="card-text p-2 primary-bg">{{@$schedule->match6->time}}</p>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
