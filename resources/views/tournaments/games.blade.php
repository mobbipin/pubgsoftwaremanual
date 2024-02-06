@extends('layout.main')
@push('styles')
<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/tournament/games.css')}}">
@endpush

@section('topBase')

<section>
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap">
            <!-- card -->
            <div class="col-lg-4 card mb-3">
                <!-- top -->
                <div class="d-flex justify-content-start mt-2">
                    <h6 class="mt-1"> UNKNOWN ESPORTS - UNKN </h6>
                    <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2" data-toggle="modal"
                        data-target="#exampleModal" type="button">+</button>
                </div>
                <!-- body -->
                <div class="d-flex justify-content-evenly">
                    <div class="col-4">
                        <h6 class="mr-3">Place </h6>
                        <h6 class="place-border col-9">15</h6>
                    </div>
                    <div class="col-4 d-flex flex-column">
                        <h6 class="">Kill </h6><br>
                        <div class="d-flex mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>

                    </div>
                    <div class="col-4">
                        <h6>Dead</h6>
                        <input type="checkbox" name="" id="" class="w-25">
                    </div>
                </div>
                <hr>
                <!-- footer -->
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1" id="clicks"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="decrease()">-</button>
                            <h6 class="ml-2 pt-1" ><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="increase()">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->
            <div class="col-lg-4 card mb-3">
                <!-- top -->
                <div class="d-flex justify-content-start mt-2">
                    <h6 class="mt-1"> UNKNOWN ESPORTS - UNKN </h6>
                    <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2" data-toggle="modal"
                        data-target="#exampleModal" type="button">+</button>
                </div>
                <!-- body -->
                <div class="d-flex justify-content-evenly">
                    <div class="col-4">
                        <h6 class="mr-3">Place </h6>
                        <h6 class="place-border col-9">15</h6>
                    </div>
                    <div class="col-4 d-flex flex-column">
                        <h6 class="">Kill </h6><br>
                        <div class="d-flex mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>

                    </div>
                    <div class="col-4">
                        <h6>Dead</h6>
                        <input type="checkbox" name="" id="" class="w-25">
                    </div>
                </div>
                <hr>
                <!-- footer -->
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1" id="clicks"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="decrease()">-</button>
                            <h6 class="ml-2 pt-1" ><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="increase()">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->
            <div class="col-lg-4 card mb-3">
                <!-- top -->
                <div class="d-flex justify-content-start mt-2">
                    <h6 class="mt-1"> UNKNOWN ESPORTS - UNKN </h6>
                    <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2" data-toggle="modal"
                        data-target="#exampleModal" type="button">+</button>
                </div>
                <!-- body -->
                <div class="d-flex justify-content-evenly">
                    <div class="col-4">
                        <h6 class="mr-3">Place </h6>
                        <h6 class="place-border col-9">15</h6>
                    </div>
                    <div class="col-4 d-flex flex-column">
                        <h6 class="">Kill </h6><br>
                        <div class="d-flex mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>

                    </div>
                    <div class="col-4">
                        <h6>Dead</h6>
                        <input type="checkbox" name="" id="" class="w-25">
                    </div>
                </div>
                <hr>
                <!-- footer -->
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1" id="clicks"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="decrease()">-</button>
                            <h6 class="ml-2 pt-1" ><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="increase()">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->
            <div class="col-lg-4 card mb-3">
                <!-- top -->
                <div class="d-flex justify-content-start mt-2">
                    <h6 class="mt-1"> UNKNOWN ESPORTS - UNKN </h6>
                    <button class="btn btn-sm btn-dark bg-dark counter-btn mb-3 ml-2" data-toggle="modal"
                        data-target="#exampleModal" type="button">+</button>
                </div>
                <!-- body -->
                <div class="d-flex justify-content-evenly">
                    <div class="col-4">
                        <h6 class="mr-3">Place </h6>
                        <h6 class="place-border col-9">15</h6>
                    </div>
                    <div class="col-4 d-flex flex-column">
                        <h6 class="">Kill </h6><br>
                        <div class="d-flex mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>

                    </div>
                    <div class="col-4">
                        <h6>Dead</h6>
                        <input type="checkbox" name="" id="" class="w-25">
                    </div>
                </div>
                <hr>
                <!-- footer -->
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">-</button>
                            <h6 class="ml-2 pt-1" id="clicks"><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class=" d-flex justify-content-around">
                    <div class="col-4">
                        <h6 class="text-start">ONFIRE</h6>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-around mb-3">
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="decrease()">-</button>
                            <h6 class="ml-2 pt-1" ><a href="" id="clicks">0</a></h6>
                            <button class="btn btn-sm btn-dark bg-dark ml-2 counter-btn" onclick="increase()">+</button>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="float-none">
                            <input type="checkbox" name="" id="" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="container">
                    <form>
                        <h5 class="modal-title text-start" id="exampleModalLabel">Add Players</h5>
                        <div class="d-flex">
                            <div class="form-group col-lg-6">
                                <label for="">Game ID</label>
                                <input type="email" class="form-control" id="exampleInputId"
                                    aria-describedby="emailHelp" placeholder="Pubg ID">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="">Team</label>
                                <input type="text" class="form-control" id="exampleInputTeam"
                                    placeholder="Team">
                            </div>
                        </div>
                        <textarea name="" class="border border-muted" id="" cols="40" rows="10"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn add-btn">Add</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var clicks = 0; 

    function increase() {
        clicks += 1; 
        document.getElementById('increase').innerHTML = clicks;
    }

    function decrease() {
        clicks -= 1; 
        document.getElementById('decrease').innerHTML = clicks;
    }
</script>

@endsection
