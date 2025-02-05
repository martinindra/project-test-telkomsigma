@include('template.header')

<div class="container">
    @include('template.navbar')

    <a type="button" class="btn btn-secondary text-white" style="text-decoration: none"
        href="javascript:history.back()">Back</a>
    <h1 class="text-center my-5">{{ $data->title }}</h1>
    <div class="row mt-2">

        <div class="col-6">
            <img width="600" src="{{ $data->thumbnail }}" class="" alt="...">
        </div>
        <div class="col">
            <div class="row">

                <div class="col p-3 m-2 bg-primary text-white"><i class="bi bi-joystick"></i>
                    {{ $data->platform }}</div>
                <div class="col p-3 m-2 bg-success text-white"><i class="bi bi-info-circle-fill"></i>
                    {{ $data->publisher }}</div>
                <div class="col p-3 m-2 bg-warning"><i class="bi bi-controller"></i> {{ $data->developer }}</div>
            </div>
            <p><i>Released : {{ $data->release_date }}</i></p>
            <p>{{ $data->short_description }}</p>
            <p>{{ $data->short_description }}</p>
            <p>You can check <span><a target="blank" style="text-decoration:none"
                        href="{{ $data->game_url }}">Here</a></span></p>
            <p><i>Last Update : {{ $data->updated_at }}</i></p>
        </div>
    </div>

</div>

@include('template.footer')
