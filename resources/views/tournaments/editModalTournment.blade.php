 <div class="modal-header">
     <h5 class="addtournament">Edit Tournament</h5>
     <button type="button" class="close" data-dismiss="modal">&times;</button>
 </div>
 <div class="modal-body">
     <form id="tournmentForm">
         @csrf
         <div class="row">
             <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">
                 <div class="col-3">
                     <label for="">NAME</label>
                     <input type="text" value="{{ $tournament->name }}" placeholder="Name" name="name">
                 </div>
                 <div class="col-3">
                     <label for="">BACKGROUND URL</label>
                     <input type="text" name="instaBgURL" value="{{ $tournament->instaBgURL }}" placeholder="Insta Results Background URL">
                 </div>
                 <div class="col-4 mb-2">
                     <label for="">PRIMARY FONT COLOR</label>
                     <input type="color" style="height: 3rem;" name="primaryFontColor" value="{{ $tournament->primaryFontColor }}" placeholder="Primary Font Color">
                 </div>
                 <div class="col-4 mb-2">
                     <label for="">GAME</label>
                     <input type="text" name="game" value="{{ $tournament->game }}" placeholder="Game">
                 </div>
                 <div class="col-4 mb-2">
                     <label for="">INSTA THUMB BACKGROUND</label>
                     <input type="text" name="instaThumbBg" value="{{ $tournament->instaThumbBg }}" placeholder="Insta Thumb Background">
                 </div>
                 <div class="col-4 mb-2">
                     <label for="">SECONDARY FONT COLOR</label>
                     <input type="color" style="height: 3rem;" name="secondaryFontColor" value="{{ $tournament->secondaryFontColor }}" placeholder="Secondary Font Color">
                 </div>
                 <div class="col-4 mb-2">
                     <label>URL LOGO</label>
                     <input type="text" name="logoURL" value="{{ $tournament->logoURL }}" placeholder="Logo URL">
                 </div>
                 <div class="col-4 mb-2">
                     <label>THEME COLOR</label>
                     <input type="color" style="height: 3rem;" name="themeColor" value="{{ $tournament->themeColor }}" placeholder="Theme Color">
                 </div>
                 <div class="col-4 mb-2">
                     <label>LOWER TOURNAMENT LOGO</label>
                     <input type="text" name="lowerTournamentLogo" value="{{ $tournament->lowerTournamentLogo }}" placeholder="Ticket/Lower Tournament Logo" style>
                 </div>
                 <div class="col-4 mb-2">
                     <label>ROSTER BACKGROUND URL</label>
                     <input type="text" name="rosterBgURL" value="{{ $tournament->rosterBgURL }}" placeholder="Roster Background URL">
                 </div>
                 <div class="col-4 mb-2">
                     <label>SECONDARY COLOR</label>
                     <input type="color" style="height: 3rem;" name="secondaryColor" value="{{ $tournament->secondaryColor }}" placeholder="Secondary Color">
                 </div>
                 <div class="col-4 mb-2">
                     <label>TICKET/SPONSER LOGO</label>
                     <input type="text" name="lowerOrgOrSponsorLogo" value="{{ $tournament->lowerOrgOrSponsorLogo }}" placeholder="Ticket/Lower Org/Sponser Logo">
                 </div>
                 <div class="col-4 mb-2">
                     <label>BACKGROUND THUMBNAIL URL</label>
                     <input type="text" name="thumbnailBgURL" value="{{ $tournament->thumbnailBgURL }}" placeholder="Thumbnail Background URL">
                 </div>
                 <div class="col-4 mb-2">
                     <label>THIRD COLOR / MONITOR BORDER</label>
                     <input type="color" style="height: 3rem;" name="thirdColorBorder" value="{{ $tournament->thirdColorBorder }}" placeholder="Third Color/Monitor Border">
                 </div>
                 <div class="col-4 mb-2">
                     <label>TICKET/LOWER TITLE</label>
                     <input type="text" name="lowerTitle" value="{{ $tournament->lowerTitle }}" placeholder="Ticket/Lower Title">
                 </div>
                 <div class="col-4 mb-2">
                     <label>STREAM BACKGROUND URL</label>
                     <input type="text" name="streamResultBgURL" value="{{ $tournament->streamResultBgURL }}" placeholder="Stream Results Background URL">
                 </div>
                 <div class="col-4 mb-2">
                     <label>FOURTH COLOR</label>
                     <input type="color" style="height: 3rem;" name="forthColor" value="{{ $tournament->forthColor }}" placeholder="Fourth Color">
                 </div>
                 <div class="col-4 mb-2">
                     <label>TICKET TEXT</label>
                     <input type="text" name="ticketText" value="{{ $tournament->ticketText }}" placeholder="Ticket Text">
                 </div>
                 <div class="d-flex justify-content-around col-4 mb-2">
                     <div class="col-1 mt-3"><button class="btn btn-lg btn52 btn-success" onclick="updateTournnment('{{ $tournament->id }}')">Update</button></div>
                     <div class="col-1 mt-3">
                         <button class="btn btn-lg btn51 btn-danger bg-danger" data-dismiss="modal">CANCEL</button>
                     </div>
                 </div>
             </div>
         </div>

     </form>
 </div>

 <script>
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
                     location.reload();
                 } else {
                     alert(result.errors);
                 }
             }
         })
     }
 </script>