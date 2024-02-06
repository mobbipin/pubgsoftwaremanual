    <style>
        .player-img {
            position: relative;
            left: 10rem;
            height: 505px;
        }

        .border-1 {
            border: 6px solid var(--clr-white-high);

        }

        .bg-1 {
            background-color: var(--clr-white-high);
            z-index: -11;
        }

        .border-2 {
            border: 2px solid var(--clr-white-high);
        }

        .bg-2 {
            /*  padding: 25px; */
            z-index: -11;
        }

        .rank-1 {
            position: relative;
            top: 25px;
            left: 25px;
            font-size: 100px;
        }
    </style>

    <section class="d-flex justify-content-center align-items-center">
        <div class="frame-height padding-top">
            <div class="d-flex justify-content-center mb-2">
                <h1 class="display-1 text-center font-weight-bold third-color-border animate__animated animate__fadeInDown animate__delay-1s">TOP FRAGGER</h1>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="col-5">
                    <div class="border-1 fourth-bg clip-path  animate__animated animate__fadeInLeft animate__delay-2s">
                        <div class="bg-1 fourth-bg">
                            <div class="border-2 fourth-bg clip-path">
                                <div class="bg-2 primary-bg">
                                    <div class="animate__animated animate__fadeIn animate__delay-3s">
                                        <div class="card-head primary-bg">
                                            <div class="row cont1 primary-bg animate__animated animate__fadeInLeft animate__delay-1s">
                                                <h1 class="rank-1 ml-3 primary-font-color"></h1>
                                                @if ($top_player->player->photoURL)
                                                <img src="{{ $top_player->player->photoURL }}" class="player-img  animate__animated animate__fadeIn animate__delay-4s" alt="team player image">
                                                @else
                                                <img src="{{ asset('pubg/character/char1.png') }}" class="player-img  animate__animated animate__fadeIn animate__delay-4s">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row card-body player-info d-flex  secondary-bg">
                                            <div class="col-3">
                                                <img src="{{ $top_player->team->logoURL }}" class="team-logo" alt="logo image">
                                            </div>
                                            <div class="col-9 col text-center">
                                                <h2 class="display-3 text-start primary-font-color team-name">{{ $top_player->player->name }}</h2>
                                                <h3 class="text-start secondary-font-color " style="font-size: 40px;">{{ $top_player->team->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- statistics table -->
                <!-- <div class="col-7 mb-3 animate__animated animate__fadeInRight animate__delay-1s">
                    <table class="table table-lg table-borderless align-middle mb-0 bg-transparent">
                        <thead class="primary-bg">
                            <tr class="primary-bg">
                                <th colspan="2">
                                    <h1 class="display-3 pt-2 text-center primary-font-color">PLAYER STATISTICS</h1>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="player-img animate__animated animate__fadeIn animate__delay-3s">
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mt-3 ml-5">
                                            <h1 class="display-4 fw-bold mb-1 primary-font-color">TOTAL KILLS </h1>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h1 class=" displaay-4 fw-normal secondary-font-color mb-1">{{ $top_player->totalKill }}</h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mt-3 ml-5">
                                            <h1 class="display-4 fw-bold mb-1 primary-font-color">MATCH CONT.</h1>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h1 class=" displaay-4 fw-normal secondary-font-color mb-1">{{ $top_player->contribution }}%
                                    </h1>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="mt-3 ml-5">
                                            <h1 class="display-4 fw-bold mb-1 primary-font-color">OVERALL RANK </h1>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h1 class=" displaay-4 fw-normal secondary-font-color mb-1">#{{ $top_player->rank }}</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
            </div>
        </div>
    </section>
