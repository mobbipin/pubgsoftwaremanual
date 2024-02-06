@extends('layout.main')
@section('title', 'Tournaments')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{asset('css/tournament/enterTournament.css')}}">

@endpush
@section('topBase')

<div class="container-fluid">
</div>
@stop
@section('content')
    <section class="body-tournament">
        <img src="{{asset('images/tour.jpg')}}" class="bg-image" alt="bBackground Image">
        <div class="container-fluid tournament-text">
            <div class="row row1">
                <div class="col-12 col1">
                <h1 class="head1">PRO INVITATIONAL SHOWDOWN</h1>
                    <p class="para1">HOME  >>  <span class="tournaments">  TOURNAMENTS</span></p>
                </div>
            </div>
        </div>
        <div class="container add-tournament">
            <div class="row row2">
                <div class="col-6 col2">
                    <button class="btn button1" data-toggle="modal" data-target="#createTournament">
                        <h5 class="head5">ADD TOURNAMENT</h5>
                    </button>
                </div>

            </div>

            <div class="row row3">
                @foreach ($tournaments as $tournament)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="container mt-0 mb-0 add-card">
                            <p class="cardpara"> {{ $tournament->created_at }}</p>
                            <h5 class="text-white"><b>{{ $tournament->name }}</b>
                                <a class="" class="btn button1" data-toggle="modal" data-target="#editTournament" onclick=" EditTournment({{ $tournament->id }})">
                                    <i class="bi bi-pencil-square ml-2"></i>
                                </a>
                            </h5>
                        </div>
                        <div class="opacity1" onclick="location.href='{{ url('tournament', [$tournament->id]) }}';">
                            <div class="img123">
                            </div>
                            <div class="img456">
                                <a href="#" class="btn button2">Enter Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-4">
                    <div class="card card1">
                        <div class="container">
                            <p class="cardpara"> June 14 2022</p>
                            <h5><b>PRO INVITATIONAL SHOWDOWN</b>
                                <i class="bi bi-pencil-square"></i>
                            </h5>
                        </div>
                        <div class="opacity1">
                            <div class="img123">
                            </div>
                            <div class="img456">
                                <button class="btn button2">
                                    <h5>Enter Now</h5>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @endsection

    @section('modal')
    <div class="modal fade" id="createTournament">
        <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="addtournament">Add Tournament</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        @csrf
                        <div class="col">
                            <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">

                                <div class="col-3">
                                    <label for="">NAME</label>
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                                <div class="col-3">
                                    <label for="">BACKGROUND URL</label>
                                    <input type="text" name="instaBgURL" placeholder="Insta Results Background URL">
                                </div>
                                <div class="col-4 mb-2">
                                    <label for="">PRIMARY FONT COLOR</label>
                                    <input type="text" name="primaryFontColor" placeholder="Primary Font Color">
                                </div>
                                <div class="col-4 mb-2">
                                    <label for="">GAME</label>
                                    <input type="text" name="game" placeholder="Game">
                                </div>
                                <div class="col-4 mb-2">
                                    <label for="">INSTA THUMB BACKGROUND</label>
                                    <input type="text" name="instaThumbBg" placeholder="Insta Thumb Background">
                                </div>
                                <div class="col-4 mb-2">
                                    <label for="">SECONDARY FONT COLOR</label>
                                    <input type="text" name="secondaryFontColor" placeholder="Secondary Font Color">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>URL LOGO</label>
                                    <input type="text" name="logoURL" placeholder="Logo URL">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>THEME COLOR</label>
                                    <input type="text" name="themeColor" placeholder="Theme Color">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>LOWER TOURNAMENT LOGO</label>
                                    <input type="text" name="lowerTournamentLogo" placeholder="Ticket/Lower Tournament Logo">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>ROSTER BACKGROUND URL</label>
                                    <input type="text" name="rosterBgURL" placeholder="Roster Background URL">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>SECONDARY COLOR</label>
                                    <input type="text" name="secondaryColor" placeholder="Secondary Color">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>TICKET/SPONSER LOGO</label>
                                    <input type="text" name="lowerOrgOrSponsorLogo" placeholder="Ticket/Lower Org/Sponser Logo">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>BACKGROUND THUMBNAIL URL</label>
                                    <input type="text" name="thumbnailBgURL" placeholder="Thumbnail Background URL">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>THIRD COLOR / MONITOR BORDER</label>
                                    <input type="text" name="thirdColorBorder" placeholder="Third Color/Monitor Border">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>TICKET/LOWER TITLE</label>
                                    <input type="text" name="lowerTitle" placeholder="Ticket/Lower Title">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>STREAM BACKGROUND URL</label>
                                    <input type="text" name="streamResultBgURL" placeholder="Stream Results Background URL">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>FOURTH COLOR</label>
                                    <input type="text" name="forthColor" placeholder="Fourth Color">
                                </div>
                                <div class="col-4 mb-2">
                                    <label>TICKET TEXT</label>
                                    <input type="text" name="ticketText" placeholder="Ticket Text">
                                </div>
                                <div class="d-flex justify-content-around col-4 mb-2">
                                    <div class="col-2 mt-3"><button class="btn btn-lg btn52 btn-success" id="submit">ADD</button></div>
                                    <div class="col-2 ml-4 mb-4 modal-footer">
                                        <button class="btn btn-lg btn51 btn-danger bg-danger" data-dismiss="modal">CANCEL</button>
                                    </div>
                                </div>
                                {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                            </div>
                        </div>

                    </form>
                </div>


            </div>
        </div>
    </div>
    <div class="modal fade" id="editTournament">
        <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
            <div class="modal-content" id="editTournmentContent">
            </div>
        </div>
    </div>
    </div>
    </div>



    @stop

    @push('scripts')
    <script>
        $("#submit").click(function(event) {
            console.log('test');
            event.preventDefault();
            $.ajax({
                url: "{{ url('tournament-store') }}",
                type: 'POST',
                data: $("#form").serialize(),
                success: function(result) {
                    var result = JSON.parse(result);
                    if (result.statusCode == 200) {
                        location.reload();
                    } else {
                        alert(result.errors);
                    }
                }
            })
        })

        function updateTournnment(id) {
            console.log(id);
            event.preventDefault();
            $.ajax({
                url: "{{url('/tournment-update')}}/" + id,
                type: 'PUT',
                data: $("#tournmentForm").serialize(),
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

        function EditTournment(id) {
            console.log('modal');
            event.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ url('/tournament-edit')}}/" + id,
                success: function(data) {
                    $('#editTournmentContent').html(data.modal_view);
                },
                error: function(data) {
                    console.log(data);
                }

            })

        }
    </script>
    @endpush