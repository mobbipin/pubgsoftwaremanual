<div class="modal-header">
    <label for="">
        <h2>Edit</h2>
    </label>
    <h5 class="addtournament text-white">Edit Match</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <form id="editFormMatch">
        @csrf
        <input type="hidden" name="id" value="{{ $match->id }}">
        <div class="col">
            <div class="col-lg-12 d-flex flex-wrap justify-content-around add-tournament-form">

                <div class="col-6 mb-2">
                    <label for="">Name</label>
                    <input type="text" placeholder="Name" name="name" value="{{ $match->name }}">
                </div>
                <div class="col-6 mb-2">
                    <label for="">SubName</label>
                    <input type="text" name="subName" placeholder="subName" value="{{ $match->subName }}">
                </div>
                <div class="col-6 mb-2">
                    <label for="">Time</label>
                    <input type="text" name="time" placeholder="time" value="{{ $match->time }}">
                </div>
                <div class="col-6 mb-2">
                    <label for="">Number</label>
                    <input type="number" name="number" placeholder="number" value="{{ $match->number }}">
                </div>
                <div class="col-12 mb-2">
                    <label for="">Maps</label><br>
                    <select name="map" class="p-2 border border-none bg-white">
                        <option value="">Select Map</option>
                        @forelse (@$maps as $map)
                            <option @if ($map->name == $match->map) selected @endif value="{{ $map->name }}">
                                {{ $map->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <div class="col-6"><button class="btn btn-lg btn52 btn-success mt-3"
                            id="updateMatch">Update</button></div>
                    <div class="col-6 modal-footer">
                        <button class="btn btn-lg btn51 btn-danger bg-danger ml-3" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $("#updateMatch").on('click', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{ url('/match/update') }}/" + {{ $match->id }},
            type: 'PUT',
            data: $("#editFormMatch").serialize(),
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
