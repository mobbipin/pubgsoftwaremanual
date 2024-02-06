<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <link rel="stylesheet" href="../style/style.css" /> --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    {{-- <link rel="stylesheet" href="style/finale.css" />
    <link rel="stylesheet" href="../style/liveStats.css" />
    <link rel="stylesheet" href="../style/liveresult.css" /> --}}
    @stack('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <title>@yield('title')</title>
</head>

<body>
    <section class="body1">
        <div class="container-fluid live-stats-navbar">
            <div class="header">
                <nav class="navbar">
                    <ul class="navbar">
                        <li class="nav-item">
                            <a href="/" class="nav-link item1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link item2">Tournaments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item3">Log Out</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <!-- Sub Navbar -->
    <section>
        <div class="container-fluid sub-navbar">
            <nav class="navbar">
                <ul class="navbar d-felx justify-content-around">
                    <li class="nav-item"><a href="">Results</a></li>
                    <li class="nav-item"><a href="">Stats</a></li>
                    <li class="nav-item"><a href="">Alerts</a></li>
                    <li class="nav-item"><a href="">Map</a></li>
                    <li class="nav-item"><a href="">Showcase</a></li>
                    <li class="nav-item"><a href="">Rosters</a></li>
                    <li class="nav-item"><a href="">Schedule</a></li>
                    <li class="nav-item"><a href="">Map Chance</a></li>
                    <li class="nav-item"><a href="">Game Intro</a></li>
                    <li class="nav-item"><a href="">Coming Next</a></li>
                    <li class="nav-item"><a href="">Ticker</a></li>
                    <li class="nav-item"><a href="">Update Names</a></li>
                </ul>
            </nav>
        </div>
    </section>
    <!-- END Navbar -->

    <section>
        <div class="container">
            @yield('content')
        </div>
    </section>

</body>
@stack('scripts')

</html>
