<div class="modal-header">
    <h5 class="addtournament">Edit Team</h5>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" style="width: 700px">
    <form id="formTeam">
        @csrf
        <div class="col d-flex justify-content-between flex-wrap">
            <input type="hidden" name="id" value="{{ $team->id }}">
            <div class="col-5">
                <label>NAME</label>
                <input type="text" class="form-control-lg" placeholder="Name" name="name" value="{{ $team->name }}" />
            </div>
            <div class="col-5">
                <label>Team Photo</label>
                <input type="text" class="form-control-lg" placeholder="Team Photo URL" name="teamPhotoURL" value="{{ $team->teamPhotoURL }}" />
            </div>
            <div class=" col-5">
                <label>Logo</label>
                <input type="text" class="form-control-lg" placeholder="Logo" name="logoURL" value="{{ $team->logoURL }}" />
            </div>
            <div class=" col-5">
                <label>Small Logo</label>
                <input type="text" class="form-control-lg" placeholder="Small Logo" name="smallLogoURL" value="{{ $team->smallLogoURL }}" />
            </div>
            <div class="col-5">
                <label>Color</label>
                <input type="text" class="form-inline" placeholder="Color" name="color" value="{{ $team->color }}" />
            </div>
            <div class=" col-5">
                <label>Tag</label>
                <input type="text" class="form-control-lg" placeholder="Tag" name="tag" value="{{ $team->tag }}" />
            </div>
            <div class="col-5">
                <label>Slot</label>
                <input type="text" class="form-control-lg" placeholder="Slot" name="slot" value="{{ $team->slot }}" />
            </div>

            <div class="d-flex justify-content-around col-8 mb-2">
                <div class="col-2 mt-3">
                    <a class="btn btn-lg btn52 btn-success" onclick="updateTeam('{{ $team->id }}')">Update</a>
                </div>
                <div class="col-2 ml-4 mb-4 modal-footer">
                    <button class="btn btn-lg btn51 btn-danger" data-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>

    </form>
</div>


<script>
    function updateTeam(id) {
        event.preventDefault();
        console.log($('#formTeam').serialize());
        $.ajax({
            url: "{{ url('/team-update/') }}",
            type: 'POST',
            data: $("#formTeam").serialize(),
            success: function(result) {
                // alert('test');
                var result = JSON.parse(result);
                if (result.statusCode == 200) {
                    location.reload();
                } else {
                    alert(result.errors);
                }
            }
        })
    }
</script>