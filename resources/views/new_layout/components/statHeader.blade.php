<div class="container-fluid d-flex flex-row justify-content-start row row4">
    <?php
    if ($totalAliveTeams > 5) {
        $result1 = 'block';
        $result2 = 'none';
    } else {
        $result1 = 'none';
        $result2 = 'block';
    }
    ?>

    <button class="btn ml-1 mb-2  btn-primary liveGameResult1" data-alive="{{ $totalAliveTeams }}" style="display: {{ $result1 }};" onclick="StatPusher('{{ $round->id }}','teamStatAlive')">Live Game
        Results</button>
    <button class="btn ml-1 mb-2  btn-primary liveGameResult2" data-alive="{{ $totalAliveTeams }}" style="display: {{ $result2 }};" onclick="StatPusher('{{ $round->id }}','aliveKills')">Live Game
        Results</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="StatPusher('{{ $round->id }}','liveMatchKill')">Live Match
        Kills</button>
    <button class="btn ml-1 mb-2 btn-primary" onclick="StatPusher('{{ $round->id }}','overallKill')">Live Overal
        Kills</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="StatPusher('{{ $round->id }}','liveRanking',1)">Live Overall
        Result 1</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="StatPusher('{{ $round->id }}','liveRanking',2)">Live Overall
        Result 2</button>
    <button class="btn ml-1 mb-2  btn-primary" onclick="StatPusher('{{ $round->id }}','wwcdForecast')">WWCD
        Forecast</button>
    <button class="btn ml-1 mb-2  btn-danger" onclick="StatPusher('{{ $round->id }}','hideAll')">Hide All</button>
</div>