<div class="modal-content">
    <div class="container">
        <form id="formPlayerAdd">
            @csrf
            <h5 class="modal-title text-start" id="exampleModalLabel">Add Players</h5>
            <div class="d-flex">
                <div class="form-group col-lg-6">
                    <label for="">Game ID</label>
                    <input class="form-control" id="exampleInputId" aria-describedby="emailHelp" name="match_id" value="{{$match_id}}" readonly>
                </div>
                <div class="form-group col-lg-6">
                    <label for="">Team</label>
                    <input type="hidden" class="form-control" id="exampleInputTeam" name="team_id" value="{{$team->id}}">
                    <input type="text" class="form-control" id="exampleInputTeam" name="team_name" value="{{$team->name}}" readonly>
                </div>
            </div>
            <textarea name="playerName" class="border border-muted" id="" cols="40" rows="10"></textarea>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn add-btn" id="submitPlayer">Add</button>
    </div>
</div>


<script>
    $("#submitPlayer").on('click', function(event) {
        console.log($('#formPlayerAdd').serialize())
        event.preventDefault();
        $.ajax({
            url: "{{ url('player-store-result') }}",
            type: 'POST',
            data: $("#formPlayerAdd").serialize(),
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
</script>