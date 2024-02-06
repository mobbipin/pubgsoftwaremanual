<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- css links -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- grand finale -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grand-finale/addGame.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grand-finale/addGroup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grand-finale/addTeams.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grand-finale/deleteGame.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grand-finale/editGgame.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grand-finale/finale.css') }}">

    <!-- tournament -->
    <link rel="stylesheet" href="{{ asset('css/tournament/addRound.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tournament/editRound.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tournament/enterTournament.css') }}">

    <!-- miscellaneous -->
    <link rel="stylesheet" href="{{ asset('css/misc/addForm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/casterDeck.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/giveAway.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/liveResult.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/liveStats.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/overallRanking.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/point.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/prizePool.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/sponser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/squadRoaster.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/survivalStatus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/misc/addForm.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('pubg/css/main.css') }}">
    @stack('styles')
    <title>@yield('title')</title>
</head>

<body>
    @include('layout.top')
    <section class="body1">
        @yield('topBase')

    </section>
    <section>
        @yield('content')
    </section>
    @yield('modal')
    @include('layout.bottom')
    <script src="https://your-site-or-cdn.com/fontawesome/v6.1.1/js/all.js" data-auto-replace-svg="nest"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    @stack('scripts')

</body>

</html>
