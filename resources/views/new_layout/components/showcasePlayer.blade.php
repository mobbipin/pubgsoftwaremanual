<x-new-master-layout>

<style>
    * {
        color: #333 !important;
    }

    .player-img {
        position: absolute;
        height: 100%;
        float: right;
        margin-left: 725px;
        z-index: 111;
    }

    .logo-img {
        height: 50px; 
    }

    .text-center {
        text-align: center !important;
    }

    .overall-rank-text {
        font-size: 12px;
        font-weight: 800;
    }

    .overall-rank-number {
        font-size: 30px;
        font-weight: 800;
    }

    .kills-info {
        margin-right: 26px;
    }
</style>


    <div class="container padding-top animate__animated animate__fadeInLeft animate__faster">
        <div class=" showcase-player d-flex">
            <div class="col-10 secondary-bg ">
                <img src="{{asset('images/STFU.png')}}" class="player-img animate__animated animate__fadeInLeftBig animate__slower" alt="player-image">
            </div>
            <div class="col-2">
                <!-- bottom row -->
                <div class="row primary-bg">
                    <!-- misc information -->
                    <div class="col d-flex flex-column justify-content-center align-items-end p-2 animate__animated animate__fadeInLeft animate__delay-2s  animate__slower">
                        <div class="row">
                            <div class="col d-flex justify-content-center flex-wrap">
                                <img src="{{asset('images/009.png')}}" class="logo-img" alt="logo image"><br>
                                <h6 class="display-5 text-center mt-1">SALWART ESPORTS</h6>
                                <h2 class="display-5 text-center">ACTION</h2>
                            </div>
                        </div>
                        <div>
                            <h6>KILL/MATCH</h6>
                            <h2 class="text-center">15</h2>
                        </div>
                        <div class="kills-info">
                            <h6>KILLS</h6>
                            <h2 class="text-center">30</h2>
                        </div>
                        <div>
                            <h6 class="text-center overall-rank-text">Overall Rank</h6>
                            <h2 class="text-center overall-rank-number">#16</h2>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
    </div>
</x-new-master-layout>