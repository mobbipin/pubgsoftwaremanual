@extends('layout.result.app')
@section('title', 'Result')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/grand-finale/finale.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/liveStats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/liveresult.css') }}">
@endpush
@section('topBase')
    @include('layout.menu')
@stop
@section('content')
    <?php
    // dd($team_stat);
    foreach ($team_stat as $key => $value) {
        if ($value['position'] == 1) {
            $wccd_team = $value;
            $players = $value
                ->playerStat()
                ->where('active', 1)
                ->get();
            $team = $wccd_team->team()->get();
            // dd($team);
            $teamPhotoURL = $team[0]['teamPhotoURL'];
            $logoURL = $team[0]['logoURL'];
            // dd($teamPhotoURL);
        }
        // dd($value);
    }
    ?>
    <div class="container">
        <p class="head1">TEAM STATS <span class="head2">
                {{ App\Models\Matchz::where('id', $wccd_team['match_id'])->get()[0]['name'] }}</span></p>
        <div class="row">
            <div class="col-md-6">
                <p class="head3">WINNER WINNER CHICKEN DINNER</p>
            </div>
            <div class="col-md-6 col4">
                <span class="head4"> <img src="{{ $logoURL }}" alt="" srcset="" class="img1">DRS</span>
            </div>
        </div>
        @foreach ($players as $player)
            <div class="row row5 mb-2">
                <div class="col-md-3 col-lg-3 col51">
                    <div class="fixed-name">
                        <?php
                        echo $player->player()->get()[0]['name'];
                        ?>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col52">
                    <div class="fixed-kill">
                        {{ $player->kill }}
                    </div>
                </div>
            </div>
        @endforeach

        <div class="row row6">
            <div class="col-md-3 col-lg-3">
                <div class="fixed-name2">
                    <p class="para1">Lorem</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="fixed-kill2">
                    <p class="para1">18</p>
                </div>
            </div>
        </div>

        <div class="row row6">
            <div class="col-md-3 col-lg-3">
                <div class="fixed-name2">
                    <p class="para1">Lorem1</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="fixed-kill2">
                    <p class="para1">30</p>
                </div>
            </div>
        </div>

        <div class="row row6">
            <div class="col-md-3 col-lg-3">
                <div class="fixed-name2">
                    <p class="para1">Lorem12</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="fixed-kill2">
                    <p class="para1">176</p>
                </div>
            </div>
        </div>

        <div class="row row6">
            <div class="col-md-3 col-lg-3">
                <div class="fixed-name2">
                    <p class="para1">Lorem123</p>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="fixed-kill2">
                    <p class="para1">#3</p>
                </div>
            </div>
        </div>

    </div>
@stop

@section('scripts')
    <script>
        // $(function() {
        //     $(".animation")
        //         .hide() // hides it first, or style it with 'display: none;' instead
        //         .fadeIn(300) // fades it in
        //         .delay(3260) // (optionally) waits
        //         .fadeOut(300); // (optionally) fades it out
        // });
    </script>
@stop
