{{--<div class="col-1 bg-dark relative animate__animated animate__fadeInLeft animate__delay-1s">
    <div class="row justify-content-center align-items-center ">

        <img src="https://fepems.herokuapp.com/assets/players/characters/char1.png" class="player animate__animated animate__fadeInLeft animate__delay-4-2s" alt="">

    </div>
</div>
<div class="col-3" style="margin-left: -15px;">
    <div class="col primary-bg d-flex justify-content-center align-items-center size mb-1 animate__animated animate__fadeInRight animate__delay-1s">
        <span class="secondary-font-color">
            first BLood-11 KILLS
        </span>
    </div>
    <div class="col secondary-bg d-flex align-items-center size animate__animated animate__fadeInLeft animate__delay-1s">
        <div class="col-2 bg-dark " style="    height: 3pc;    margin-left: -15px;">
            <img src="https://media.discordapp.net/attachments/937454518738776074/937956118603395112/newFTLogoTransparentNoText.png" class="animate__animated animate__fadeInLeft animate__delay-2s" alt="">
        </div>
        <div class="col-8 secondary-bg text-center align-items-center">
            <span class="primary-font-color">
                Gurung
            </span>
        </div>
    </div>

</div>--}}

<div class="col-1 bg-dark relative animate__animated animate__fadeInLeft animate__delay-1s">
    <div class="row justify-content-center align-items-center ">
        @if($request['player_image'])
        <img src="{{$request['player_image']}}" class="player animate__animated animate__fadeInLeft animate__delay-4-2s" alt="">
        @else
        <img src="{{asset('pubg/character/char1.png')}}" class="player animate__animated animate__fadeInLeft animate__delay-4-2s" alt="">
        @endif
    </div>
</div>
<div class="col-3" style="margin-left: -15px;">
    <div class="col primary-bg d-flex justify-content-center align-items-center size mb-1 animate__animated animate__fadeInRight animate__delay-1s">
        <span class="secondary-font-color">
            @if(!$request['kill'])
            {{$request['message']}}
            @else
            {{$request['message']}}-{{$request['kill']}} KILLS
            @endif
        </span>
    </div>
    <div class="col secondary-bg d-flex align-items-center size animate__animated animate__fadeInLeft animate__delay-1s">
        <div class="col-2 bg-dark " style="    height: 3pc;    margin-left: -15px;">
            <img src=" {{$request['team_image']}}" class="animate__animated animate__fadeInLeft animate__delay-2s" alt="">
        </div>
        <div class="col-8 text-center align-items-center secondary-bg">
            <span class="primary-font-color">
                {{$request['name']}}
            </span>
        </div>
    </div>

</div>