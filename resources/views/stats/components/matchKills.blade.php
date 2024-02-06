<!-- Match Kills -->
<table class="table primary-bg-gd fourth-color table-sm table-border">
    <thead>
        <tr class="primary-bg-gd">
            <th colspan="3" class="col-lg-12 text-center ml-5 h4 primary-bg-gd fourth-color">
                <h3 class="display-5 m-0 primary-font-color"> Match Kills</h3>
            </th>
        </tr>
        <tr class="secondary-bg fourth-color table-border-bottom table-border-top">
            <th scope="col p-0">
                <h5 class="text-center m-0"> Team</h5>
            </th>
            <th scope="col">
                <h5 class="text-center m-0"> Player</h5>
            </th>
            <th scope="col">
                <h5 class="m-0"> Kills</h5>
            </th>
        </tr>
    </thead>
    <tbody class="table primary-bg fourth-color table-sm table-border-bottom table-border-right">
        @foreach ($match_kills as $player)
        <tr class="table-border-bottom table-border-right">
            <th scope="row">
                <div class="d-flex">
                    <img src="{{$player->team->logoURL}}" height="20px" width="50px" class="secondary-bg glass-curved-border">
                    <h4 class="ml-1 mt-2 secondary-font-color text-center">{{$player->team->name}}</h4>
                </div>
            </th>
            <td class="text-center">
                <h4 class="ml-1 mt-2 secondary-font-color"> {{$player->player->name}} </h4>
            </td>
            <td class="text-center">
                <h4 class="ml-1 mt-2 secondary-font-color"> {{$player->totalKill}}</h4>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <script>
        $(document).ready(function() {
            if({{$totalAliveTeams}}>5)
            {
                $('.liveGameResult1').show()
                $('.liveGameResult2').hide()
            }
            else {
                $('.liveGameResult2').show()
                $('.liveGameResult1').hide()
            }
            $('#totalAlivePlayers').val({{$totalAlivePlayers}});
            $('#totalAliveTeams').val({{$totalAliveTeams}});
            $('.show').html('Alive: {{$totalAlivePlayers}} -- Team: {{$totalAliveTeams}}');
        });
    </script>

