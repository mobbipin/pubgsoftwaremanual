<x-new-master-layout :round="$round">
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @push('styles')
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
    <div class="container cont p-3">
        <div class="container">
            <a href="{{ url('result_entry/' . $match_id) }}" class="btn btn-primary">Result Entry </a>
        </div>
        <div class="row cardrow">
            @foreach ($teams as $key => $team)
            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">

                        <p class="team">
                        </p>
                        <p class="teamname text-dark">
                            {{ $team->team->slot }}. {{ $team->team->name }}
                            <button class=" btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2 addPlayerButton" data-match_id="{{ $match_id }}" data-team_id="{{ $team->team->id }}" data-target="#editModal" data-toggle="modal">+</button>
                            <!-- <a href="#" class="addPlayerButton" data-team_id="{{ $team['id'] }}" data-target="#editModal" data-toggle="modal">
                                <i class="bi bi-file-plus-fill icon"></i>
                            </a> -->
                        </p>
                        <form class="form2">
                            @forelse ($team->playerStatement as $player)
                            <div class="name">
                                <input type="checkbox" name="playerName" class="playerAddInGame" value="{{ $player->active }}" data-player_stat_id="{{ $player['id'] }}" @if ($player->active) checked @endif>
                                {{ $player->player->name }}
                            </div>
                            @empty
                            <div class="name">
                                <span class="text-danger">No Player</span>
                            </div>
                            @endforelse
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </section>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".playerAddInGame").on('click', function(event) {
                this.value ^= 1;
                var value = this.value;
                var id = $(this).data('player_stat_id');
                $.ajax({
                    type: "PUT",
                    url: "{{ url('/player/addInStat') }}/" + id,
                    data: {
                        id: id,
                        active: value,
                    },
                    success: function(data) {
                        if (data.statusCode = 200) {
                            // location.reload();
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }

                })

            });
            $(".addPlayerButton").on('click', function() {
                $.ajax({
                    type: "get",
                    url: "{{ url('result/player/add') }}/",
                    data: {
                        'id': $(this).data('team_id'),
                        'match_id': $(this).data('match_id')
                    },
                    success: function(data) {
                        $('#editModal').addClass('show');
                        $('#editContentRoundSquad').html(data.modal_view);

                    },
                    error: function(data) {
                        console.log(data);
                    }

                })
            });
        });
    </script>
    @endpush
</x-new-master-layout>