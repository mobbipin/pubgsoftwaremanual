<section class="d-flex justify-content-center align-items-center">
    <div class="frame-height">
        <h1 class="third-color-border animate__animated animate__backInDown animate__delay-1s mt-5 text-center">{{$content}}</h1>

        <!-- champions frame section -->
        <div class="row">
            <div class="col d-flex justify-content-center">
                @if($teams->team->teamPhotoURL)
                <img src="{{$teams->team->teamPhotoURL}}" alt="" class="animate__animated animate__backInDown animate__delay-1s text-center" style="height: 27rem;">
                @else
                <img src="{{$teams->team->logoURL}}" class="animate__animated animate__backInDown animate__delay-1s  text-center" alt="">
                @endif
            </div>
            <div class="col-12 d-flex secondary-bg animate__animated animate__backInRight animate__delay-1s">

                <div class="col d-flex justify-content-center">
                    <img src="{{$teams->team->logoURL}}" alt="top fragger logo" class="logo-frag-image animate__animated animate__backInRight animate__delay-1s" style="max-height:200px">
                    <h1 style="margin-left: 160px;margin-top: 50px;" class="primary-font-color animate__animated animate__backInRight animate__delay-1s">{{$teams->team->name}}</h1>
                </div>

            </div>
            <div class="col-12 d-flex justify-content-center pt-3 animate__animated animate__backInUp animate__delay-1s">
                <div class="col-2">
                    <h2 class="m-0  primary-font-color text-center rest-kills-h">MATCHES</h2>
                    <h1 class="m-0 secondary-font-color text-center">{{$teams->totalPlayed??0}}</h1>
                </div>
                <div class="col-2">
                    <h2 class="m-0 primary-font-color text-center rest-kills-h"> WWCD</h3>
                        <h1 class="m-0 secondary-font-color text-center">{{$teams->totalWin??0}}</h1>
                </div>
                <div class="col-2">
                    <div class="row d-flex justify-content-center">
                        <h2 class="m-0 primary-font-color text-center rest-kills-h">PLACE POINTS</h2>
                    </div>
                    <h1 class="m-0  secondary-font-color text-center">{{$teams->placePoint??0}}</h1>
                </div>
                <div class="col-2">
                    <div class="row d-flex justify-content-center">
                        <h2 class="m-0 primary-font-color text-center rest-kills-h text-center">KILL POINTS</h2>
                    </div>
                    <h1 class="m-0 secondary-font-color text-center">{{$teams->totalkill}}</h1>
                </div>
                <div class="col-2">
                    <div class="row d-flex justify-content-center">
                        <h2 class="m-0 primary-font-color text-center rest-kills-h text-center">TOTAL POINTS</h2>
                    </div>
                    <h1 class="m-0 secondary-font-color text-center">{{$teams->totalPoint}}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
