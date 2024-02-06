<x-new-master-layout :tournament="$tournament" :round="$round" :subHeader="$subHeader">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @push('styles')
    <style>
        .stat-container {
            font-family: 'agency-fb-bold', sans-serif;
        }

        .alive-kills-players-list {
            height: 25px;
            margin: 0 2px;
        }

        /* live match kills */
        .dynamic-list,
        h1,
        h2,
        h3,
        h4,
        h5 {
            color: #000;
        }

        h4 {
            font-size: 14px !important;
        }

        h5 {
            font-size: 12px !important;
        }

        h6 {
            font-size: 10px !important;
        }

        .dynamic-list {
            position: relative;
        }

        .match-kills {
            background: var(--clr-black-low);
            padding: 5px;
            color: var(--clr-white-high);
        }

        .div-whitespace {
            background: var(--clr-white-high);
            z-index: -11;
        }

        .player-kill-card {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(2, 25, 62, 1) 10%, rgba(4, 131, 157, 1) 100%, rgba(9, 9, 121, 1) 100%);
            z-index: -1;
            border: none;
            padding: 5px;
        }

        .player-img {
            position: absolute;
            bottom: -1vh;
            z-index: 111;
        }

        .player-rank {
            background: var(--clr-black-low);
            padding: 5px;
        }

        .player-rank h3 {
            color: var(--clr-white-high);
        }

        .glass-curved-border {
            background: rgba(0, 0, 0, 0.4) !important;
            backdrop-filter: blur(6px) !important;
            border-radius: 35% !important;
            padding: 2px;
        }

        .shiny-border {
            border-right: 2px solid #C0C0C0;
            border-bottom: 2px solid #C0C0C0;
            border-radius: 35%;
            /* box-shadow: 1px 1px 5px 0px rgba(255, 215, 0, 0.9); */
        }



        /* for heading and border */
        h3 {
            color: #d0e2a5 !important;
        }


        .table-border-bottom {
            border-bottom: 3px solid  {{ $tournament[0]['thirdColorBorder'] }} !important;
        }

        .table-border-left {
            border-left: 5px solid #d0e2a5 !important;
        }

        /* border gradient animamtion  */
        :root {
            --borderWidth: 5px;
        }

        .table-border-gradient {
            background: #1D1F20 !important;
            position: relative;
            border-radius: var(--borderWidth) !important;
        }

        .table-border-gradient:after {
            content: '';
            position: absolute;
            top: calc(-1 * var(--borderWidth));
            left: calc(-1 * var(--borderWidth));
            height: calc(100% + var(--borderWidth) * 2);
            width: calc(100% + var(--borderWidth) * 2);
            background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
            border-radius: calc(2 * var(--borderWidth));
            z-index: -1;
            animation: animatedgradient 3s ease alternate infinite;
            background-size: 300% 300%;
        }

        .table-border {
            border: 5px solid {{$round->tournament->forthColor}} !important;
        }


        .table-border-top {
            border-top: 3px solid  {{ $tournament[0]['thirdColorBorder'] }} !important;;
        }

        .table-border-right {
            border-right: 5px solid {{$round->tournament->forthColor}} !important;
        }

        .survival-logo {
            height: 35%;
            position: relative;
            width: 50%;
            right: 10px;
            bottom: -5px;
        }

        .survival-player-img {
            position: relative;
            height: 77px;
            left: 58px;
            top: -4px;
        }


        @keyframes animatedgradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
    @endpush
    @auth

    <!-- sub-yello bar  -->
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>

    <div class="container">
        @if (@$subHeader != null)
        <section>
            <x-new-stat-header :round="$round" :totalAliveTeams="$totalAliveTeams" />
        </section>
        @endif
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
        <!-- statistics table -->
        <section>
            <div class="container-fluid border stat-container">
                <div class="row">
                    <div class="col d-flex">
                        <div class="col-lg-12">
                            <div class="show"> Alive: {{$totalAlivePlayers}} -- Team: {{$totalAliveTeams}}</div>
                            <input type="hidden" id="totalAlivePlayers" value="{{$totalAlivePlayers}}">
                            <input type="hidden" id="totalAliveTeams" value="{{$totalAliveTeams}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex">
                        <!-- dynamic col -->
                        <div class="col-lg-2">
                            <div id="display">
                            </div>
                            <input type="hidden" class="activeStats" name="active" value="">
                        </div>

                        <!-- 4-small cols -->
                        <div class="col-lg-9">
                            <div class="row d-flex justify-content-evenly">
                                <!-- team alive -->
                                <div class="col-lg-3" id="teamAlive">

                                </div>
                                <!-- Live Ranking -->
                                <div class="col-lg-3" id="liveRanking">

                                </div>
                                <!-- alive with kills -->
                                <div class="col-lg-3" id="aliveKills">

                                </div>
                                <!-- Match Kills -->
                                <div class="col-lg-3">
                                    <!-- hidden to index page by default -->
                                    <!-- <div id="matchKills"></div> -->
                                    <div id="wwcdForecast"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END statistics table -->
    </div>
    @push('scripts')
 <script>
        var channel = pusher.subscribe('stat-channel');
        channel.bind('liveStats-' + '{{ $round->id }}', function(data) {
            var dataDisplay = data.display;
            if(!data.activestatus){
                $('.activeStats').val(data.divActive);
            }
            switch (data.type) {
                case 'teamStatAlive':
                    $.ajax({
                        type: "get",
                        url: "{{ url('teamStatAlive') }}/" + data.id,
                        success: function(data) {
                            $('#teamAlive').html(data.modal_view);
                            if (dataDisplay) {
                                $('#display').html('<div class = "animate__animated animate__fadeInRight animate__delay-1s" >' + data.modal_view + '</div>');
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'liveRanking':
                    $.ajax({
                        type: "get",
                        url: "{{ url('liveRanking') }}/" + data.id +'?page='+data.page,
                        success: function(data) {
                            $('#liveRanking').html(data.modal_view);
                            if (dataDisplay) {
                                $('#display').html('<div class = "animate__animated animate__fadeInRight animate__delay-1s" >' + data.modal_view + '</div>');
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'aliveKills':
                    $.ajax({
                        type: "get",
                        url: "{{ url('aliveKills') }}/" + data.id,
                        success: function(data) {
                            $('#aliveKills').html(data.modal_view);
                            if (dataDisplay) {
                                $('#display').html('<div class = "animate__animated animate__fadeInRight animate__delay-1s" >' + data.modal_view + '</div>');
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'matchKills':
                    $.ajax({
                        type: "get",
                        url: "{{ url('matchKills') }}/" + data.id,
                        success: function(data) {
                            $('#matchKills').html(data.modal_view);
                            if (dataDisplay) {
                                $('#display').html('<div class = "animate__animated animate__fadeInRight animate__delay-1s" >' + data.modal_view + '</div>');
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'wwcdForecast':
                    $.ajax({
                        type: "get",
                        url: "{{ url('wwcdForecast') }}/" + data.id,
                        success: function(data) {
                            $('#wwcdForecast').html(data.modal_view)
                            if (dataDisplay) {
                                $('#display').html('<div class = "animate__animated animate__fadeInRight animate__delay-1s" >' + data.modal_view + '</div>');
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'liveMatchKill':
                    $.ajax({
                        type: "get",
                        url: "{{ url('liveMatchKill') }}/" + data.id,
                        success: function(data) {
                            // $('#liveMatchKill').html(data.modal_view)
                            $('#display').html('<div class = "animate__animated animate__fadeInRight animate__delay-1s" >' + data.modal_view + '</div>');
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'overallKill':
                    $.ajax({
                        type: "get",
                        url: "{{ url('overallKill') }}/" + data.id,
                        success: function(data) {
                            $('#overallKill').html(data.modal_view)
                            $('#display').html('<div class = "animate__animated animate__fadeInRight animate__delay-1s" >' + data.modal_view + '</div>');
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                    break;
                case 'refresh':
                    location.reload();
                    break;
                default:
                    $('#display').html('');
                    break;
            }
            if (data.activestatus) {
                var activeStat = $('.activeStats').val();
                switch (activeStat) {
                    case 'teamStatAlive':
                        $.ajax({
                            type: "get",
                            url: "{{ url('teamStatAlive') }}/" + data.id,
                            success: function(data) {
                                $('#teamAlive').html(data.modal_view);
                                $('#display').html(data.modal_view);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        break;
                    case 'liveRanking':
                        $.ajax({
                            type: "get",
                            url: "{{ url('liveRanking') }}/" + data.id +'?page='+data.page,
                            success: function(data) {
                                $('#liveRanking').html(data.modal_view);
                                $('#display').html(data.modal_view);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        break;
                    case 'aliveKills':
                        $.ajax({
                            type: "get",
                            url: "{{ url('aliveKills') }}/" + data.id,
                            success: function(data) {
                                $('#aliveKills').html(data.modal_view);
                                $('#display').html(data.modal_view);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        break;
                    case 'matchKills':
                        $.ajax({
                            type: "get",
                            url: "{{ url('matchKills') }}/" + data.id,
                            success: function(data) {
                                $('#matchKills').html(data.modal_view);
                                if (dataDisplay) {
                                    $('#display').html(data.modal_view);
                                }
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        break;
                    case 'wwcdForecast':
                        $.ajax({
                            type: "get",
                            url: "{{ url('wwcdForecast') }}/" + data.id,
                            success: function(data) {
                                $('#wwcdForecast').html(data.modal_view)
                                $('#display').html(data.modal_view);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        break;
                    case 'liveMatchKill':
                        $.ajax({
                            type: "get",
                            url: "{{ url('liveMatchKill') }}/" + data.id,
                            success: function(data) {
                                // $('#liveMatchKill').html(data.modal_view)
                                $('#display').html(data.modal_view);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        break;
                    case 'overallKill':
                        $.ajax({
                            type: "get",
                            url: "{{ url('overallKill') }}/" + data.id,
                            success: function(data) {
                                $('#overallKill').html(data.modal_view)
                                $('#display').html(data.modal_view);
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                        break;
                     case 'refresh':
                    location.reload();
                    break;
                    default:
                        $('#display').html('');
                        break;
                }
            }
        });
    </script>
    <script>
        function StatPusher(id, type,page=null) {
            event.preventDefault();
            $.ajax({
                type: "post",
                url: "{{ url('live-stat') }}",
                data: {
                    'id': id,
                    '_token': "{{ csrf_token() }}",
                    'type': type,
                    'divActive': type,
                    'page': page
                },
                success: function(data) {
                    console.log('Pusher Working Stat Live');
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            teamStatAlive('{{ $round->id }}');
            liveRanking('{{ $round->id }}');
            aliveKills('{{ $round->id }}');
            matchKills('{{ $round->id }}');
            wwcdForecast('{{ $round->id }}');
            function teamStatAlive(id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('teamStatAlive') }}/" + id,
                    success: function(data) {
                        $('#teamAlive').html(data.modal_view);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }
            function liveRanking(id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('liveRanking') }}/" + id,
                    success: function(data) {
                        $('#liveRanking').html(data.modal_view);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }
            function aliveKills(id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('aliveKills') }}/" + id,
                    success: function(data) {
                        $('#aliveKills').html(data.modal_view);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }
            function matchKills(id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('matchKills') }}/" + id,
                    success: function(data) {
                        $('#matchKills').html(data.modal_view);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }
            function wwcdForecast(id) {
                $.ajax({
                    type: "get",
                    url: "{{ url('wwcdForecast') }}/" + id,
                    success: function(data) {
                        $('#wwcdForecast').html(data.modal_view);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            }
        });
    </script>
    @endpush

</x-new-master-layout>