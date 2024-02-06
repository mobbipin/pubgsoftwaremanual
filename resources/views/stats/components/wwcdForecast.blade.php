{{-- WWCD Forcast --}}
<table class="table secondary-bg-gd fourth-color table-sm table-border">
    <thead>
        <tr class="primary-bg-gd">
            <th colspan="2" class="col-lg-12 text-center ml-5 h4 text-uppercase primary-bg-gd fourth-color table-border-bottom">
                <h3 class="display-5 m-0 primary-font-color"> WWCD ForeCast</h3>
            </th>
        </tr>
    </thead>
    <tbody class="primary-bg fourth-color table-border-bottom table-border-right">
        @foreach ($team_stat as $team)
        @if(!$team->dead)
        <tr class="table-border-bottom table-border-right">
            <th scope="row">
                <div class="d-flex">
                    <img src="{{$team->team->logoURL}}" height="20px" width="50px" class="secondary-bg glass-curved-border" alt="">
                    <h4 class="ml-1 mt-3 secondary-font-color">{{$team->team->name}}</h4>
                </div>
            </th>
            <td class="text-center secondary-font-color" style="padding-top: 17px; font-weight:bold">{{round(($match->playerAlive($team->id))/$total_alive*100, 2)}}%</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        if ('{{$totalAliveTeams}}' > 5) {
            $('.liveGameResult1').show();
            $('.liveGameResult2').hide();
        } else {
            $('.liveGameResult2').show();
            $('.liveGameResult1').hide();
        }
        $('#totalAlivePlayers').val('{{$totalAlivePlayers}}');
        $('#totalAliveTeams').val('{{$totalAliveTeams}}');
        $('.show').html('Alive: {{$totalAlivePlayers}} -- Team: {{$totalAliveTeams}}');
    });
</script>