<!-- ==========Header Section Starts Here========== -->
<header class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-10" style="margin-top: 20px;">
                <div class="header-holder d-flex flex-wrap justify-content-between align-items-center">
                    <div class="brand-logo d-none d-lg-inline-block">
                        <div class="menu-area">
                            <ul class="menu">
                                <li>
                                    <a href="/" class="active">HOME</a>
                                </li>
                                <li>
                                    <a href="{{ route('tournament.index') }}">TOURNAMENTS</a>
                                </li>
                                @if (@$round->id)
                                <li>
                                    <a href="{{url('/tournament/'.$round->tournament->id)}}">
                                        {{ $round->tournament->name }}
                                </li>
                                <li>
                                    <a href="{{url('/round/'.$round->id)}}">
                                        {{ $round->name }}
                                </li>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#editRound" onclick="EditViewRound('{{ $round->id }}')">
                                        <i class="bi bi-gear"></i>
                                    </a>
                                </li>
                                @endif

                            </ul>

                            <!-- toggle icons -->
                            <div class="header-bar d-lg-none">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="ellepsis-bar d-lg-none">
                                <i class="icofont-info-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="header-menu-part">
                    <div class="header-bottom">
                        <div class="header-wrapper justify-content-lg-end">
                            <div class="mobile-logo d-lg-none">
                                <a href="/"><img src="{{asset('pubg/logo/logo.png')}}" alt="logo"></a>
                            </div>
                            <div class="menu-area">
                                <a href="{{ route('logout') }}" class="signup btn-yellow"> <span>LOGOUT</span></a>

                                <!-- toggle icons -->
                                <div class="header-bar d-lg-none">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <div class="ellepsis-bar d-lg-none">
                                    <i class="icofont-info-square"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
</header>
<!-- ==========Header Section Ends Here========== -->