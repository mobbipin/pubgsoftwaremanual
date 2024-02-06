<!-- alive with kills -->
<table class="table secondary-bg fourth-color table-sm table-border">
    <thead>
        <tr class="primary-bg-gd">
            <th colspan="3" class="col-lg-12 text-center ml-5 h4">
                <h3 class="display-5 m-0 primary-font-color">Alive Kills</h3>
            </th>
        </tr>
        <tr class="secondary-bg fourth-color table-border-top table-border-bottom">
            <th scope="col p-0">
                <h5 class="m-0 text-center">#</h5>
            </th>
            <th scope="col">
                <h5 class="text-right m-0">Team</h5>
            </th>
            <th scope="col">
                <h5 class="m-0 text-center">Kills</h5>
            </th>
        </tr>
    </thead>
    <tbody class="primary-bg fourth-color table-border-bottom table-border-right table-border-right">
        @foreach ($team_stat->take(5) as $team)
        @if (!$team->dead)
        <tr class="table-border-bottom table-border-right">
            <th scope="row">
                <div class="">
                    <img src="{{$team->team->smallLogoURL}}" height="50px" width="60px" alt="" class="secondary-bg shiny-border-right shiny-border ml-1 glass-curved-border">
                    <h6 class="text-start mt-1 ml-1 mt-2 secondary-font-color">{{$team->team->name}}</h6>
                </div>
            </th>
            <td colspan="2" class="text-center">
                @foreach ($team->PlayerStatement->sortby('dead') as $player)
                <div class="row">
                    <div class="col d-flex justify-content-around alive-kills-players-list">
                        <div class="col-lg-2">
                            @if ($player->dead)
                            <h4 class="mt-1 secondary-dark-color text-dark">{{$player->player->name}}</h4>
                            @else
                            <h4 class="mt-1 secondary-font-color">{{$player->player->name}}</h4>
                            @endif
                        </div>
                        <div class="col-lg-2">
                            @if ($player->dead)
                            <h4 class="text-start ml-1 mr-3 mt-1 secondary-font-color text-dark">{{$player->kill}}</h4>
                            @else
                            <h4 class="text-start ml-1 mr-3 mt-1 secondary-dark-color ">{{$player->kill}}</h4>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        if ("{{$totalAliveTeams}}" > 5) {
            $('.liveGameResult1').show()
            $('.liveGameResult2').hide()
        } else {
            $('.liveGameResult2').show()
            $('.liveGameResult1').hide()
        }
        $('#totalAlivePlayers').val("{{$totalAlivePlayers}}");
        $('#totalAliveTeams').val("{{$totalAliveTeams}}");
        $('.show').html('Alive: {{$totalAlivePlayers}} -- Team: {{$totalAliveTeams}}');
    });
</script>