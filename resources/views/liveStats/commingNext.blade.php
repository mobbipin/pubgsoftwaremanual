<x-new-master-layout :round="$round" :tournament="$tournament">
    @auth
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @endauth

    <style>
        * {
            color: #333 !important;
        }

        .next-map-img {
            clip-path: polygon(5% 0, 95% 0, 100% 5%, 100% 95%, 95% 100%, 5% 100%, 0 95%, 0 5%);
            height: 500px;
            width: 500px;
        }

        .match-banner {
            clip-path: polygon(5% 0, 95% 0, 100% 5%, 100% 95%, 95% 100%, 5% 100%, 0 95%, 0 5%);
            height: 280px;
        }

        .match-banner h1,
        h2 {
            font-weight: 800;
        }
    </style>

    <?php
    if ($tournament[0]['thumbnailBgURL']) {
        $url = $tournament[0]['thumbnailBgURL'];
    } else {
        $url = asset('pubg/background/background1.jpg');
    }
    ?>

    <section>
        <div class="container  animate__animated animate__fadeInDown animate__faster "  ">
            <div class="col-12">
                <div class="text-dark d-flex  animate__animated animate__fadeInDown animate__delay-1s  animate__slower">
                    <div class="col-6 mb-4">
                        <div class="">
                            <div class="d-flex justify-content-center">
                                <img src="{{ $round->tournament->logoURL }}" alt="team logo" style="height: 200px;">
                            </div>
                            <h2 class="display-5 primary-font-color text-center">UPCOMING MATCH</h2>
                        </div>
                        <div class="d-flex flex-column justify-content-center primary-bg rounded p-1 match-banner secondary-font-color">
                            <h2 class="display-4 text-center font-weight-bolder primary-font-color">{{ $round->subname }}</h2><br>
                            <h1 class=" display-3 text-center font-weight-bolder primary-font-color">{{ $match_name->name }} </h1><br>
                            <h2 class="display-4 text-center font-weight-bolder primary-font-color">{{ $match_name->map }}</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-start pt-3 pb-3 col-6 col-4 mt-3">
                        @if ($match_name->map_name->next_imageURL)
                        <img src="{{ $match_name->map_name->next_imageURL }}" class="next-map-img" alt="map image">
                        @else
                        <img src="{{ asset('pubg/map/erangel.png') }}" class="next-map-img" alt="map image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
        var channel = pusher.subscribe('coming-next-channel');
        channel.bind('coming-next-' + '{{$round->id}}', function(data) {
            location.reload();
        });
    </script>

    @endpush
</x-new-master-layout>