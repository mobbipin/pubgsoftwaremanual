 <div class="container stat-container">
     <div class="card  animate__animated animate__backInDown animate__delay-2s bg-transparent " style=" border: none;">
         <div class="card-body">
             <div class="row">
                 <div class="col-7">
                     <h2 class="third-color-border">SQUAD ROASTER <span style="font-size: 10px;">{{ $round->name }}</span>
                     </h2>
                 </div>
             </div>
             <div class="row justify-content-between">
                 @foreach ($teams as $team)
                 <div class=" col-md-2 col-lg-2 d-flex flex-column squad-roaster-card primary-bg ">
                     <div class="roaster-card-2  animate__animated animate__backInDown animate__faster">
                         <div class="roaster-card-3">
                             <div class="row d-flex justify-content-center">
                                 <h6 class="display-5 text-center  pt-2 pb-2">
                                     {{ $team->name }}
                                 </h6>
                             </div>

                             <div class="row pt-3 pb-3 squad-img " style="background-color: {{$team->color}};">
                                 <img src="{{ $team->logoURL }}" class="d-flex justify-content-center team-img" alt="">
                             </div>
                             <div class="pt-3  animate__animated animate__backInDown animate__delay-1s  animate__slower">
                                 @foreach ($team->player as $player)
                                 @if($loop->iteration>6)
                                 @break
                                 @endif
                                 <h3 class="display-5 text-center pb-2 text-white animate__animated animate__fadeIn animate__delay-3s" style="font-size: 15px;">
                                     {{ $player->name }}
                                 </h3>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </div>
