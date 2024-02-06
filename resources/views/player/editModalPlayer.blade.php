<div class="modal-header">
    <h5 class="addtournament">Edit Player</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" style="width: 700px">
    <form id="formEditPlayer" method="POST">
        @csrf
        {{-- {{ dd($player) }} --}}
        <div class="col d-flex justify-content-between flex-wrap">

            <input type="hidden"name="id" value="{{ $player->id }}" />
            <div class="col-5">
                <label>NAME</label>
                <input type="text" class="form-control-lg" placeholder="Name" name="name"
                    value="{{ $player->name }}" />
            </div>
            <div class="col-5">
                <label>Photo URL</label>
                <input type="text" class="form-control-lg" placeholder="Photo URL" name="photoURL"
                    value="{{ $player->photoURL }}" />
            </div>
            <div class="col-5">
                <label>TEAM</label>
                <input name="team_id" type="hidden" value="{{ $player->team_id }}">
                <select name="team_id" id="" class="form-control-lg" style="width: 335px;" disabled>
                    @forelse(@$teams as $team)
                        <option value="{{ $team->id }}" @if ($team->id == $player->team_id) selected @endif>
                            {{ $team->name }}</option>
                    @empty
                        <option value="">Select Team</option>
                    @endforelse
                </select>
            </div>
            <div class="d-flex justify-content-around col-8 mb-2">
                <div class="col-2 mt-3">
                    <button class="btn btn-lg btn52 btn-success" id="submitEditPlayer11">Update</button>
                </div>
                <div class="col-2 ml-4 mb-4 modal-footer">
                    <button class="btn btn-lg btn51 btn-danger" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $("#submitEditPlayer11").on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{ url('/player/update/') }}",
            type: 'POST',
            data: $("#formEditPlayer").serialize(),
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
</script>
