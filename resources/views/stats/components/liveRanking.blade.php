<!-- Live Ranking -->
<table class="table secondary-bg fourth-color table-sm table-border">
    <thead>
        <tr class="primary-bg-gd">
            <th colspan="3" class="col-lg-12 text-center ml-5 h4 primary-bg-gd fourth-color table-border-bottom">
                <h3 class="display-5 m-0 primary-font-color">Live Ranking</h3>
            </th>
        </tr>
        <tr class="secondary-bg fourth-color table-border-bottom">
            <th scope="col p-0">
                <h5 class="m-0">#</h5>
            </th>
            <th scope="col">
                <h5 class="text-center m-0">Teams</h5>
            </th>
            <th scope="col">
                <h5 class="m-0">PTS</h5>
            </th>
        </tr>
    </thead>
    <tbody class="primary-bg fourth-color table-border-bottom table-border-right">
        @foreach ( $live_ranking as $team )
        <tr class="table-border-bottom table-border-right">
            <td class="pt-2 secondary-font-color">{{$team->rank}}</td>
            <th scope="row">
                <div class="d-flex">
                    <img src="{{ $team->team->smallLogoURL }}" width="27px" alt="" class="secondary-bg glass-curved-border">
                    <h5 class="ml-1 mt-2 secondary-font-color">{{$team->team->name}}</h5>
                </div>
            </th>
            <td class="text-center">
                <h4 class="mt-1 ml-2 secondary-font-color">{{$team->totalPoint}}</h4>
            </td>
        </tr>
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