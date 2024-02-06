<div class="modal-header">
    <h5 class="addtournament">Add Round</h5>
    <button onclick="resetAlert('{{@$round->id}}')" class="btn btn-danger" style="margin-left:15rem;">Reset ALert</button>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body" style="width: 500px">
    <form id="form1">
        @csrf
        <div class="col d-flex justify-content-between flex-wrap">
            <div class="col-6">
                <label>NAME</label>
                <input type="text" class="form-control-lg" placeholder="Name" name="name" value="{{ $round->name }}" />
            </div>
            <div class="col-6">
                <label>SUBNAME</label>
                <input type="text" class="form-control-lg" placeholder="Subname" name="subname" value="{{ $round->subname }}" />
            </div>
            <div class="col-6">
                <label>LLIVE GAMEID</label>
                <select name="liveGameID" id="" class="form-control-lg" style="width: 336px;">
                    @forelse(@$round->matchz as $match)
                    <option value="{{ $match->id }}" @if ($match->id == $round->liveGameID) selected @endif>
                        {{ $match->name }}
                    </option>
                    @empty
                    <option value="">Select Live Game ID</option>
                    @endforelse
                </select>
            </div>
            <div class=" col-6">
                <label>TAGLINE</label>
                <input type="text" class="form-control-lg" placeholder="Tag Line" name="tagLine" value="{{ $round->tagLine }}" />
            </div>
            <div class=" col-6">
                <label>ROSTER PER SINGLE PAGE</label>
                <input type="text" class="form-control-lg" placeholder="Result Per Page Single" name="resultPerPageSingle" value="{{ $round->resultPerPageSingle }}" />
            </div>
            <div class=" col-6">
                <label>ROUND DAYS</label>
                <input type="text" class="form-control-lg" placeholder="Days" name="days" value="{{ $round->days }}" />
            </div>
            <div class="col-6">
                <label>OVERALL RESULT PER PAGE</label>
                <input type="text" class="form-control-lg" placeholder="Result Per Page Overall" name="resultPerPageOverall" value="{{ $round->resultPerPageOverall }}" />
            </div>
            <div class=" col-6">
                <label>ROUND TIME</label>
                <input type="text" class="form-control-lg" placeholder="Time" name="time" value="{{ $round->time }}" />
            </div>
            <div class="col-6">
                <label>ENTRY PER PAGE</label>
                <input type="text" class="form-control-lg" placeholder="Entry Per Page" name="EntryPerPage" value="{{ $round->EntryPerPage }}" />
            </div>
            <div class=" col-6">
                <label>ROUND CHANNEL</label>
                <input type="text" class="form-control-lg" placeholder="Channel" name="channel" value="{{ $round->channel }}" />
            </div>
            <div class="col-6">
                <label>ENTER PER ROW</label>
                <select name="EnterPerRow" id="">
                    <option value="2" @if($round->EnterPerRow==2) selected @endif>2</option>
                    <option value="3" @if($round->EnterPerRow==3) selected @endif>3</option>
                    <option value="4" @if($round->EnterPerRow==4) selected @endif>4</option>
                    <option value="6" @if($round->EnterPerRow==6) selected @endif>6</option>
                </select>
                <!-- <input type="text" class="form-control-lg" placeholder="Enter Per Row" name="EnterPerRow" value="{{ $round->EnterPerRow }}" /> -->
            </div>
            <div class="col-6"></div>
            <hr>
            <div class="row col-12">
                <div class="col-4">
                    <div class="form-row">
                        <label class="col-sm-8 col-form-label" for="flexCheckDefault">
                            Need Logo?
                        </label>
                        <input class="form-control col-sm-1" type="checkbox" name="needLogo" value="1" onclick='handleClick(this);' {{ $round->needLogo ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-row">
                        <label class="col-sm-8 col-form-label" for="flexCheckDefault">
                            Is test?
                        </label>
                        <input class="form-control col-sm-1" type="checkbox" name="isTest" value="1" onclick='handleClick(this);' {{ $round->isTest ? 'checked' : '' }}>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-row">
                        <label class="col-sm-8 col-form-label" for="flexCheckDefault"> Show Alert? </label>
                        <input class="form-control col-sm-1" type="checkbox" name="showAlert" value="1" onclick='handleClick(this);' {{ $round->showAlert ? 'checked' : '' }}>
                    </div>
                </div>
            </div>

            <div class="row col-12">
                <div class="col-4">
                    <div class="form-row">
                        <label class="col-sm-8 col-form-label" for="flexCheckDefault">
                            Show Roster?
                        </label>
                        <input class="form-control col-sm-1" type="checkbox" name="showRoster" value="1" onclick='handleClick(this);' {{ $round->showRoster ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-row">
                        <label class="col-sm-8 col-form-label" for="flexCheckDefault">
                            Show Lower?
                        </label>
                        <input class="form-control col-sm-1" type="checkbox" name="showLower" value="1" onclick='handleClick(this);' {{ $round->showLower ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around col-8 mb-2">
            <div class="col-6 mt-3">
                <button class="btn btn-lg btn52 btn-success" onclick="updateRound('{{ $round->id }}')">Update</button>
            </div>
            <div class="col-6 mb-4 modal-footer">
                <button class="btn btn-lg btn51 btn-danger" data-dismiss="modal">CANCEL</button>
            </div>
        </div>
</div>

</form>
</div>