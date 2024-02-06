 <div class="row d-flex justify-content-between secondary-bg  animate__animated animate__fadeInUp animate__delay-1s  animate__slower" style="z-index: 1111;">
     <div class="col-3">
         <div class="d-flex flex-column align-items-center relative mt-3">
             <img src="{{$team_stat->team->logoURL}}" class="logo-img-team" alt="logo image">
             <h4 class="display-5 text-center mt-1">{{$team_stat->team->name}}</h4>
         </div>
     </div>
     <div class="col-1 pt-2 team-members">
         @foreach($team_stat->PlayerStatement as $player)
         <h6>{{$player->player->name}}</h6>
         @endforeach
     </div>
     <!-- player image -->
     <div class="col-3 ">
         <div class="d-flex">
             @foreach($team_stat->PlayerStatement as $player)
             @if($player->player->photoURL)
             <img src="{{$player->player->photoURL}}" class="team-img player-img-team-{{$loop->iteration}} animate__animated animate__fadeIn animate__delay-3s animate__slower" alt="team image">
             @else
             <img src="{{ asset('pubg/character/char' . $loop->iteration . '.png') }}" class="team-img player-img-team-{{$loop->iteration}} animate__animated animate__fadeIn animate__delay-3s animate__slower" alt="team image">
             @endif
             @endforeach
         </div>

     </div>
     <!-- misc information -->
     <div class="row d-flex align-items-center col-5">
         <div class="col-2">
             <h6 class="text-center">PLACE</h6>
             <h2 class="text-center">{{$team_stat->placePoint}}</h2>
         </div>
         <div class="col-2">
             <h6 class="text-center">KILLS</h6>
             <h2 class="text-center">{{$team_stat->totalKill}}</h2>
         </div>
         <div class="col-2">
             <h6 class="text-center">POINTS</h6>
             <h2 class="text-center">{{$team_stat->totalPoint}}</h2>
         </div>
         <div class="col-6">
             <h6 class="text-center">OVERALL RANK</h6>
             <h2 class="text-center">#{{$team_stat->rank}}/{{$teamCount}}</h2>
         </div>
     </div>

 </div>