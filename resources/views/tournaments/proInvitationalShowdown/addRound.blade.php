@extends('layout.main')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/tournament/addRound.css')}}">
@endpush

@section('topBase')

<section>
    <div class="container">
        <button class="btn btn21">ADD ROUND</button>
    </div>


    <div class="main">
        <div class="row row2">
            <div class="col-md-12">Add Round
                <button class="btn btn22">RESET ALERT</button>
            </div>  
        </div>
        
        <form>
            <div class="row row3">
                <div class="col-md-6">
                    <label>NAME</label>
                    <input type="text" placeholder="Name">
                </div>

                <div class="col-md-6">
                    <label>SUBNAME</label>
                    <input type="text" placeholder="Subname">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                    <label>LIVE GAME ID</label>
                    <input type="text" placeholder="Live Game ID">
                </div>

                <div class="col-md-6">
                    <label>TAG LINE</label>
                    <input type="text" placeholder="Tag Line">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                    <label>RESULT PER SINGLE PAGE</label>
                    <input type="text" placeholder="Result Per Page Single">
                </div>

                <div class="col-md-6">
                    <label>DAYS</label>
                    <input type="text" placeholder="Days">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                    <label>OVERALL RESULT PER PAGE</label>
                    <input type="text" placeholder="Result Per Page Overall">
                </div><section>
    <div class="container">
        <button class="btn btn21">ADD ROUND</button>
    </div>


    <div class="main">
        <div class="row row2">
            <div class="col-md-12">Add Round
                <button class="btn btn22">RESET ALERT</button>
            </div>  
        </div>
        
        <form>
            <div class="row row3">
                <div class="col-md-6">
                    <label>NAME</label>
                    <input type="text" placeholder="Name">
                </div>

                <div class="col-md-6">
                    <label>SUBNAME</label>
                    <input type="text" placeholder="Subname">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                <label>LIVE GAME ID</label>
                    <input type="text" placeholder="Live Game ID">
                </div>

                <div class="col-md-6">
                <label>TAG LINE</label>
                    <input type="text" placeholder="Tag Line">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                <label>SINGLE PAGE RESULT</label>
                    <input type="text" placeholder="Result Per Page Single">
                </div>

                <div class="col-md-6">
                <label>DAYSS</label>
                    <input type="text" placeholder="Days">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                <label>OVERALL RESULT PER PAGE</label>
                    <input type="text" placeholder="Result Per Page Overall">
                </div>

                <div class="col-md-6">
                <label>TIME</label>
                    <input type="text" placeholder="Time">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                <label>ENTRY PER PAGE</label>
                    <input type="text" placeholder="Entry Per Page">
                </div>

                <div class="col-md-6">
                <label>CHANNEL</label>
                    <input type="text" placeholder="Channel">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                <label>ENTER PER ROW</label>
                    <input type="text" placeholder="Enter Per Row">
                </div>

                <div class="col-md-6">
                <label>FOURTH COLOR</label>
                    <input type="text" placeholder="Fourth Color">
                </div>
            </div>


            <div class="row row4">
                <div class="col-md-4 col4">
                    <input type="checkbox"> <span class="check">Need Logo?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"> <span class="check">Is test?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"><span class="check">Show Alert?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"><span class="check">Show Roster?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"><span class="check">Show Lower?</span>
                </div>
            </div>

            <div class="row row5">
                <div class="col-md-12">
                    <button class="btn btn51">CANCEL</button>
                    <button class="btn btn52">ADD</button>
                </div>
            </div>

          </form>
    </div>
</section>

                <div class="col-md-6">
                    <label for="">TIME</label>
                    <input type="text" placeholder="Time">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                    <label for="">ENTRY PER PAGE</label>
                    <input type="text" placeholder="Entry Per Page">
                </div>

                <div class="col-md-6">
                    <label for="">CHANNEL</label>
                    <input type="text" placeholder="Channel">
                </div>
            </div>

            <div class="row row3">
                <div class="col-md-6">
                    <label for="">ENTER PER ROW</label>
                    <input type="text" placeholder="Enter Per Row">
                </div>

                <div class="col-md-6">
                    <label for="">FOURTH COLOR</label>
                    <input type="text" placeholder="Fourth Color">
                </div>
            </div>


            <div class="row row4">
                <div class="col-md-4 col4">
                    <input type="checkbox"> <span class="check">Need Logo?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"> <span class="check">Is test?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"><span class="check">Show Alert?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"><span class="check">Show Roster?</span>
                </div>
                <div class="col-md-4 col4">
                    <input type="checkbox"><span class="check">Show Lower?</span>
                </div>
            </div>

            <div class="row row5">
                <div class="col-md-12">
                    <button class="btn btn51">CANCEL</button>
                    <button class="btn btn52">ADD</button>
                </div>
            </div>

          </form>
    </div>
</section>

@endsection

