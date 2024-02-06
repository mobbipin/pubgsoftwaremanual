<style>
    .sm-box {
        height: 10px;
        width: 8px;
        background: #fff;
        display: inline;
        margin: 2px;
    }

    .sm-box-dead {
        height: 10px;
        width: 8px;
        background: #333;
        display: inline;
        margin: 2px;
    }
</style>
<!-- team alive -->
<table class="table secondary-bg fourth-color table-sm table-border">
    <thead>
        <tr class="primary-bg-gd">
            <th colspan="3" class="col-lg-12 text-center ml-5 h4 primary-bg-gd fourth-color table-border-bottom">
                <h3 class="display-5 m-0 primary-font-color">Alive</h3>
            </th>
        </tr>
        <tr class="secondary-bg table-border-bottom">
            <th scope="col p-0">
                <h5 class="m-0">#</h5>
            </th>
            <th scope="col">
                <h5 class="text-center m-0">Team</h5>
            </th>
            <th scope="col">
                <h5 class="m-0 text-center">Points</h5>
            </th>
        </tr>
    </thead>
    <tbody class="primary-bg fourth-color table-border-bottom table-border-right">
        @foreach ($alive_team as $team)
        <tr class="table-border-bottom table-border-right">
            <td class="pt-2 secondary-font-color">
                {{ $team->position > 0 ? $team->position : '' }}
            </td>
            <td scope="row">
                <div class="d-flex">
                    <img src="{{ $team->team->smallLogoURL }}" width="30px" class="secondary-bg glass-curved-border ">
                    <h6 class="ml-1 mt-2 secondary-font-color">{{ $team->team->name }}</h6>
                </div>
            </td>
            <td class="text-center">
                <div class="d-flex">
                    <h4 class="mt-1 ml-2 secondary-font-color mr-2">
                        {{ $team->position_points + $team->kill }}
                    </h4>
                    <?php
                    $players_stat = $team->PlayerStatement->sortBy('dead', SORT_ASC);
                    ?>
                    @foreach ($players_stat as $key => $player)
                    @if ($player->dead)
                    <i class="sm-box-dead mt-2"></i>
                    @else
                    <i class="sm-box mt-2"></i>
                    @endif
                    @endforeach
                </div>
            </td>
        </tr>
        @endforeach
        @foreach ($dead_team as $team)
        <tr class="table-border-bottom table-border-right bg-dark">
            <td class="pt-2 secondary-font-color">
                #{{ $team->position > 0 ? $team->position : '' }}
            </td>
            <td scope="row">
                <div class="d-flex">
                    <img src="{{ $team->team->smallLogoURL }}" width="30px" class="secondary-bg glass-curved-border ">
                    <h6 class="ml-1 mt-2 secondary-font-color">{{ $team->team->name }}</h6>
                </div>
            </td>
            <td class="text-center">
                <div class="d-flex">
                    <h4 class="mt-1 ml-2 secondary-font-color mr-2">
                        {{ $team->position_points + $team->kill }}
                    </h4>
                    <?php
                    $players_stat = $team->PlayerStatement->sortBy('dead', SORT_ASC);
                    ?>
                    @foreach ($players_stat as $key => $player)
                    @if ($player->dead)
                    <i class="sm-box-dead mt-2"></i>
                    @else
                    <i class="sm-box mt-2"></i>
                    @endif
                    @endforeach
                </div>
            </td>
        </tr>
        @endforeach
        @foreach ($not_playing_team as $team)
        <tr class="table-border-bottom table-border-right bg-dark">
            <td class="pt-1 secondary-font-color">-</td>
            <td scope="row">
                <div class="d-flex">
                    <img src="{{ $team->team->smallLogoURL }}" width="30px" class="secondary-bg p-1 pr-2 glass-curved-border">
                    <h6 class="ml-1 mt-2 secondary-font-color">{{ $team->team->name }}</h6>
                </div>
            </td>
            <td class="text-center">
                <div class="d-flex">
                    <h4 class="mt-1 ml-2 secondary-font-color">
                        {{ $team->position_points }}
                    </h4>
                    <?php
                    $players_stat = $team->PlayerStatement->sortbyDesc('dead');
                    ?>
                    @foreach ($players_stat as $key => $player)
                    @if ($player->dead)
                    <i class="sm-box-dead mt-2"></i>
                    @else
                    <i class="sm-box mt-2"></i>
                    @endif
                    @endforeach
                </div>
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