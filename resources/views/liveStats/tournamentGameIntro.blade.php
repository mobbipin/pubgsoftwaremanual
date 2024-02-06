<x-new-master-layout :round="$round" :tournament="$tournament">
    @auth
    <x-new-yellow-bar :round="$round"></x-new-yellow-bar>
    @endauth
    @push('styles')
    <style>
        .result-row {
            padding: 2px;
            font-weight: bold;
            color: white;
            justify-content: space-between;
        }
    </style>
    @endpush


    <section class="d-flex justify-content-center">
        <div class="container" style="width: 380px;">
            <div class=" result-row primary-bg m-1 text-center text-uppercase">
                <span class="secondary-font-color"> {{@$tournament[0]->name}}</span>
            </div>
            <div class=" result-row  secondary-bg m-1 text-center text-uppercase" style="font-size: 30px;">
                <span class="primary-font-color">{{@$round->name}}-{{@$round->subname}}</span>
            </div>
            <div class=" result-row  fourth-bg m-1 text-center text-uppercase" style="font-size: 25px;">
                <span class="primary-font-color">{{@$match->name}}-{{@$match->map}}</span>
            </div>
        </div>
    </section>

    @push ('scripts')
    <script>
        var channel = pusher.subscribe('game-intro-channel');
        channel.bind('game-intro-' + '{{$round->id}}', function(data) {
            location.reload();
        });
    </script>
    @endpush
</x-new-master-layout>