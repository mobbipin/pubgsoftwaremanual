 <div class="container-fluid">
     <div class="row">
         <div class="frame-height col-md-3 col-lg-3">
             @forelse($first_row_team as $key=>$team)
             <div class="row d-flex maincol">
                 <div class="col-md-5 col-lg-5 collogo  " style="background:{{ $team['team']['color'] }};">
                     <img src="{{ $team->team->logoURL }}" alt="" class="logo">
                 </div>
                 @if($round->showRoster)
                 <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif pt-2">
                     @forelse(@$team->playerStatement->sortBy('dead') as $player)
                     @if($player->dead!=1)
                     <div class="col primary-font-color text-bold" style="font-weight:600">
                         {{ $player->player->name }}
                     </div>
                     @else
                     <div class="col text-black text-bold" style="font-weight:600">
                         {{ $player->player->name }}
                     </div>
                     @endif
                     @empty
                     @endforelse
                 </div>
                 @else
                 <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                     <h3 class="primary-font-color"> {{ $team->team->name }}</h3>
                 </div>

                 @endif
             </div>
             @empty
             @endforelse
             @php
             $count=9-count($first_row_team);
             @endphp
             @for($i=0;$i<$count;$i++) <div class="row d-flex maincol">
                 <div class="col-md-5 col-lg-5 collogo @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif ">
                     <img src="" alt="" class="logo">
                 </div>
                 @if($round->showRoster)
                 <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif pt-2">

                     <div class="col primary-font-color text-bold" style="font-weight:600">

                     </div>
                 </div>
                 @else
                 <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                     <h3 class="primary-font-color"> </h3>
                 </div>

                 @endif
         </div>
         @endfor
     </div>

     <div class="col-md-5 col-lg-5">
     </div>
     <div class="frame-height col-md-3 col-lg-3" style="margin-left:-35px;">
         @forelse($second_row_team as $key=>$team)
         <div class="row d-flex maincol">
             <div class="col-md-5 col-lg-5 collogo  " style="background:{{ $team['team']['color'] }};">
                 <img src="{{ $team->team->logoURL }}" alt="" class="logo">
             </div>
             @if($round->showRoster)
             <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif pt-2">
                 @forelse(@$team->playerStatement->sortBy('dead') as $player)
                 @if($player->dead!=1)
                 <div class="col primary-font-color text-bold" style="font-weight:600">
                     {{ $player->player->name }}
                 </div>
                 @else
                 <div class="col text-black text-bold" style="font-weight:600">
                     {{ $player->player->name }}
                 </div>
                 @endif
                 @empty
                 @endforelse
             </div>
             @else
             <div class="col-md-7 col-lg-7 name @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                 <h3 class="primary-font-color"> {{ $team->team->name }}</h3>
             </div>

             @endif
         </div>
         @empty
         @endforelse
         @php
         $count=9-count($second_row_team);
         @endphp
         @for($i=0;$i<$count;$i++) <div class="row d-flex maincol">
             <div class="col-md-5 col-lg-5 collogo @if ($key % 2 == 0) primary-bg @else  secondary-bg @endif ">
                 <img src="" alt="" class="logo">
             </div>
             @if($round->showRoster)
             <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif pt-2">

                 <div class="col primary-font-color text-bold" style="font-weight:600">
                     {{ $player->player->name }}
                 </div>

             </div>
             @else
             <div class="col-md-7 col-lg-7 name @if ($key % 2 != 0) primary-bg @else  secondary-bg @endif teamCenter" style="height:108px">

                 <h3 class="primary-font-color"> </h3>
             </div>

             @endif
     </div>
     @endfor

 </div>
 </div>
 </div>