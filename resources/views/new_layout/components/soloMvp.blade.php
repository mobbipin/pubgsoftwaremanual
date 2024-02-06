<x-new-master-layout>
    
    <style>
        * {
            color: #333 !important;
        }

        .player-img {
            position: relative;
            right: 2vw;
            height: 275px;
        }
    </style>

    <div class="container padding-top">
        <div class="d-flex justify-content-center mb-2">
        <h1 class="display-3 text-center font-weight-bold primary-color">MOST VALUABLE PLAYER</h1>
        <h3 class="mt-5 ml-3 fourth-color">MATCH 6</h3>
        </div>
        <div class="col d-flex">
            <div class="col-4 mb-3 animate__animated animate__fadeIn animate__delay-1s">
                <div class="card-head primary-b primary-bg clip-path-top">
                    <div class="col d-flex">
                        <h1 class="display-4 col-3 text-start mt-3 fourth-color secondary-color">#1</h1>
                        <img src="{{asset('images/MORTAL.png')}}" class="col-9 mt-3 player-img animate__animated animate__fadeIn animate__delay-2s" alt="team player image">
                    </div>
                </div>
                <div class="card-body d-flex p-1  secondary-bg clip-path-bottom">
                    <div class="col-4">
                        <img src="https://media.discordapp.net/attachments/917128755573583942/917141276879630456/TEAM_PYRO.png" alt="logo image">
                    </div>
                    <div class="col-8 col mt-2">
                        <h3 class="text-start fourth-color"> player B21</h3>
                        <h4 class="text-start primary-color">Team B2</h3>
                    </div>
                </div>
            </div>
            <!-- statistics table -->
            <div class="col-7 mb-3">
                <table class="table table-lg table-borderless align-middle mb-0 bg-white">
                    <thead class="primary-bg">
                        <tr class="primary-bg">
                            <th colspan="2"><h2 class="text-center fourth-color">PLAYER STATISTICS</h2></th>
                        </tr>
                    </thead>
                    <tbody class="player-img animate__animated animate__fadeIn animate__delay-3s">
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <h3 class="fw-bold text-dark mb-1">KILLS </h3>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 class="fw-normal fourth-color mb-1">3</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <h3 class="fw-bold text-dark mb-1">MATCH CONT.</h3>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 class="fw-normal fourth-color text-dark mb-1">30%</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <h3 class="fw-bold text-dark mb-1">OVERALL KILLS </h3>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 class="fw-normal fourth-color text-dark mb-1">52</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="ms-3">
                                        <h3 class="fw-bold text-dark mb-1">OVERALL DAMAGE</h3>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 class="fw-normal fourth-color text-dark mb-1">#23</h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-new-master-layout>