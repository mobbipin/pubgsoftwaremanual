<x-new-master-layout :round="$round" :tournament="$tournament">
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @push('styles')
    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
    @endpush
    <div class="container col-12 d-flex justify-content-center">
        <div class="col-1 container">
            <a href="#" class="text-dark padding-top ml-5">BACK</a>
        </div>
        <div class="col-10">
            <x-new-subHeader />
        </div>
    </div>
    <section class="bg-dark">
        <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'Match')">Match</button>
            <button class="tablinks" onclick="openCity(event, 'teamPlayer')">Team/Players</button>
            <a href="{{ url('/finalReport', $round->id) }}" target="_blank" class="btn tablinks text-dark mt-2">End
                Report</a>
        </div>

        <!-- Tab content -->
        <div id="Match" class="tabcontent" style="display: block;">
            <div class="container player-menu">
                @forelse($games as $game)
                <div class="row row5 border border-primary rounded-top text-white">
                    <div class="col-md-6 col5" onclick="location.href='{{ url('/game_status', $game->id) }}';">
                        <span class="text123 text-white">
                            NAME: {{ $game->name }} -- MAP: {{ $game->map }} -- NUMBER: {{ $game->number }}
                            --
                            SUBNAME: {{ $game->subname }} -- TIME: {{ $game->time }}
                        </span>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn5 btn-primary" onclick="location.href='{{ url('/result_entry', $game->id) }}';">Results
                            Entry</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{url('instaResult?round='.$round->id.'&'.'match_id='.$game->id.'&'.'tournament_id='.$tournament[0]->id)}}" target="__blank" class=" btn btn5 text-white btn-primary">Insta Results</a>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="editModalMatch" data-match_id="{{ $game->id }}" data-toggle="modal" data-target="#editModal">
                            <i class="bi bi-pencil-square bi2 text-white"></i>
                        </a>
                    </div>
                    <div class="col-md-1">
                        <a href="#" class="deleteModalMatch" data-match_id="{{ $game->id }}">
                            <i class="bi bi-trash bi4 text-white"></i>
                        </a>
                    </div>
                </div>
                <br>
                @empty
                Match has not been added.
                @endforelse
            </div>
        </div>

        <div id="teamPlayer" class="tabcontent">
            <h3>Team/Players</h3>

            <div class="container player-menu">
                @foreach ($groups as $group)
                <a href="{{ url('/group', $group->id) }}" class="row row5 border border-primary rounded-top text-white">
                    {{ $group->name }} <br>
                </a>
                @endforeach
            </div>
        </div>


    </section>

    <section class="padding-top pb-100">
        <div class="modal fade" id="addGroup" data-backdrop="">
            <div class="modal-dialog modal-xl mt-100" style="margin: auto;">
                <div class="modal-content" style="margin: auto;">
                    <div class="modal-header">
                        <h5 class="addtournament text-dark">Add Group</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formGroup">
                            @csrf
                            <input class="form-control" type="hidden" name="round_id" value="{{ $round->id }}">
                            <div class="row">
                                <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">
                                    <div class="col-3">
                                        <label for="">Player Name</label>
                                        <input class="form-control" type="text" placeholder="Name" name="name">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="col-6 mt-3"><button class="btn btn-lg btn52 btn-success" id="submitGroup">ADD</button></div>
                                        <div class="col-6 mb-4 modal-footer">
                                            <button class="btn btn-lg btn51 btn-danger bg-danger ml-3" data-dismiss="modal">CANCEL</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" data-backdrop="false" id="addTeam">
            <div class="modal-dialog modal-xl mt-100" style="width: 1200px; margin: auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="addtournament">Add Team</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formTeam">
                            @csrf
                            <div class="col">
                                <div class="col-12 d-flex flex-wrap justify-content-between add-tournament-form">
                                    <div class="col-6">
                                        <label for="">Groups</label><br>
                                        <select name="group_id" class="p-2 bg-white border border-none rounded">
                                            <option value="">Select Group</option>
                                            @forelse (@$round->group as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="">Team Name</label>
                                        <input class="form-control" type="text" placeholder="Team Name" name="name" class="p-2 bg-white border border-none">
                                    </div>

                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="mr-2 mt-3"><button class="btn btn-lg btn52 btn-success" id="submitTeam">ADD</button></div>
                                    <div class="modal-footer">
                                        <button class="btn btn-lg btn51 btn-danger bg-danger border border-none" data-dismiss="modal">CANCEL</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" data-backdrop="false" id="addGame">
            <div class="modal-dialog modal-xl mt-100" style="width: 1200px; margin: auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="addtournament text-dark">Add Game</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formMatch">
                            @csrf
                            <input class="form-control" type="hidden" name="round_id" value="{{ $round->id }}">
                            <div class="col">
                                <div class="col-lg-12 d-flex flex-wrap justify-content-around add-tournament-form">

                                    <div class="col-6 mb-2">
                                        <label for="">Name</label>
                                        <input class="form-control" type="text" placeholder="Name" name="name">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">SubName</label>
                                        <input class="form-control" type="text" name="subName" placeholder="subName">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Time</label>
                                        <input class="form-control" type="text" name="time" placeholder="time">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Number</label>
                                        <input class="form-control" type="number" name="number" placeholder="number">
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Maps</label><br>
                                        <select name="map" class="p-2 border border-none bg-white">
                                            <option value="">Select Map</option>
                                            @forelse (@$maps as $map)
                                            <option value="{{ $map->name }}">{{ $map->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="Groups">Add Groups</label><br>
                                        <select name="group_id[]" multiple class="bg-white p-2 border border-none rounded">
                                            @forelse (@$round->group as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-12 d-flex justify-content-start">
                                        <div class="col-3"><button class="btn btn-lg btn52 btn-success mt-3" id="submitMatch">ADD</button></div>
                                        <div class="col-3 modal-footer">
                                            <button class="btn btn-lg btn51 btn-danger bg-danger ml-3" data-dismiss="modal">CANCEL</button>
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
        <div class="modal fade" data-backdrop="false" id="addPlayer">
            <div class="modal-dialog modal-xl mt-100" style="width: 1200px; margin: auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="">
                            <h4 class="text-dark">Add Players</h4>
                        </label>
                        <h5 class="addtournament text-white">Add Player</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form id="formPlayer">
                            @csrf
                            <div class="col">
                                <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">
                                    <div class="col-4">
                                        <label for="">Groups</label><br>
                                        <select name="group_id" id="group_id" class="p-2 border border-none bg-white">
                                            <option value="">Select Group</option>
                                            @forelse($round->group as $group)
                                            <option value="{{ $group->id }}"> {{ $group->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Teams</label>
                                        <select class="form-control" id="team_id" name="team_id">
                                            <option value="">Select Team</option>
                                        </select>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <label for="">Player Name</label><br>
                                        <input class="form-control" type="text" name="name" placeholder="playerName" class="add-player-input">
                                    </div>
                                    <div class="row d-flex justify-content-center ml-1">
                                        <div class="col-6"><button class="btn btn-lg btn52 btn-success mt-3" id="submitPlayer">ADD</button></div>
                                        <div class="col-6 modal-footer">
                                            <button class="btn btn-lg btn51 btn-danger bg-danger ml-3" data-dismiss="modal">CANCEL</button>
                                        </div>
                                        {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#group_id').on('click', function(event) {
                var groupId = event.target.value;
                $.ajax({
                    url: "{{ route('teamId') }}",
                    type: "POST",
                    data: {
                        group_id: groupId
                    },
                    success: function(data) {
                        $('#team_id').empty();
                        $('#team_id').append('<option value="">Select Team </option>');
                        $.map(data.teams, function(team, index) {
                            $('#team_id').append('<option value="' +
                                team.id +
                                '">' +
                                team.name + '</option>');
                        })
                    }
                })
            });
            $("#submitPlayer").on('click', function(event) {
                console.log('submitPlayer')
                event.preventDefault();
                $.ajax({
                    url: "{{ Route('player.store') }}",
                    type: 'POST',
                    data: $("#formPlayer").serialize(),
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
            $("#submitGroup").on('click', function(event) {
                console.log('submitGroup')
                event.preventDefault();
                $.ajax({
                    url: "{{ Route('group.store') }}",
                    type: 'POST',
                    data: $("#formGroup").serialize(),
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
            $("#submitMatch").on('click', function(event) {
                console.log('submitMatch')
                event.preventDefault();
                $.ajax({
                    url: "{{ Route('match.store') }}",
                    type: 'POST',
                    data: $("#formMatch").serialize(),
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
            $("#submitTeam").on('click', function(event) {
                console.log('submitTeam')
                event.preventDefault();
                $.ajax({
                    url: "{{ Route('team.store') }}",
                    type: 'POST',
                    data: $("#formTeam").serialize(),
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

            $(".editModalMatch").on('click', function(event) {
                event.preventDefault();
                var id = $(this).data('match_id');
                $.ajax({
                    url: "{{ Route('match.edit') }}",
                    type: 'GET',
                    data: {
                        id: id,
                    },
                    success: function(data) {

                        console.log(data);
                        $('#editModal').addClass('show');
                        $('#editContentRoundSquad').html(data.modal_view);
                        // $('#section').html(data);
                    }
                })
            })


            $(".deleteModalMatch").on('click', function(event) {
                event.preventDefault();
                let text = "Are you sure you want to delete";
                if (confirm(text) == true) {
                    var id = $(this).data('match_id');
                    $.ajax({
                        type: "delete",
                        url: "{{ url('/match/delete/') }}/" + id,
                        data: {
                            'id': id,
                            '_token': $(this).data("token"),
                        },
                        success: function(data) {
                            if (data.statusCode = 200) {
                                location.reload();
                            }
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    })
                }
            });

        });
    </script>
    @endpush

</x-new-master-layout>