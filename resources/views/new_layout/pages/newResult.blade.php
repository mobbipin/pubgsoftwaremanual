<x-new-master-layout :tournament="$tournament" :round="$round">
    @auth
    <!-- sub-yello bar  -->
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>

    <div class="container">

        <!-- mini-sub header with buttons -->
        <x-new-mini-subHeader :round="$round">
        </x-new-mini-subHeader>
    </div>
    @endauth
    <!-- live stat results body -->
    <?php
    if ($tournament[0]['thumbnailBgURL']) {
        $url = $tournament[0]['thumbnailBgURL'];
    } else {
        $url = asset('pubg/background/background1.jpg');
    }
    ?>
    <div id="section" class="p-100">
    </div>

    @push('scripts')
    <script>
        // Enable pusher logging - don't include this in production
        var channel = pusher.subscribe('my-channel');
        channel.bind('chicken-dinner-' + '{{$round->id}}', function(data) {
            switch (data.type) {
                case 'chicken':
                    $.ajax({
                        type: "get",
                        url: "{{ url('wwc') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);

                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'liveResult':
                    $.ajax({
                        type: "get",
                        url: "{{ url('game-result-ranking') }}/" + data.id,
                        success: function(data) {
                            console.log(data);
                            // $('#editContent').addClass('show');
                            $('#section').html(data);

                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'overallLiveResult':
                    $.ajax({
                        type: "get",
                        url: "{{ url('overall-game-result-ranking') }}/" + data.id + '?page=' + data.page,
                        success: function(data) {
                            console.log(data);
                            $('#section').html(data);

                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'matchMVP':
                    $.ajax({
                        type: "get",
                        url: "{{ url('match-mvp') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);

                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'overallMVP':
                    $.ajax({
                        type: "get",
                        url: "{{ url('overall-mvp') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);

                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'soloMVP':
                    $.ajax({
                        type: "get",
                        url: "{{ url('solo-mvp') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'Schedule':
                    $.ajax({
                        type: "get",
                        url: "{{ url('schedule-detail') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {

                            console.log(data);
                        }
                    });
                    break;
                case 'MPH2H':
                    $.ajax({
                        type: "get",
                        url: "{{ url('current-match-head-to-head') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'PH2H':
                    $.ajax({
                        type: "get",
                        url: "{{ url('player-head-to-head') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'MTH2H2':
                    $.ajax({
                        type: "get",
                        url: "{{ url('current-match-head-to-head-team') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'TH2H':
                    $.ajax({
                        type: "get",
                        url: "{{ url('team-head-to-head') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'graph':
                    $.ajax({
                        type: "get",
                        url: "{{ url('graph') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'winner':
                    $.ajax({
                        type: "get",
                        url: "{{ url('winner') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'runnerUp':
                    $.ajax({
                        type: "get",
                        url: "{{ url('runner-up-team') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'secondRunnerUp':
                    $.ajax({
                        type: "get",
                        url: "{{ url('2nd-runner-up') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                case 'overallSoloMVP':
                    $.ajax({
                        type: "get",
                        url: "{{ url('ovarall-solo-mvp') }}/" + data.id,
                        success: function(data) {
                            $('#section').html(data);
                        },
                        error: function(data) {
                            console.log(data);
                        }

                    })
                    break;
                default:
                    break;
            }
            // console.log(data.id);
        });
    </script>
    <script>
        function ResultPusher(type, id, page) {
            event.preventDefault();
            console.log(id);
            console.log(type);
            $.ajax({
                type: "post",
                url: "{{ url('result-pusher') }}",
                data: {
                    'id': id,
                    '_token': "{{ csrf_token() }}",
                    'type': type,
                    'page': page
                },
                success: function(data) {
                    console.log(data);

                },
                error: function(data) {
                    console.log(data);
                }

            })
        }
    </script>
    @endpush

</x-new-master-layout>