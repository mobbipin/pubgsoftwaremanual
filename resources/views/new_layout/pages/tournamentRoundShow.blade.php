<x-new-master-layout>
    <div class="container col-12 d-flex justify-content-center">
        <div class="col-1 container">
            <a href="#" class="text-dark padding-top ml-5">BACK</a>
        </div>
        <div class="col-10">
            {{-- <x-new-subHeader /> --}}
        </div>
    </div>

    <section>
        <div class="row row1">
            <div class="col-12 ">
                <h1 class="head1 text-center text-dark">PRO INVITATIONAL SHOWDOWN</h1>
                <p class="para1 text-dark">HOME >> <span class="tournaments"> TOURNAMENTS</span></p>
            </div>
        </div>
    </section>
    <section class="body-tournament">
        <div class="container d-flex justify-content-center mb-5">
            <button class="btn btn21 btn-yellow" data-toggle="modal" data-target="#createRound">ADD ROUND</button>
        </div>
        <div class="container">
            <div class="row row2">
                @foreach ($rounds as $round)
                <div class="col-md-4">
                    <div class="card card1 bg-turquoise">
                        <div class="cont2 text-dark d-flex flex-column justify-content-center">
                            <h5 class="cardpara text-center">{{ $round->name }}</h5>
                            <h5 class="pb-2 text-center"><b>{{ $round->subname }}</b>
                                <a class="btn button1" data-toggle="modal" data-target="#editRound" onclick="EditView('{{ $round->id }}')">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </h5>
                            <a class="btn btn22 d-flex justify-content-center bg-yellow" href="{{url('round/'.$round->id)}}">ENTER
                                NOW</a>
                            <!-- <button class="btn btn22 d-flex justify-content-center bg-yellow" onclick="location.href='{{ url('round', [$round->id]) }}';">ENTER
                                NOW</button> -->

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
    </section>

    <!-- toggle modal -->
    <div class="modal fade" id="createRound" data-backdrop="">
        <div class="modal-dialog modal-xl" style="width: 1200px; margin: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="addtournament">Add Round</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        @csrf
                        <input type="hidden" name="tournament_id" value="{{ session()->get('tournament_id') }}">
                        <div class="col d-flex justify-content-between flex-wrap">
                            <div class="col-5">
                                <label class="mt-3 mb-2">NAME</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="" />
                            </div>
                            <div class="col-5">
                                <label class="mt-3 mb-2">SUBNAME</label>
                                <input type="text" class="form-control" placeholder="Subname" name="subname" value="" />
                            </div>
                            <div class="col-5">
                                <label class="mt-3 mb-2">LIVE GAMEID</label>
                                <input type="text" class="form-control" placeholder="Live Game ID" name="liveGameID" value="" />
                            </div>
                            <div class=" col-5">
                                <label class="mt-3 mb-2">TAGLINE</label>
                                <input type="text" class="form-control" placeholder="Tag Line" name="tagLine" value="" />
                            </div>
                            <div class=" col-5">
                                <label class="mt-3 mb-2">ROSTER PER SINGLE PAGE</label>
                                <input type="text" class="form-control" placeholder="Result Per Page Single" name="resultPerPageSingle" value="" />
                            </div>
                            <div class=" col-5">
                                <label class="mt-3 mb-2">DAYS</label>
                                <input type="text" class="form-control" placeholder="Days" name="days" value="" />
                            </div>
                            <div class="col-5">
                                <label class="mt-3 mb-2">OVERALL PER PAGE RESULT</label>
                                <input type="text" class="form-control" placeholder="Result Per Page Overall" name="resultPerPageOverall" value="" />
                            </div>
                            <div class=" col-5">
                                <label class="mt-3 mb-2">TIME</label>
                                <input type="text" class="form-control" placeholder="Time" name="time" value="" />
                            </div>
                            <div class="col-5">
                                <label class="mt-3 mb-2">ENTRY PER PAGE</label>
                                <input type="text" class="form-control" placeholder="Entry Per Page" name="EntryPerPage" value="" />
                            </div>
                            <div class=" col-5">
                                <label class="mt-3 mb-2">CHANNEL</label>
                                <input type="text" class="form-control" placeholder="Channel" name="channel" value="" />
                            </div>
                            <div class="col-5">
                                <label class="mt-3 mb-2">ENTER PER ROW</label>
                                <select name="EnterPerRow" id="">
                                    <option value="2">2</option>
                                    <option value="3" selected>3</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                            <div class="row d-flex justify-content-evenly pt-5">
                                <div class="col-4">
                                    <label class="mt-3 mb-2" class="form-check-label" for="flexCheckDefault">
                                        Need Logo?


                                        <input class="form-check-input" type="checkbox" value="0" name="needLogo">
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="mt-3 mb-2" class="form-check-label" for="flexCheckDefault">
                                        Is test?

                                        <input class="form-check-input" type="checkbox" value="0" name="isTest">
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="mt-3 mb-2" class="form-check-label" for="flexCheckDefault">
                                        Show Alert?

                                        <input class="form-check-input" type="checkbox" value="0" name="showAlert">
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="mt-3 mb-2" class="form-check-label" for="flexCheckDefault">
                                        Show Roster?

                                        <input class="form-check-input" type="checkbox" value="0" name="showRoster">
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="mt-3 mb-2" class="form-check-label" for="flexCheckDefault">
                                        Show Lower?

                                        <input class="form-check-input" type="checkbox" value="0" name="showLower">

                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around mb-2">
                                <div class="col-3 mt-3">
                                    <button class="btn btn-lg btn52 btn-success" id="submit">Add</button>
                                </div>
                                <div class="col-3 ml-4 mb-4 modal-footer">
                                    <button class="btn btn-lg btn51 btn-danger" data-dismiss="modal">CANCEL</button>
                                </div>
                            </div>
                        </div>
                </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="modal fade" id="editRound" data-backdrop="">
        <div class="modal-dialog modal-xl" style="width: 800px; margin: auto;">
            <div class="modal-content" id="editContent">
            </div>
        </div>
    </div>
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
                url: "{{ url('round-store') }}",
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

        function handleClick(cb) {
            this.value ^= 1;
            console.log(this.value)
        }

        function EditView(id) {
            console.log('modal');
            event.preventDefault();
            $.ajax({
                type: "get",
                url: "{{ url('/round/edit') }}/" + id,
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
</x-new-master-layout>