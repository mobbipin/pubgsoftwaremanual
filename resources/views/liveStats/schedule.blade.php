<x-new-master-layout :round="$round" :tournament="$tournament">
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @push('styles')
    <link rel="stylesheet" href="/style/daysummary.css" />
    <style>
        .heading1 {
            color: white;
            font-size: 50px;
            font-weight: bolder;
            padding-top: 20px;
            margin-left: 15px
        }

        .span1 {
            color: white;
            font-size: 30px;
            background-image: linear-gradient(to right, rgb(3, 3, 121), rgb(3, 3, 36));
        }

        .card {
            margin-right: 5px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid rgb(3, 3, 121);
        }

        .card-header {
            text-align: center;
            font-size: 21px;
            font-weight: bolder;
            background-color: rgb(3, 3, 121);
            color: white;
        }

        .img123 {
            z-index: 1;
            position: absolute;
            height: 250px;
            text-align: center;
            /* background-image: url(/images/cover.jpg); */
            background-size: cover;
            width: 100%;
            background-repeat: no-repeat;
        }

        .img456 {
            z-index: 9;
            position: absolute;
            height: 250px;
            width: 100%;
            color: white;
            text-align: center;
            font-size: 20px;
            /* background-image: linear-gradient(rgba(101, 101, 216, 0.281), rgb(3, 3, 121)); */
        }

        .totalkills {
            font-size: 12px;
        }

        .image {
            height: 55px;
            width: 98px;
        }

        .divrow,
        .countrow {
            justify-content: center;
        }

        .divcol {
            background-color: rgb(3, 3, 121);
        }

        .countcol {
            background-color: rgb(3, 3, 121);
            font-size: 21px;
        }

        .card-text {
            margin-top: 210px;
            z-index: 9;
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            color: white;
            background-color: rgb(3, 3, 121);
        }
    </style>
    @endpush

    <div class="container">
        <div class="row">
            <div class="col-2">
                <label for="match1"><span>Match 1</span></label><br>
                <select class="p-2 bg-white border border-none rounded" id="first_match_id" onchange="Schedule('{{ $schedule->round_id }}',this.value,this.id)">
                    <option value="">none</option>
                    @foreach ($matchs as $match)
                    <option value="{{ $match->id }}" @if ($match->id == $schedule->first_match_id) selected @endif>
                        {{ $match->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="match1">Match 2</label><br>
                <select class="p-2 bg-white border border-none rounded" id="second_match_id" onchange="Schedule('{{ $schedule->round_id }}',this.value,this.id)">
                    <option value="">none</option>
                    @foreach ($matchs as $match)
                    <option value="{{ $match->id }}" @if ($match->id == $schedule->second_match_id) selected @endif>
                        {{ $match->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="match1">Match 3</label><br>
                <select class="p-2 bg-white border border-none rounded" id="third_match_id" onchange="Schedule('{{ $schedule->round_id }}',this.value,this.id)">
                    <option value="">none</option>
                    @foreach ($matchs as $match)
                    <option value="{{ $match->id }}" @if ($match->id == $schedule->third_match_id) selected @endif>
                        {{ $match->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="match1">Match 4</label><br>
                <select class="p-2 bg-white border border-none rounded" id="fourth_match_id" onchange="Schedule('{{ $schedule->round_id }}',this.value,this.id)">
                    <option value="">none</option>
                    @foreach ($matchs as $match)
                    <option value="{{ $match->id }}" @if ($match->id == $schedule->fourth_match_id) selected @endif>
                        {{ $match->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="match1">Match 5</label><br>
                <select class="p-2 bg-white border border-none rounded" id="fifth_match_id" onchange="Schedule('{{ $schedule->round_id }}',this.value,this.id)">
                    <option value="">none</option>
                    @foreach ($matchs as $match)
                    <option value="{{ $match->id }}" @if ($match->id == $schedule->fifth_match_id) selected @endif>
                        {{ $match->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <label for="match1">Match 6</label><br>
                <select class="p-2 bg-white border border-none rounded" id="sixth_match_id" onchange="Schedule('{{ $schedule->round_id }}',this.value,this.id)">
                    <option value="">none</option>
                    @foreach ($matchs as $match)
                    <option value="{{ $match->id }}" @if ($match->id == $schedule->sixth_match_id) selected @endif>
                        {{ $match->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="div" style="background-color: red ; min-height: 420px;">
            <h1 class="heading1">
                DAY SUMMARY <span class="span1">LEAGUE PLAY - DAY 3</span>
            </h1>
            <div class="row">
                @if ($schedule->first_match_id)
                <div class="col-md-2 animate__animated animate__backInDown animate__delay-1s">
                    <div class="card">
                        <p class="card-header">{{ @$schedule->match1->name }}</p>
                        <div class="">
                            <div class="img123" style="background-image: url('{{ @$schedule->match1->map_name->imageUrl }}');">
                                {{ @$schedule->match1->time }}
                            </div>
                            <div class="img456">
                                <p class="mt-3">
                                    {{ @$schedule->match1->map }} <br />
                                    {{ @$schedule->match1->subname }}
                                </p>
                                @php
                                $chickend1 = $schedule->match1->chicken_dinner($schedule->match1->id);
                                @endphp

                                @if (!empty($chickend1))
                                <img src="{{ @$chickend1->team->logoURL }}" alt="" class="mt-2 image animate__animated animate__backInDown animate__delay-3s" />
                                <div class="totalkills ">
                                    <div class="row divrow">
                                        <div class="col-md-4 divcol me-1">KILLS</div>
                                        <div class="col-md-4 divcol">TOTAL</div>
                                    </div>
                                    <div class="row countrow mt-1">
                                        <div class="col-md-4 countcol me-1"> {{ @$chickend1->kill }}</div>
                                        <div class="col-md-4 countcol">
                                            {{ @$chickend1->kill + $chickend1->position_points }}
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        @if (!empty($chickend1))
                        <p class="card-text p-2">{{ @$chickend1->team->name }}</p>
                        @endif

                    </div>
                </div>
                @endif
                @if ($schedule->second_match_id)
                <div class="col-md-2">
                    <div class="card">
                        <p class="card-header">{{ @$schedule->match2->name }}</p>
                        <div class="">
                            <div class="img123" style="background-image: url('{{ @$schedule->match2->map_name->imageUrl }}');">
                                {{ @$schedule->match2->time }}
                            </div>
                            <div class="img456">
                                <p class="mt-3">
                                    {{ @$schedule->match2->map }} <br />
                                    {{ @$schedule->match2->subname }}
                                </p>
                                @php
                                $chickend1 = $schedule->match2->chicken_dinner($schedule->match2->id);
                                @endphp

                                @if (!empty($chickend1))
                                <div class="totalkills ">
                                    <div class="row divrow">
                                        <div class="col-md-4 divcol me-1">KILLS</div>
                                        <div class="col-md-4 divcol">TOTAL</div>
                                    </div>
                                    <div class="row countrow mt-1">
                                        <div class="col-md-4 countcol me-1"> {{ @$chickend1->kill }}</div>
                                        <div class="col-md-4 countcol">
                                            {{ @$chickend1->kill + $chickend1->position_points }}
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ @$chickend1->team->logoURL }}" alt="" class="mt-2 image" />
                                @endif
                            </div>
                        </div>
                        @if (!empty($chickend1))
                        <p class="card-text p-2">{{ @$chickend1->team->name }}</p>
                        @endif

                    </div>
                </div>
                @endif

                @if ($schedule->third_match_id)
                <div class="col-md-2">
                    <div class="card">
                        <p class="card-header">{{ @$schedule->match3->name }}</p>
                        <div class="">
                            <div class="img123" style="background-image: url('{{ @$schedule->match3->map_name->imageUrl }}');">
                                {{ @$schedule->match3->time }}
                            </div>
                            <div class="img456">
                                <p class="mt-3">
                                    {{ @$schedule->match3->map }} <br />
                                    {{ @$schedule->match3->subname }}
                                </p>
                                @php
                                $chickend1 = $schedule->match3->chicken_dinner($schedule->match3->id);
                                @endphp
                                @if (!empty($chickend1))
                                <div class="totalkills ">
                                    <div class="row divrow">
                                        <div class="col-md-4 divcol me-1">KILLS</div>
                                        <div class="col-md-4 divcol">TOTAL</div>
                                    </div>
                                    <div class="row countrow mt-1">
                                        <div class="col-md-4 countcol me-1"> {{ @$chickend1->kill }}</div>
                                        <div class="col-md-4 countcol">
                                            {{ @$chickend1->kill + $chickend1->position_points }}
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ @$chickend1->team->logoURL }}" alt="" class="mt-2 image" />
                                @endif
                            </div>
                        </div>
                        @if (!empty($chickend1))
                        <p class="card-text p-2">{{ @$chickend1->team->name }}</p>
                        @endif

                    </div>
                </div>
                @endif
                @if ($schedule->fourth_match_id)
                <div class="col-md-2">
                    <div class="card">
                        <p class="card-header">{{ @$schedule->match4->name }}</p>
                        <div class="">
                            <div class="img123" style="background-image: url('{{ @$schedule->match4->map_name->imageUrl }}');">
                                {{ @$schedule->match4->time }}
                            </div>
                            <div class="img456">
                                <p class="mt-3">
                                    {{ @$schedule->match4->map }} <br />
                                    {{ @$schedule->match4->subname }}
                                </p>
                                @php
                                $chickend1 = $schedule->match4->chicken_dinner($schedule->match4->id);
                                @endphp

                                @if (!empty($chickend1))
                                <div class="totalkills ">
                                    <div class="row divrow">
                                        <div class="col-md-4 divcol me-1">KILLS</div>
                                        <div class="col-md-4 divcol">TOTAL</div>
                                    </div>
                                    <div class="row countrow mt-1">
                                        <div class="col-md-4 countcol me-1"> {{ @$chickend1->kill }}</div>
                                        <div class="col-md-4 countcol">
                                            {{ @$chickend1->kill + $chickend1->position_points }}
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ @$chickend1->team->logoURL }}" alt="" class="mt-2 image" />
                                @endif
                            </div>
                        </div>
                        @if (!empty($chickend1))
                        <p class="card-text p-2">{{ @$chickend1->team->name }}</p>
                        @endif

                    </div>
                </div>
                @endif
                @if ($schedule->fifth_match_id)
                <div class="col-md-2">
                    <div class="card">
                        <p class="card-header">{{ @$schedule->match5->name }}</p>
                        <div class="">
                            <div class="img123" style="background-image: url('{{ @$schedule->match5->map_name->imageUrl }}');">
                                {{ @$schedule->match5->time }}
                            </div>
                            <div class="img456">
                                <p class="mt-3">
                                    {{ @$schedule->match5->map }} <br />
                                    {{ @$schedule->match5->subname }}
                                </p>
                                @php
                                $chickend1 = $schedule->match5->chicken_dinner($schedule->match5->id);
                                @endphp

                                @if (!empty($chickend1))
                                <div class="totalkills ">
                                    <div class="row divrow">
                                        <div class="col-md-4 divcol me-1">KILLS</div>
                                        <div class="col-md-4 divcol">TOTAL</div>
                                    </div>
                                    <div class="row countrow mt-1">
                                        <div class="col-md-4 countcol me-1"> {{ @$chickend1->kill }}</div>
                                        <div class="col-md-4 countcol">
                                            {{ @$chickend1->kill + $chickend1->position_points }}
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ @$chickend1->team->logoURL }}" alt="" class="mt-2 image" />
                                @endif
                            </div>
                        </div>
                        @if (!empty($chickend1))
                        <p class="card-text p-2">{{ @$chickend1->team->name }}</p>
                        @endif

                    </div>
                </div>
                @endif
                @if ($schedule->sixth_match_id)
                <div class="col-md-2">
                    <div class="card">
                        <p class="card-header">{{ @$schedule->match6->name }}</p>
                        <div class="">
                            <div class="img123" style="background-image: url('{{ @$schedule->match6->map_name->imageUrl }}');">
                                {{ @$schedule->match6->time }}
                            </div>
                            <div class="img456">
                                <p class="mt-3">
                                    {{ @$schedule->match6->map }} <br />
                                    {{ @$schedule->match6->subname }}
                                </p>
                                @php
                                $chickend1 = $schedule->match6->chicken_dinner($schedule->match6->id);
                                @endphp

                                @if (!empty($chickend1))
                                <div class="totalkills ">
                                    <div class="row divrow">
                                        <div class="col-md-4 divcol me-1">KILLS</div>
                                        <div class="col-md-4 divcol">TOTAL</div>
                                    </div>
                                    <div class="row countrow mt-1">
                                        <div class="col-md-4 countcol me-1"> {{ @$chickend1->kill }}</div>
                                        <div class="col-md-4 countcol">
                                            {{ @$chickend1->kill + $chickend1->position_points }}
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ @$chickend1->team->logoURL }}" alt="" class="mt-2 image" />
                                @endif
                            </div>
                        </div>
                        @if (!empty($chickend1))
                        <p class="card-text p-2">{{ @$chickend1->team->name }}</p>
                        @endif

                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function Schedule(id, value, entery) {
            var newData = entery + "=" + value;
            $.ajax({
                url: "{{ url('schedule') }}/" + id,
                type: "PUT",
                data: newData,
                success: function(data) {
                    location.reload();
                }
            })
        }
    </script>
    @endpush
</x-new-master-layout>