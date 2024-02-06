<x-new-master-layout :round="$round" :tournament="$tournament">
    @auth
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @endauth
    @push('styles')
    <style>
        .size {
            font-size: 28px;
            height: 48px;
            width: 20rem;

        }

        .end {
            position: fixed;
            height: 19cm;
            width: 45cm;
        }

        .relative {
            position: relative;
            height: 100px;
        }

        .player {
            position: absolute;
            max-height: 197px;
        }

        .box {
            height: 100px;
            width: 85px;
            background-color: {{@$tournament[0]->forthColor}};
            left: 34px;
            position: relative;
        }
    </style>

    @endpush

    <section class="d-flex justify-content-center align-items-center ">
        <div class="frame-height">
            <div class="col-12 d-flex justify-content-center" id="team-alert">

            </div>
            <div class="d-flex justify-content-front align-items-end end" id="player-alert">
             
            </div>
        </div>

    </section>
    @push('scripts')
    <script>
        var channel = pusher.subscribe('alert-channel');
        channel.bind('alert-event-' + '{{$round->id}}', function(data) {
            switch (data.type) {
                case 'refresh':
                    location.reload();
                    break;
                case 'player':
                    $("#player-alert").html('');
                    $.ajax({
                        url: "{{url('player-alerts')}}",
                        type: 'get',
                        data: data,
                        success: function(data) {
                            $("#player-alert").html(data);
                            setTimeout(function() {
                                $("#player-alert").html('');
                            }, 8000);
                        }
                    });
                    break;
                case 'team':
                    $("#team-alert").html('');
                    $.ajax({
                        url: "{{url('team-alerts')}}",
                        type: 'get',
                        data: data,
                        success: function(data) {
                            $("#team-alert").html(data);
                            setTimeout(function() {
                                $("#team-alert").html('');
                            }, 8000);
                        }
                    });
                    break;
                default:
                    break;
            }
        });
    </script>
    @endpush

</x-new-master-layout>