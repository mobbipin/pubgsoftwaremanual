<style>
    /* .frame-height {
        position: relative;
        overflow: hidden !important;
        height: 970px !important;
        width: 1640px !important;
        outline: none;
        border: none;
        background: #8cb736;
    } */

    .barcontainer {
        position: relative;
        width: 80%;
        margin: 0 auto;
        min-height: 25vw;
        max-height: 50vw;
        min-width: 40%;
        max-width: 60%;
        z-index: 1;
    }

    .barcontainerheader {
        display: inline;
        position: absolute;
        width: 100%;
        padding-top: 3px;
        padding-bottom: 3px;
        font-size: 1.5em;
        color: white;
        text-align: center;
        text-shadow: 2px 2px 0 black;
        z-index: 0;
        float: right;
    }

    .bar {
        position: relative;
        display: inline-block;
        bottom: 0;
        border: 1px solid;
        border-radius: 6px 6px 0 0;
        background: #663399;
        width: 45px;
        text-align: center;
        color: white;
        text-shadow: 1px 1px 0 black;
        box-shadow: 4px 0 8px #888;
    }

    .upper-bar {
        display: inline-block;
        transform: rotate(180deg);
        border: 1px solid;
        border-radius: 6px 6px 0 0;
        background: red;
        width: 45px;
        text-align: center;
        color: white;
        text-shadow: 1px 1px 0 black;
        box-shadow: 4px 0 8px #888
    }

    .middle-bar {
        display: inline-block;
        transform: rotate(180deg);
        border: 1px solid;
        border-radius: 6px 6px 0 0;
        width: 45px;
        text-align: center;
        color: white;
        text-shadow: 1px 1px 0;
    }

    .barlabel {
        position: absolute;
        bottom: 0;
        width: 100%;
        transform: rotate(180deg);
    }

    .barlabel-down {
        position: absolute;
        width: 100%;
        transform: rotate(180deg);

    }

    .upper-row {
        position: relative;
        transform: rotate(180deg);
        left: 3px;
        margin-top: 175px;
    }

    .middle-row {
        position: relative;
        left: 122px;
    }

    .down-row {
        position: relative;
        transform: rotate(180deg);
        left: 3px;
        margin-top: -15px;
    }

    .logo {
        height: 30px;
        width: 100%;
    }

    .box {
        height: 20px;
        width: 20px;
        margin-bottom: 15px;
        border: 1px solid black;
    }

    .red {
        background-color: red;
    }

    .blue {
        background-color: #663399;
    }
</style>
<section class="d-flex justify-content-center align-items-center">
    <div class="frame-height">
        <div class='barcontainerheader'>
            <h1 class="primary-font-color">
                MAP RANKING <span class="secondary-font-color" style="font-size:25px">{{$round->liveMatch->map}}</span>
            </h1>
        </div>
        <div class="float-right secondary-font-color" style="margin-top: 7.5rem;">
            <div class="box red"></div>
            <h2>
                kills
            </h2>
            <div class="box blue"></div>
            <h2>
                position
            </h2>
        </div>
        <div class='barcontainer'>

            <div class=" upper-row">
                @foreach($team_stat as $team)
                <div class='upper-bar animate__animated animate__fadeIn animate__delay-2s' style='height: {{$team->position_points}}rem'>
                    {{$team->position_points!=0?$team->position_points:'0'}}

                </div>
                @endforeach
            </div>
            <div class=" middle-row">
                @foreach($team_image as $team)
                <div class='middle-bar animate__animated animate__fadeIn animate__delay-1s' style='height:2rem'>
                    <div class='barlabel'>
                        <img src="{{$team->team->smallLogoURL}}" class="logo" alt="" style="background-color:{{$team->team->color}}">
                    </div>
                </div>
                @endforeach
            </div>
            <div class=" down-row animate__animated animate__fadeIn animate__delay-3s">
                @foreach($team_stat as $team)
                <div class='bar' style='height: {{$team->kill}}rem'>
                    <div class='barlabel-down'>{{$team->kill!=0?$team->kill:''}}</div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>