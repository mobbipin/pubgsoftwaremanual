{{-- @extends('layout.main')
@section('title', 'Tournaments')
@section('topBase')
@include('layout.menu')
<!-- @include('layout.submenu') -->
@stop
@section('content')
 --}}

<script>
    function liveResult(id) {
        console.log('modal');
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('game-result-ranking') }}/" + id,
            success: function(data) {
                console.log(data);
                // $('#editContent').addClass('show');
                $('#section').html(data);

            },
            error: function(data) {
                console.log(data);
            }

        })

    }

    function overallLiveResult(id, page) {
        console.log('modal');
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('overall-game-result-ranking') }}/" + id + '?page=' + page,
            success: function(data) {
                console.log(data);
                $('#section').html(data);

            },
            error: function(data) {
                console.log(data);
            }

        })
    }

    function macthMVP(id) {
        console.log('modal');
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('match-mvp') }}/" + id,
            success: function(data) {
                $('#section').html(data);

            },
            error: function(data) {
                console.log(data);
            }

        })
    }

    function Schedule(id) {
        console.log('modal');
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('schedule-detail') }}/" + id,
            success: function(data) {
                $('#section').html(data);

            },
            error: function(data) {
                console.log(data);
            }

        })
    }

    function overallMVP(id) {
        console.log('modal');
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('overall-mvp') }}/" + id,
            success: function(data) {
                $('#section').html(data);

            },
            error: function(data) {
                console.log(data);
            }

        })
    }

    function WWCDSHOW(id) {
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('wwc') }}/" + id,
            success: function(data) {
                $('#section').html(data);

            },
            error: function(data) {
                console.log(data);
            }

        })
    }
</script>

{{-- 
@stop --}}