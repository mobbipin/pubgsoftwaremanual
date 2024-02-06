<x-new-master-layout :round="$round" :tournament="$tournament">
    @auth
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @endauth
    @push('styles')
    <style>
        .body1 {
            background-image: url(cover.jpg);
            min-height: 0px;
        }

        .squad-roaster-name {
            background: rgb(77, 120, 16);
            background: linear-gradient(0deg, rgba(77, 120, 16, 1) 0%, rgba(77, 120, 16, 1) 62%, rgba(140, 183, 54, 1) 88%);
        }

        .squad-roaster-card h2 {
            font-family: 'agency-fb', 'Sarpanch', sans-serif;
            color: rgb(80, 109, 29);
            font-weight: 600;
        }

        .squad-img {
            background-position: stretch;
        }

        .team-img {
            height: 150px;
            width: 125px;
            position: relative;
            left: 30px;
        }
    </style>
    @endpush
    @auth
    <div class="container mb-5">
        <div class="d-flex flex-row justify-content-around row4">
            <button class="btn btn-primary" onclick=" RoasterPusher('{{ $round->id }}',1)">page 1</button>
            <button class="btn btn-primary" onclick=" RoasterPusher('{{ $round->id }}',2)">page 2</button>
            <button class="btn btn-primary" onclick=" RoasterPusher('{{ $round->id }}',3)">page 3</button>
            <button class="btn btn-primary" onclick=" RoasterPusher('{{ $round->id }}',4)">page 4</button>
            <button class="btn btn-primary" onclick=" RoasterPusher('{{ $round->id }}',5)">page 5</button>
            <button class="btn btn-primary" onclick=" RoasterPusher('{{ $round->id }}',6)">page 6</button>
            <button class="btn btn-primary" onclick=" RoasterPusher('{{ $round->id }}',7)">page 7</button>
        </div>
    </div>
    @endauth

    <?php
    if ($tournament[0]['thumbnailBgURL']) {
        $url = $tournament[0]['thumbnailBgURL'];
    } else {
        $url = asset('pubg/background/background1.jpg');
    }
    ?>

    <section id='section'>
        <div class="container  stat-container">
            <div class="card  animate__animated animate__backInDown animate__delay-2s bg-transparent" style="border: none;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="third-color-border">SQUAD ROASTER <span class="third-color-border" style="font-size: 20px; ">{{ $round->name }}</span> </h2>
                        </div>
                    </div>
                    <div class="row justify-content-between">
                        @foreach ($teams as $team)
                        <div class=" col-md-2 col-lg-2 d-flex flex-column squad-roaster-card primary-bg ">
                            <div class="roaster-card-2  animate__animated animate__backInDown animate__faster">
                                <div class="roaster-card-3">
                                    <div class="row d-flex justify-content-center">
                                        <h6 class="display-5 text-center  pt-2 pb-2">
                                            {{ $team->name }}
                                        </h6>
                                    </div>
                                    <div class="row pt-3 pb-3 squad-img " style="background-color: {{$team->color}};">
                                        <img src="{{ $team->logoURL }}" class="d-flex justify-content-center team-img" alt="">
                                    </div>
                                    <div class="pt-3  animate__animated animate__backInDown animate__delay-1s  animate__slower">
                                        @foreach ($team->player as $player)
                                        @if($loop->iteration>6)
                                        @break
                                        @endif
                                        <h3 class="display-5 text-center pb-2 text-white animate__animated animate__fadeIn animate__delay-3s" style="font-size: 15px;">
                                            {{ $player->name }}
                                        </h3>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
        var channel = pusher.subscribe('roaster-channel');
        channel.bind('roaster-event-' + '{{$round->id}}', function(data) {
            $.ajax({
                type: "get",
                url: "{{ url('page-roaster') }}/" + data.id + '?page=' + data.page,
                success: function(data) {
                    $('#section').html(data);
                },
                error: function(data) {
                    console.log(data);
                }

            })
        });

        function RoasterPusher(id, page) {
            $.ajax({
                type: "post",
                url: "{{ url('roaster-pusher') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    id: id,
                    page: page
                },
                success: function(data) {
                    console.log('SUCCESS');

                },
                error: function(data) {
                    console.log(data);
                }

            })
        }
    </script>
    @endpush
</x-new-master-layout>
