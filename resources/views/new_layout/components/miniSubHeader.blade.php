<div class="container-fluid d-flex flex-row justify-content-start row row4">
    <button class="btn ml-1 mb-2 btn-primary" onclick=" ResultPusher('chicken','{{ $round->id }}')">WWCD</button>
    <button class="btn ml-1 mb-2   btn-primary" onclick=" ResultPusher('liveResult','{{ $round->id }}')">MATCH Result</button>
    <button class="btn ml-1 mb-2 btn-primary" onclick="ResultPusher('soloMVP','{{ $round->id }}')">Solo MVP</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('MPH2H','{{ $round->id }}')">MATCH PLAYER H2H</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('MTH2H2','{{ $round->id }}')">MATCH TEAM H2H</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('matchMVP','{{ $round->id }}')">Match MVP</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('overallLiveResult','{{ $round->id }}',1)">Overall Live Result
        1</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('overallLiveResult','{{ $round->id }}',2)">Overall Live Result
        2</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('overallLiveResult','{{ $round->id }}',3)">Overall Live Result
        3</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('overallLiveResult','{{ $round->id }}',4)">Overall Live Result
        4</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('overallLiveResult','{{ $round->id }}',5)">Overall Live Result
        5</button>

    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('overallMVP','{{ $round->id }}')">Overall MVP</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('PH2H','{{ $round->id }}')">PLAYER H2H</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('TH2H','{{ $round->id }}')">TEAM H2H</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('Schedule','{{ $round->id }}')">Schedule</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('graph','{{ $round->id }}')">PLACE VS KILLS</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('winner','{{ $round->id }}')">WINNER</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('runnerUp','{{ $round->id }}')">1ST RUNNER UP</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('secondRunnerUp','{{ $round->id }}')">2ND RUNNER UP</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="ResultPusher('overallSoloMVP','{{ $round->id }}')">TOURNAMENT MVP</button>
</div>