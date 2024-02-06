<x-new-master-layout>
            <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop ending here -->

    <!-- ==========shape image Starts Here========== -->
    <div class="body-shape">
        <img src="assets/images/shape/body-shape.png" alt="shape">
    </div>
    <!-- ==========shape image end Here========== -->

        {{-- header here --}}
        @include('new_layout.components.header')


    <!-- ===========Banner Section start Here========== -->
    <section class="banner-section" style="background-image: url('images/tour.jpg');">
        <div class="container">
                <div class="banner-content text-start">
                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="display-3 clr-turquoise">
                                UPCOMING
                                <br />
                                <span class="heading">TOURNAMENTS</span>
                            </h2>
                            <p>
                                You have to show you have ambition as a team, as a group of
                                players, show you want to win.
                            </p>
                            <button class="btn button1 bg-yellow pt-3">
                                <h5>View More</h5>
                            </button>
                        </div>
                    </div>
                </div>
                
                {{-- <div
                    class="banner-thumb d-flex flex-wrap justify-content-center justify-content-between align-items-center align-items-lg-end">
                    <div class="banner-thumb-img ml-xl-50-none">
                        <a href="team-single.html"><img src="{{asset('images/004.png')}}" alt="banner-thumb"></a>
                    </div>
                    
                    <div class="banner-thumb-img mr-xl-50-none">
                        <a href="team-single.html"><img src="{{asset('images/008.png')}}" alt="banner-thumb"></a>
                    </div>
                    
                </div> --}}
        </div>
    </section>
    <!-- ===========Banner Section Ends Here========== -->
</x-new-master-layout>