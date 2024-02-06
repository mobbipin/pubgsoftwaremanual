<x-new-master-layout>
    <section class="padding-top">
        <section class="body-tournament">
            <div class="container add-tournament mb-3">
                <div class="row row2">
                    <div class="col-6 d-flex justify-content-center mb-4">
                        <button class="button1" data-toggle="modal" data-target="#createTournament">
                            <h5 class="head5 btn-yellow rounded text-Center">ADD TOURNAMENT</h5>
                        </button>
                    </div>
                </div>

                <div class="row row3">
                    @foreach ($tournaments as $tournament)
                    <div class="card__collection clear-fix">
                        <div class="cards cards--two">
                            <div class="card-header bg-turquoise d-flex justify-content-around">
                                <a class="btn edit-btn cursor-pointer" data-toggle="modal" data-target="#editTournament" onclick=" EditTournment('{{ $tournament->id }}')">

                                    <i class="bi bi-pencil"></i>
                                </a>
                                <!-- <p class="cardpara"> {{ $tournament->created_at }}</p> -->
                                <h5 class="text-white card-text"><b>{{ $tournament->name }}</b>

                                </h5>
                            </div>
                            <img src="{{ asset('images/masked.jpg') }}" class="img-responsive" alt="Cards Image">
                            <span class="cards--two__tri">

                            </span>
                            <p><a class="btn btn-turquoise" onclick="location.href='{{ url('tournament', [$tournament->id]) }}';">Enter
                                    Now</a></p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>


        <div class="modal fade padding-top" id="createTournament" data-backdrop="">
            <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
                <div class="modal-content d-flex justify-content-center " style="width: 52rem" ;>
                    <div class=" modal-header">
                        <h5 class="addtournament modal-title">Add Tournament</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="form">
                            @csrf
                            <div class="row">

                                <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">

                                    <div class="col-4">
                                        <label for="">NAME</label><br>
                                        <input type="text" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-4">
                                        <label for="">BACKGROUND URL</label><br>
                                        <input type="text" name="instaBgURL" placeholder="Insta Results Background URL">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label for="">PRIMARY FONT COLOR</label><br>
                                        <input type="color" style="height: 3rem;" name="primaryFontColor" placeholder="Primary Font Color">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label for="">GAME</label><br>
                                        <input type="text" name="game" placeholder="Game">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label for="">INSTA THUMB BACKGROUND</label><br>
                                        <input type="text" name="instaThumbBg" placeholder="Insta Thumb Background">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label for="">SECONDARY FONT COLOR</label><br>
                                        <input type="color" style="height: 3rem;" name="secondaryFontColor" placeholder="Secondary Font Color">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>URL LOGO</label><br>
                                        <input type="text" name="logoURL" placeholder="Logo URL">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>THEME COLOR</label><br>
                                        <input type="color" style="height: 3rem;" name="themeColor" placeholder="Theme Color">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>LOWER TOURNAMENT LOGO</label><br>
                                        <input type="text" name="lowerTournamentLogo" placeholder="Ticket/Lower Tournament Logo">

                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>ROSTER BACKGROUND URL</label><br>
                                        <input type="text" name="rosterBgURL" placeholder="Roster Background URL">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>SECONDARY COLOR</label><br>
                                        <input type="color" style="height: 3rem;" name="secondaryColor" placeholder="Secondary Color">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>TICKET/SPONSER LOGO</label><br>

                                        <input type="text" name="lowerOrgOrSponsorLogo" placeholder="Ticket/Lower Org/Sponser Logo">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>BACKGROUND THUMBNAIL URL</label><br>
                                        <input type="text" name="thumbnailBgURL" placeholder="Thumbnail Background URL">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>THIRD COLOR / MONITOR BORDER</label><br>
                                        <input type="color" style="height: 3rem;" name="thirdColorBorder" placeholder="Third Color/Monitor Border">

                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>TICKET/LOWER TITLE</label><br>
                                        <input type="text" name="lowerTitle" placeholder="Ticket/Lower Title">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>STREAM BACKGROUND URL</label><br>
                                        <input type="text" name="streamResultBgURL" placeholder="Stream Results Background URL">

                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>FOURTH COLOR</label><br>
                                        <input type="color" style="height: 3rem;" name="forthColor" placeholder="Fourth Color">
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label>TICKET TEXT</label><br>
                                        <input type="text" name="ticketText" placeholder="Ticket Text">
                                    </div>
                                    <div class="row">
                                        <div class="d-flex justify-content-around  mb-2 modal-footer">
                                            <div class="col-6 mt-3"><button class="btn btn-lg btn52 btn-success" id="submit">ADD</button></div>
                                            <div class="col-6 mt-3 ">
                                                <button class="btn btn-lg btn51 btn-danger bg-danger" data-dismiss="modal">CANCEL</button>
                                            </div>
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
        <div class="modal fade padding-top" id="editTournament" data-backdrop="">
            <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
                <div class="modal-content" id="editTournmentContent" style="width: 750px;">
                </div>
            </div>
        </div>
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
                    url: "{{ url('/tournment-update') }}/" + id,

                    type: 'PUT',
                    data: $("#tournmentForm").serialize(),
                    success: function(result) {
                        var result = JSON.parse(result);
                        if (result.statusCode == 200) {
                            // location.reload();
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

                    url: "{{ url('/tournament-edit') }}/" + id,

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
    </section>
</x-new-master-layout>