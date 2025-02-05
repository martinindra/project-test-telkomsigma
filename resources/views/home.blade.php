@include('template.header')
<div class="container">
    @include('template.navbar')

    {{-- <img src="https://acloserlisten.com/wp-content/uploads/2020/01/video-game-banner.jpg" alt=""> --}}
    <div class="hero-image">
        <div class="hero-text">
            <h1>Welcome to GAME</h1>
            <p>All About Game</p>
        </div>
    </div>

    <div class="container my-2">
        <div class="row align-items-center py-5">
            <div class="col-lg-5 mt-5">
                <div class="about-image text-center wow slideInLeft  data-wow-delay=2s data-wow-duration=2s">
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/013/381/423/small/game-console-joystick-glowing-neon-buttons-signs-bright-signboard-light-banner-easy-to-edit-illustration-vector.jpg"
                        alt="">
                </div>
                <!-- image -->
            </div>
            <!-- /col -->
            <div class="col-lg-7">
                <h4 class="sub-heading mt-5">About Us</h4>
                <h1 class="titel-style mb-2 mt-4">We Have Information About Game</h1>
                <p class="subtitle-style">
                    A game is a structured type of play, usually undertaken for entertainment or fun, and
                    sometimes used as an educational tool.[1] Many games are also considered to be work (such as
                    professional players of spectator sports or games) or art (such as jigsaw puzzles or games
                    involving an artistic layout such as mahjong, solitaire, or some video games).
                </p>
                {{-- <a class="link-style mt-5" href="">Let's Learn About Us More</a> --}}
            </div>
        </div>
    </div>
    <!-- about-area-end -->


    <h3 class="text-center my-5">All Game Information</h3>
    {{-- card for top 5 games --}}
    <div class="d-flex flex-row-reverse">
        <div class="mx-5">
            <form class="form-inline row" method="POST" action="{{ route('search.submit') }}">
                @csrf
                <div class="form-group border border-primary rounded col-8">
                    <input type="text" class="form-control-plaintext" id="searchGame" name="searchGame"
                        placeholder="Search Game...">
                </div>
                <button type="submit" class="btn btn-success mx-1 col">Search</button>
            </form>
        </div>
        <div class="dropdown mx-2">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Platform
            </button>
            <ul class="dropdown-menu">

                <li><a class="dropdown-item" href="0">All </a></li>
                @foreach ($platforms as $key => $row)
                    <li><a class="dropdown-item" href="{{ $key + 1 }}">{{ $row->platform }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row mt-2">
        @if ($datas[0])
            @foreach ($datas as $row)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="{{ $row->thumbnail }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $row->title }}</h5>
                            <p class="card-text"><i>Released : {{ $row->release_date }}</i></p>
                            <p class="card-text"><i>Last Update : {{ $row->updated_at }}</i></p>
                            <p class="card-text text-truncate" style="max-length">
                                {{ $row->short_description }}</p>
                            <div class="row">
                                <p class="col-8 card-text"><i>{{ $row->platform }}</i></p>
                                <a href="detail/{{ $row->id }}" class="btn btn-primary col text-end">See Detail
                                    ></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h2 class="text-center my-5">Game Data Not Found</h2>
        @endif
    </div>
    {{-- end card --}}
</div>
{{-- pagination --}}
<div class="container text-center">
    {!! $datas->links() !!}
</div>

@include('template.footer')
