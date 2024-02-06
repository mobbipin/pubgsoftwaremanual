<x-new-master-layout :round="$round">
    @push('styles')
    <link rel="stylesheet" href="style/squad.css">
    <link rel="stylesheet" href="{{ asset('pubg/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .cont {
            margin-top: 20px;
            border: 1px solid rgba(128, 128, 128, 0.329);
            border-radius: 10px;
        }

        .labelrow {
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .button1 {
            background-color: blue;
            color: white;
            float: right;
        }

        .cardrow {
            justify-content: space-between;
        }

        .card {
            height: 300px;
            margin-bottom: 20px;
        }

        .form1 {
            padding-top: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        .teamname {
            padding-top: 5px;
            font-size: 12px;
            font-weight: bold;
        }

        .icon {
            color: blue;
            padding-left: 3px;
        }

        .trash {
            color: red;
            padding-left: 3px;
        }

        .form2 {
            border-top: 1px solid grey;
        }

        .name {
            border-top: 1px solid rgba(128, 128, 128, 0.329);
            margin-right: 20px;
            padding-left: 5px;
        }

        .box1 {
            background-color: green;
            margin-right: 4px;
            font-size: 8px;
        }

        .checked {
            color: white;
        }

        .edit {
            font-size: 13px;
            color: blue;
            padding-left: 5px;
        }
    </style>
    @endpush
    <x-new-yellow-bar :round="$round" />
    <div class="container cont p-3">
        <div class="row labelrow">
            <div class="col-md-2 col-lg-2">
                <h5>{{ $group->name }}</h5>
            </div>
            <div class="col-md-3 col-lg-3">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addExisting"><i class="bi bi-file-plus"></i>Add Existing Teams</button>
            </div>
        </div>

        <div class="row cardrow">
            @foreach ($teams as $key => $team)
            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <form class="form1">
                        Big Logo: @if ($team['logoURL'] != null)
                        <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                        <i class="bi bi-x-square-fill text-danger"></i>
                        @endif
                        Small Logo: @if ($team['smallLogoURL'] != null)
                        <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                        <i class="bi bi-x-square-fill text-danger"></i>
                        @endif
                        Tag:@if ($team['tag'] != null)
                        <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                        <i class="bi bi-x-square-fill text-danger"></i>
                        @endif
                        Color:@if ($team['color'] != null)
                        <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                        <i class="bi bi-x-square-fill text-danger"></i>
                        @endif
                        Team Photo: @if ($team['teamPhotoURL'] != null)
                        <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                        <i class="bi bi-x-square-fill text-danger"></i>
                        @endif
                        Slot:@if ($team['slot'] != null)
                        <i class="bi bi-check-circle-fill text-success"></i>
                        @else
                        <i class="bi bi-x-square-fill text-danger"></i>
                        @endif
                    </form>
                    <p class="teamname">
                        {{ $team['solt'] }} {{ $team['name'] }}
                        <a href="#" class="editTeamButton" data-team_id="{{ $team['id'] }}" data-target="#editModal" data-toggle="modal">
                            <i class="bi bi-pencil-fill icon"></i>
                        </a>
                        <a href="#" class="addPlayerButton" data-team_id="{{ $team['id'] }}" data-target="#editModal" data-toggle="modal" data-group_id="{{ $group_id }}">
                            <i class="bi bi-file-plus-fill icon"></i>
                        </a>
                        <a href="{{url('teamDetail/'.$team['id'])}}" target="_blank">
                            <i class="bi bi-images icon"></i>
                        </a>
                        <a href="#" data-team_id="{{ $team['id'] }}" class="deleteTeam" data-token="{{ csrf_token() }}">
                            <i class="bi bi-trash-fill
                                trash "></i>
                        </a>
                    </p>
                    <div class="row ps-2 pb-1">
                        <div class="col-md-3">
                            <img src="@if ($team['logoURL'] != null) {{ $team['logoURL'] }} @else {{ asset('pubg/logo/logo.png') }} @endif" alt="" height="60px" width="50px">
                        </div>
                        <div class="col-md-3">
                            <img src="@if ($team['smallLogoURL'] != null) {{ $team['smallLogoURL'] }} @else {{ asset('pubg/logo/logo.png') }} @endif" alt="" height="60px" width="50px">
                        </div>
                    </div>
                    <?php
                    $playerPlays = App\Models\Player::where('team_id', $team['id'])->get();
                    ?>
                    <form class="form2">
                        @forelse ($playerPlays as $player)
                        <?php $playerDetail = App\Models\Player::where('id', $player['id'])->get();
                        ?>
                        <div class="name">
                            <span>
                                @if ($playerDetail[0]['photoURL'] != null)
                                <i class="bi bi-check-circle-fill text-success"></i>
                                @else
                                <i class="bi bi-x-square-fill text-danger"></i>
                                @endif
                                {{ $playerDetail[0]['name'] }}<a href="#" class="editPlayerButton" data-toggle="modal" data-target="#editModal" data-player_id="{{ $playerDetail[0]['id'] }}" data-group_id="{{ $group_id }}" data-team_id="{{ $player['team_id'] }}"><i class="bi bi-pencil-fill edit"></i></a>
                                <a href="#" class="deletePlayerButton" data-group_id="{{ $group_id }}" data-team_id="{{ $player['team_id'] }}" data-player_id="{{ $playerDetail[0]['id'] }}"> <i class="bi bi-trash-fill trash"></i></a><br>
                        </div>
                        @empty
                        <div class="name">
                            <span> no player</span>
                        </div>
                        @endforelse
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="modal fade show padding-top" id="addExisting" data-backdrop="">
        <div class="modal-dialog modal-xl" style="width: 800px; margin: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add Existing Team</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" class="form-control" id="searchTeam" placeholder="Search Team">
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary" id="searchTeamButton">Search
                                        Team</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-8">
                                    <select class="form-control" id="existing_team_id" name="existing_team_id">
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn btn-primary" id="addTeam">Add Team</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#searchTeamButton').on('click', function(event) {
                event.preventDefault();
                var teamName = $('#searchTeam').val();
                console.log(teamName);
                $.ajax({
                    url: "{{ url('search-team-roster') }}",
                    type: "POST",
                    data: {
                        teamName: teamName
                    },
                    success: function(data) {
                        $('#existing_team_id').empty();
                        $('#existing_team_id').append('<option value="">Select team </option>');
                        $.map(data.teams, function(team, index) {
                            $('#existing_team_id').append('<option value="' +
                                team.id + '">' +
                                team.name + '-' + team.tournament_name + '</option>'
                            );
                        })
                    }
                });
            });
            $('#addTeam').on('click', function(event) {
                event.preventDefault();
                var existing_id = $('#existing_team_id').val();
                var group_id = '{{ $group_id }}';
                $.ajax({
                    url: "{{ url('add-existing-team') }}",
                    type: "POST",
                    data: {
                        team_id: existing_id,
                        group_id: group_id,
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.statusCode = 200) {
                            location.reload();
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }


                });
            })

            $(".deleteTeam").on('click', function(event) {
                event.preventDefault();
                let text = "Are you sure you want to delete";
                if (confirm(text) == true) {
                    var id = $(this).data('team_id');
                    console.log(id);
                    $.ajax({
                        type: "delete",
                        url: "{{ url('/team/delete/') }}/" + id,
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

            $(".editTeamButton").on('click', function(event) {
                event.preventDefault();
                // event.preventDefault();
                var id = $(this).data('team_id');
                console.log(id);
                $.ajax({
                    type: "get",
                    url: "{{ url('/team/edit') }}/",
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        console.log(data);
                        $('#editModal').addClass('show');
                        $('#editContentRoundSquad').html(data.modal_view);

                    },
                    error: function(data) {
                        console.log(data);
                    }

                })

            });

            $(".addPlayerButton").on('click', function(event) {
                event.preventDefault();
                // event.preventDefault();
                var id = $(this).data('team_id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/player/add') }}/",
                    data: {
                        'id': $(this).data('team_id'),
                        'group_id': $(this).data('group_id'),
                    },
                    success: function(data) {
                        console.log(data);
                        $('#editModal').addClass('show');
                        $('#editContentRoundSquad').html(data.modal_view);

                    },
                    error: function(data) {
                        console.log(data);
                    }

                })
            });

            $(".editPlayerButton").on('click', function(event) {
                event.preventDefault();
                var data1 = {
                    'id': $(this).data('player_id'),
                    'team_id': $(this).data('team_id'),
                    'group_id': $(this).data('group_id'),
                };
                console.log(data1);
                $.ajax({
                    type: "get",
                    url: "{{ url('/player/edit') }}/",
                    data: {
                        'id': $(this).data('player_id'),
                        'team_id': $(this).data('team_id'),
                        'group_id': $(this).data('group_id'),
                    },
                    success: function(data) {
                        console.log(data);
                        $('#editModal').addClass('show');
                        $('#editContentRoundSquad').html(data.modal_view);

                    },
                    error: function(data) {
                        console.log(data);
                    }

                })
            });

            $(".deletePlayerButton").on('click', function(event) {
                event.preventDefault();
                if (confirm('Do you want to delete this player?')) {
                    var id = $(this).data('player_id');
                    var data1 = {
                        'id': $(this).data('player_id'),
                        'team_id': $(this).data('team_id'),
                        'group_id': $(this).data('group_id'),
                    };
                    console.log(data1);
                    $.ajax({
                        type: "delete",
                        url: "{{ url('/player/delete') }}/" + id,
                        data: {
                            'id': $(this).data('player_id'),
                            'team_id': $(this).data('team_id'),
                            'group_id': $(this).data('group_id'),
                        },
                        success: function(data) {
                            if (data.statusCode = 200) {
                                location.reload();
                            }
                            console.log('Error deleting player');
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