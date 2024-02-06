<!-- Navigation bar -->
<div class="container-fluid navbar-top">
    <div class="header">
        <nav class="navbar">
            <ul class="navbar">
                <li class="nav-item">
                    <a href="/" class="nav-link item1">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tournament.index') }}" class="nav-link item2">
                        Tournaments
                    </a>
                </li>
                @if(@$round->id)
                <li class="nav-item">
                    <button class="nav-link item3" data-toggle="modal" data-target="#editRound" onclick="EditViewRound({{ $round->id }})">
                        setting
                    </button>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link item4">Log Out</a>
                </li>
            </ul>
        </nav>
    </div>
</div>