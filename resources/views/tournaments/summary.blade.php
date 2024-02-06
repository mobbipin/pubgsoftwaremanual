<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @push('scripts')
    <link rel="stylesheet" href="{{ asset('pubg/css/style.css') }}">
    @endpush
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>

<style>
    /* top card */
    .col-lg-2 {
        border: 2px solid #8cb736;
        padding: 5px;

    }

    .polygon {
        /* clip-path: polygon(5% 0, 95% 0, 100% 4%, 100% 95%, 95% 100%, 5% 100%, 0 95%, 0 5%); */
    }

    .top-card {
        background: rgb(0, 0, 0);
        background: linear-gradient(0deg, rgba(0, 0, 0, 1) 5%, rgba(11, 14, 4, 1) 12%, rgba(140, 183, 54, 1) 25%);
        height: 235px;

    }

    .top-card-img {
        width: calc(100% / 2);
        margin-left: 10px;
    }

    .top-card-div {
        margin-top: -20px;
    }

    .top-card-div h2 {
        margin-top: 120px;
        color: #fff;
        font-size: 2rem !important;
    }

    .kills-h2 {
        color: #8cb736;
        font-size: 1.3rem;
    }

    /* middle card */
    .middle-card {
        position: absolute;
        background: rgb(140, 183, 54);
        background: linear-gradient(86deg, rgba(140, 183, 54, 1) 67%, rgba(11, 14, 4, 1) 100%, rgba(11, 14, 4, 1) 100%);
        width: 236px;
        margin-right: -26px;
        padding-left: 1px;
        margin-left: -14px;
    }

    .middle-card-img {
        height: 40px;
        clip-path: polygon(20% 0%, 80% 0%, 100% 20%, 100% 80%, 80% 100%, 20% 100%, 0% 80%, 0% 20%);
        width: 40px;
    }

    .bottom-card {
        background: #333;
    }
</style>

<body>

    <!-- /********
 * HEAD *
 ********/ -->
    <section class="body1">
        <div class="container-fluid">
            <div class="header">
                <nav class="navbar">
                    <ul class="navbar">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link item1">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="./tournament.html" class="nav-link item2">Tournaments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item3">Log Out</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- /********
 * |END HEAD *
 ********/ -->

        <!--
/**********
 * SLIDER *
 **********/ -->

        <div class="container-fluid">
            <div class="row row1">
                <div class="col-md-5 col1">
                    <h1 class="head1">TOURNAMENTS</h1>
                    <p class="para1">HOME >> <span class="tournaments">TOURNAMENTS</span></p>
                </div>
            </div>
        </div>
    </section>


    <!-- match summary -->
    <section>
        <div class="col d-flex justify-content-around mb-5">
            <!-- card -->
            <div class="col-lg-2">
                <div class="polygon">
                    <div class="top-card p-2">
                        <h2>#1</h2>
                        <div class="d-flex top-card-div">
                            <h2>12</h2>
                            <img src="{{asset('images/MORTAL.png')}}" class="top-card-img" alt="player image">
                        </div>
                        <h2 class="mt-1 kills-h2">HIGHEST KILLS</h2>
                    </div>
                    <div class="d-flex justify-content-center middle-card">
                        <img src="{{asset('images/009_256.png')}}" class="middle-card-img" alt="image logo">
                        <h2>Sinister</h2>
                    </div>
                    <div class="bottom-card mt-5">
                        <h2 class="text-white ml-2">#2</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#3</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#4</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#5</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->
            <!-- card -->
            <div class="col-lg-2">
                <div class="polygon">
                    <div class="top-card p-2">
                        <h2>#1</h2>
                        <div class="d-flex top-card-div">
                            <h2>12</h2>
                            <img src="{{asset('images/MORTAL.png')}}" class="top-card-img" alt="player image">
                        </div>
                        <h2 class="mt-1 kills-h2">HIGHEST KILLS</h2>
                    </div>
                    <div class="d-flex justify-content-center middle-card">
                        <img src="{{asset('images/009_256.png')}}" class="middle-card-img" alt="image logo">
                        <h2>Sinister</h2>
                    </div>
                    <div class="bottom-card mt-5">
                        <h2 class="text-white ml-2">#2</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#3</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#4</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#5</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->
            <!-- card -->
            <div class="col-lg-2">
                <div class="polygon">
                    <div class="top-card p-2">
                        <h2>#1</h2>
                        <div class="d-flex top-card-div">
                            <h2>12</h2>
                            <img src="{{asset('images/MORTAL.png')}}" class="top-card-img" alt="player image">
                        </div>
                        <h2 class="mt-1 kills-h2">HIGHEST KILLS</h2>
                    </div>
                    <div class="d-flex justify-content-center middle-card">
                        <img src="{{asset('images/009_256.png')}}" class="middle-card-img" alt="image logo">
                        <h2>Sinister</h2>
                    </div>
                    <div class="bottom-card mt-5">
                        <h2 class="text-white ml-2">#2</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#3</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#4</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#5</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->
            <!-- card -->
            <div class="col-lg-2">
                <div class="polygon">
                    <div class="top-card p-2">
                        <h2>#1</h2>
                        <div class="d-flex top-card-div">
                            <h2>12</h2>
                            <img src="{{asset('images/MORTAL.png')}}" class="top-card-img" alt="player image">
                        </div>
                        <h2 class="mt-1 kills-h2">HIGHEST KILLS</h2>
                    </div>
                    <div class="d-flex justify-content-center middle-card">
                        <img src="{{asset('images/009_256.png')}}" class="middle-card-img" alt="image logo">
                        <h2>Sinister</h2>
                    </div>
                    <div class="bottom-card mt-5">
                        <h2 class="text-white ml-2">#2</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#3</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#4</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#5</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->
            <!-- card -->
            <div class="col-lg-2">
                <div class="polygon">
                    <div class="top-card p-2">
                        <h2>#1</h2>
                        <div class="d-flex top-card-div">
                            <h2>12</h2>
                            <img src="{{asset('images/MORTAL.png')}}" class="top-card-img" alt="player image">
                        </div>
                        <h2 class="mt-1 kills-h2">HIGHEST KILLS</h2>
                    </div>
                    <div class="d-flex justify-content-center middle-card">
                        <img src="{{asset('images/009_256.png')}}" class="middle-card-img" alt="image logo">
                        <h2>Sinister</h2>
                    </div>
                    <div class="bottom-card mt-5">
                        <h2 class="text-white ml-2">#2</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#3</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#4</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                        <h2 class="text-white ml-2">#5</h2>
                        <div class="d-flex justify-content-around">
                            <h2 class="text-white">Name</h2>
                            <h2 class="text-white">10</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>