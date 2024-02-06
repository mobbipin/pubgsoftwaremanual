<x-new-master-layout>

    <style>
        * {
            color: #333 !important;
        }

        .top-row {
            height: 420px;
        }

        .logo-img {
            height: 50px;
        }

        .team-img {
            position: absolute;
            height: 150px;
            bottom: 0vh;
        }

        .team-members h6 {
            font-weight: 400;
        }

    </style>
    <div class="container padding-top">
        <div class="showcase-team  animate__animated animate__fadeInLeft animate__faster">

            <!-- top row -->
            <div class="top-row row secondary-bg">
                sup amigos
            </div>

            <!-- bottom row -->
            <div class="row d-flex justify-content-between primary-bg  animate__animated animate__fadeInLeft animate__delay-1s  animate__slower">
                <div class="col-3">
                    <div class="d-flex flex-column align-items-center relative mt-3">
                        <img src="{{asset('images/009.png')}}" class="logo-img" alt="logo image">
                        <h4 class="display-5 text-center mt-1">SALWART ESPORTS</h4>
                    </div>
                </div>
                <div class="col-1 pt-2 team-members">
                    <h6>Hibro</h6>
                    <h6>hibro</h6>
                    <h6>hibro</h6>
                    <h6>hibro</h6>
                </div>
                <!-- player image -->
                <div class="col-3">
                    <img src="{{asset('images/tour.jpg')}}" class="team-img player-img animate__animated animate__fadeIn animate__delay-3s animate__slower" alt="team image">
                </div>
                <!-- misc information -->
                <div class="row d-flex align-items-center col-5">
                    <div class="col-2">
                        <h6>Place</h6>
                        <h2 class="text-center">15</h2>
                    </div>
                    <div class="col-2">
                        <h6>Kills</h6>
                        <h2 class="text-center">30</h2>
                    </div>
                    <div class="col-2">
                        <h6>Total</h6>
                        <h2 class="text-center">45</h2>
                    </div>
                    <div class="col-6">
                        <h6 class="text-center">Overall Rank</h6>
                        <h2 class="text-center">#5/#16</h2>
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</x-new-master-layout>