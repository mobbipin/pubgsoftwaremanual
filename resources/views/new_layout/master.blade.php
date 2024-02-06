<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>PUBG TOURNAMENT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- site favicon -->
    <link rel="icon" type="image/png" href="{{asset('icon/icon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- All stylesheet and icons css  -->
    <link rel="stylesheet" href="{{ asset('css/new_pubg/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_pubg/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_pubg/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_pubg/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_pubg/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel = "icon" href ="{{asset('icon/icon.png')}}"   type = "image/x-icon">
    {{-- Bootstrap cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- animation --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- bootstarp icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    @stack('styles')

    @if (@$tournament)
        <style>
            /* background */
            .primary-bg {
                background: {{ $tournament[0]['themeColor'] }} !important;
            }

            .primary-bg-gd {
                background-image: linear-gradient(90deg, {{ $tournament[0]['themeColor'] }}, transparent) !important;
            }

            .secondary-bg-gd {
                background-image: linear-gradient(270deg, {{ $tournament[0]['secondaryColor'] }}, transparent) !important;
            }

            .secondary-bg {
                background: {{ $tournament[0]['secondaryColor'] }} !important;
            }

            .fourth-bg{
                 background: {{ $tournament[0]['forthColor'] }} !important;
            }

            /* font color */
            .primary-color {
                color: {{ $tournament[0]['themeColor'] }} !important;
            }

            .secondary-color {
                color: {{ $tournament[0]['secondaryColor'] }} !important;
            }

            .fourth-color {
                color: {{ $tournament[0]['forthColor'] }} !important;
            }

            .logourl {
                background: url('{{ $tournament[0]['logoURL'] }}') !important;
            }

            .theme-color {
                background: {{ $tournament[0]['themeColor'] }} !important;
            }


            .lower-tournament-logo {
                background: url('{{ $tournament[0]['lowerTournamentLogo'] }}') !important;
            }

            .roster-url {
                background: url('{{ $tournament[0]['rosterBgURL'] }}') !important;
            }

            .secondary-color {
                color: {{ $tournament[0]['secondaryColor'] }} !important;
            }

            .third-color-border {
                color: {{ $tournament[0]['thirdColorBorder'] }} !important;
            }

            .fourth-color {
                color: {{ $tournament[0]['forthColor'] }} !important;
            }

            .row2nd {
                justify-content: space-evenly !important;
                border: 5px solid {{ $tournament[0]['forthColor'] }} !important;
            }
            .fourth-font-color {
                color: {{ $tournament[0]['thirdColorBorder'] }} !important;
            }

            .primary-font-color {
                color: {{ $tournament[0]['primaryFontColor'] }} !important;
            }

            .secondary-font-color {
                color: {{ $tournament[0]['secondaryFontColor'] }} !important;
            }
        </style>
    @endif
</head>

<body>
    @auth
        @if (@$round->id)
            <x-new-header :round="$round" />
        @else
            <x-new-header />
        @endif
    @endauth
    <section>
        <div class="conatiner">
            {{ $slot }}
        </div>

    </section>
    <div class="modal fade mt-100" data-backdrop="false" id="editRound">
        <div class="modal-dialog modal-xl mt-100" style="width: 800px; margin: auto;">
            <div class="modal-content" id="editContentRound">
            </div>
        </div>
    </div>
    <div class="modal fade padding-top" id="editModal" data-backdrop="">
        <div class="modal-dialog modal-xl" style="width: 800px; margin: auto;">
            <div class="modal-content" id="editContentRoundSquad">
            </div>
        </div>
    </div>

    <!-- All Needed JS -->
    <script src="{{ asset('js/vendor/jquery-3.6.0.min.js') }}"></script>
    {{-- Bootstrap v-4 --}}

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('js/circularProgressBar.min.js') }}"></script>
    <script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/swiper.min.js') }}"></script>
    <script src="{{ asset('js/lightcase.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://js.pusher.com/7.1/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
            cluster: "{{env('PUSHER_APP_CLUSTER')}}",
            forceTLS: true

        });
        function updateRound(id) {
            console.log(id);
            event.preventDefault();
            $.ajax({
                url: "{{ url('/round-update') }}/" + id,
                type: 'PUT',
                data: $("#form1").serialize(),
                success: function(result) {
                    var result = JSON.parse(result);
                    if (result.statusCode == 200) {
                        location.reload();
                    } else {
                        alert(result.errors);
                    }
                }
            })
        }

        function EditViewRound(id) {
            console.log('modal');
            event.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ url('/round/edit') }}/" + id,
                success: function(data) {
                    console.log(data);
                    $('#editContent').addClass('show');
                    $('#editContentRound').html(data.modal_view);

                },
                error: function(data) {
                    console.log(data);
                }

            })

        }
        function resetAlert(round_id) {
        $.ajax({
            url: "{{ url('rest-alerts') }}",
            type: 'post',
            data: {
                'round_id': round_id,
                _token: "{{ csrf_token() }}"
            },
           success: function(result) {
                var result = JSON.parse(result);
                if (result.statusCode == 200) {
                    location.reload();
                } else {
                    alert(result.errors);
                }
            }
        });
    }

        function samePageShow(url, id) {
            console.log(url);
            console.log(id);
            var url = "{{ url('/') }}/" + url + "/" + id;
            console.log(url);
            $.ajax({
                type: "get",
                url: url,
                success: function(data) {
                    $('#section').html(data);

                },
                error: function(data) {
                    console.log(data);
                }

            })
        }
    </script>
    @stack('scripts')
</body>

</html>
