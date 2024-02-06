{{--<div class="col-1">
    <div class="box  d-flex justify-content-center align-items-center animate__animated animate__fadeInLeft animate__delay-2s">

        <h3>#1</h3>

    </div>
</div>
<div class="col-1 bg-dark justify-content-center align-items-center animate__animated animate__fadeInLeft animate__delay-2s">
    <img src="https://media.discordapp.net/attachments/960823960956727326/960824025830027274/b2g_sm.png" class="animate__animated animate__fadeInLeft animate__delay-3s" alt="">
</div>
<div class="col-3" style="margin-left: -15px;">
    <div class="  primary-bg  col   d-flex justify-content-center align-items-center size mb-1 animate__animated animate__fadeInRight animate__delay-2s">
        <span class="secondary-font-color">
        Domination KILLS
        </span>
    </div>
    <div class="col secondary-bg d-flex justify-content-center align-items-center size animate__animated animate__fadeInLeft animate__delay-2s">
        <span class="primary-font-color">
        heell raj
        </span> 
    </div>

</div>--}}


<div class="col-1">
    <div class="box  d-flex justify-content-center align-items-center animate__animated animate__fadeInLeft animate__delay-2s">
        @if($request['position'])
        <h3>#{{$request['position']}}</h3>
        @endif
    </div>
</div>
<div class="col-1 bg-dark justify-content-center align-items-center animate__animated animate__fadeInLeft animate__delay-2s">
    <img src="{{$request['team_image']}}" class="animate__animated animate__fadeInLeft animate__delay-3s" alt="">
</div>
<div class=" col-3" style="margin-left: -15px;">
    <div class="col primary-bg d-flex justify-content-center align-items-center size mb-1 animate__animated animate__fadeInRight animate__delay-2s">
        <span class="secondary-font-color">
            @if($request['kill'])
            {{$request['message']}}-{{$request['kill']}} KILLS
            @else
            {{$request['message']}}
            @endif
        </span>
    </div>
    <div class="col secondary-bg d-flex justify-content-center align-items-center size animate__animated animate__fadeInLeft animate__delay-2s">
        <span class="primary-font-color">
            {{$request['name']}}
        </span>
    </div>

</div>