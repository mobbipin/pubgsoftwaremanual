<x-new-master-layout :round="$round" :tournament="$tournament">
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @push('styles')
    <style>
        .txtedit {
            display: none;
            width: 99%;
            height: 30px;
        }
    </style>
    @endpush
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <th class="text-center">Rank</th>
                <th class="text-center">Prize</th>
            </thead>

            <tbody>
                @forelse(@$prizePool as $index=>$prize)
                <tr>
                    <td class="text-center">
                        {{$prize->position}}
                    </td>
                    <td class="text-center ">
                        <div class='edit'>
                            {{$prize->prize}}
                        </div>
                        <input type='text' class='txtedit' value="{{@$prize->prize}}" id='{{@$prize->position}}-{{@$prize->id}}'>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>

        </table>
        @if(empty($prizePool[0]))
        <div class=" modal-header">
            <h5 class="addtournament text-dark text-center">ENTER PRIZE POOL </h5>
        </div>
        <div class="modal-body">
            <form id="tournmentForm" method="post" action="{{url('prize-pool-save')}}">
                @csrf
                <div class="row">
                    <input type="hidden" name="tournament_id" value="{{$tournament[0]->id}}">
                    <input type="hidden" name="round_id" value="{{$round->id}}">
                    <div class="col-lg-12 d-flex flex-wrap justify-content-between add-tournament-form">
                        <div class="col-3">
                            <label for="">1st Prize</label>
                            <input type="number" name="1" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">2nd Prize</label>
                            <input type="number" name="2" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">3rd Prize</label>
                            <input type="number" name="3" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">4th Prize</label>
                            <input type="number" name="4" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">5th Prize</label>
                            <input type="number" name="5" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">6th Prize</label>
                            <input type="number" name="6" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">7th Prize</label>
                            <input type="number" name="7" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">8th Prize</label>
                            <input type="number" name="8" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">9th Prize</label>
                            <input type="number" name="9" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">10th Prize</label>
                            <input type="number" name="10" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">11th Prize</label>
                            <input type="number" name="11" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">12th Prize</label>
                            <input type="number" name="12" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">13th Prize</label>
                            <input type="number" name="13" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">14th Prize</label>
                            <input type="number" name="14" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">15th Prize</label>
                            <input type="number" name="15" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">16th Prize</label>
                            <input type="number" name="16" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">17th Prize</label>
                            <input type="number" name="17" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">18th Prize</label>
                            <input type="number" name="18" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">WWC Prize</label>
                            <input type="number" name="wwc" class="form-control" value="0">
                        </div>
                        <div class="col-3">
                            <label for="">MVP Prize</label>
                            <input type="number" name="mvp" class="form-control" value="0">
                        </div>
                        <div class="d-flex justify-content-around col-4 mb-2">
                            <div class="col-1 mt-3"><button class="btn btn-lg btn52 btn-success">SAVE</button></div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        @endif

    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @push('scripts')
    <script>
        $(document).ready(function() {
            $('.edit').click(function() {
                $('.txtedit').hide();
                $(this).next('.txtedit').show().focus();
                $(this).hide();
            });

            // Save data
            $(".txtedit").focusout(function() {

                // Get edit id, field name and value
                var id = this.id;
                var split = id.split("-");
                var changeable_id = split[1];
                var value = $(this).val();
                // Hide Input element
                $(this).hide();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{url('prize-update')}}/" + changeable_id,
                    type: 'put',
                    data: 'prize' + "=" + value,
                    success: function(response) {
                        location.reload();
                        if (response.showError) {
                            alert(response.error);
                        }

                    },
                    error: function(request, error) {
                        console.log(request);
                        alert("Error");
                    }
                });
            });
        });
    </script>
    @endpush
</x-new-master-layout>