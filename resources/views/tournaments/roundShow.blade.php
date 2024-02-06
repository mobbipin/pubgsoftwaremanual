@extends('layout.main')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/tournament/proInvitationalGames.css') }}">
@endpush

@section('topBase')
    <img src="{{asset('images/image.jpg')}}" class="bg-image" alt="bBackground Image">
    <div class="container-fluid invitational-text">
        <div class="row row1">
            <div class="col-12 col1">
            <h1 class="head1">PRO INVITATIONAL SHOWDOWN</h1>
                <p class="para1">HOME  >>  <span class="tournaments">  TOURNAMENTS</span></p>
            </div>
        </div>
    </div>

<div class="container border border-none">
    <ul class="breadcrumb">
        <li><a href="#">BACK</a></li>
    </ul>
</div>


<section class="body-tournament">
    <div class="container bg-white border border-none">
        <button class="btn btn21" data-toggle="modal" data-target="#createRound">ADD ROUND</button>
    </div>
        <div class="row row2">
            @foreach ($rounds as $round)
            <div class="col-md-4">
                <div class="card card1">
                    <div class="cont2">
                        <p class="cardpara">{{ $round->name }}</p>
                        <h5 class="pb-2"><b>{{ $round->subname }}</b>
                            <a class="" class="btn button1" data-toggle="modal" data-target="#editRound" onclick="EditView({{ $round->id }})">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </h5>
                        <button class="btn btn22" onclick="location.href='{{ url('round', [$round->id]) }}';">ENTER NOW</button>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-4">
                <div class="card card1">
                    <div class="cont2">
                        <p class="cardpara">PRO INVITATIONAL SHOWDOWN</p>
                        <h5 class="pb-2"><b>LEAGUE PLAY 3</b>
                            <i class="bi bi-pencil-square"></i>
                        </h5>
                        <button class="btn btn22">ENTER NOW</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card1">
                    <div class="cont2">
                        <p class="cardpara">PRO INVITATIONAL SHOWDOWN</p>
                        <h5 class="pb-2"><b>LEAGUE PLAY 2</b>
                            <i class="bi bi-pencil-square"></i>
                        </h5>
                        <button class="btn btn22">ENTER NOW</button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card1">
                    <div class="cont2">
                        <p class="cardpara">PRO INVITATIONAL SHOWDOWN</p>
                        <h5 class="pb-2"><b>GRAND FINALS</b>
                            <i class="bi bi-pencil-square"></i>
                        </h5>
                        <button class="btn btn22">ENTER NOW</button>
                    </div>
                </div>
            </div>
        </div>
</section>


<!-- toggle modal -->
<div class="modal fade" id="createRound">
    <div class="modal-dialog modal-xl" style="width: 800px; margin: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="addtournament">Add Round</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="width: 700px">
                <form id="form">
                    @csrf
                    <input type="hidden" name="tournament_id" value="{{ session()->get('tournament_id') }}">
                    <div class="col d-flex justify-content-between flex-wrap">
                        <div class="col-5">
                            <label>NAME</label>
                            <input type="text" placeholder="Name" name="name" value="" />
                        </div>
                        <div class="col-5">
                            <label>SUBNAME</label>
                            <input type="text" placeholder="Subname" name="subname" value="" />
                        </div>
                        <div class="col-5">
                            <label>LIVE GAMEID</label>
                            <input type="text" placeholder="Live Game ID" name="liveGameID" value="" />
                        </div>
                        <div class=" col-5">
                            <label>TAGLINE</label>
                            <input type="text" placeholder="Tag Line" name="tagLine" value="" />
                        </div>
                        <div class=" col-5">
                            <label>RESULT PER SINGLE PAGE</label>
                            <input type="text" placeholder="Result Per Page Single" name="resultPerPageSingle" value="" />
                        </div>
                        <div class=" col-5">
                            <label>DAYS</label>
                            <input type="text" placeholder="Days" name="days" value="" />
                        </div>
                        <div class="col-5">
                            <label>OVERALL PER PAGE RESULT</label>
                            <input type="text" placeholder="Result Per Page Overall" name="resultPerPageOverall" value="" />
                        </div>
                        <div class=" col-5">
                            <label>TIME</label>
                            <input type="text" placeholder="Time" name="time" value="" />
                        </div>
                        <div class="col-5">
                            <label>ENTRY PER PAGE</label>
                            <input type="text" placeholder="Entry Per Page" name="EntryPerPage" value="" />
                        </div>
                        <div class=" col-5">
                            <label>CHANNEL</label>
                            <input type="text" placeholder="Channel" name="channel" value="" />
                        </div>
                        <div class="col-5">
                            <label>ENTER PER ROW</label>
                            <input type="text" placeholder="Enter Per Row" name="EnterPerRow" value="" />
                        </div>
                        <div class="row d-flex justify-content-around pt-5">
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" value="0" name="needLogo">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Need Logo?
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" value="0" name="isTest">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Is test?
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" value="0" name="showAlert">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Show Alert?
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" value="0" name="showRoster">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Show Roster?
                                </label>
                            </div>
                            <div class="col-4">
                                <input class="form-check-input" type="checkbox" value="0" name="showLower">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Show Lower?
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around col-7 mb-2">
                            <div class="col-2 mt-3">
                                <button class="btn btn-lg btn52 btn-success" id="submit">Add</button>
                            </div>
                            <div class="col-2 ml-4 mb-4 modal-footer">
                                <button class="btn btn-lg btn51 btn-danger" data-dismiss="modal">CANCEL</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="editRound">
    <div class="modal-dialog modal-xl" style="width: 800px; margin: auto;">
        <div class="modal-content" id="editContent">
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('input[type="checkbox"]').click(function() {
        this.value ^= 1;
        console.log(this.value)
    });
    $("#submit").click(function(event) {
        console.log('test');
        event.preventDefault();
        $.ajax({
            url: "{{ url('round-store')}}",
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

    function updateRound(id) {
        console.log(id);
        event.preventDefault();
        $.ajax({
            url: "{{url('/round-update')}}/" + id,
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

    function handleClick(cb) {
        this.value ^= 1;
        console.log(this.value)
    }


    function EditView(id) {
        console.log('modal');
        event.preventDefault();
        $.ajax({
            type: "get",
            url: "{{ url('/round/edit')}}/" + id,
            success: function(data) {
                $('#editContent').html(data.modal_view);
            },
            error: function(data) {
                console.log(data);
            }

        })

    }
</script>
@endpush