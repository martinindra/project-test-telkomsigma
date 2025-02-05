@extends('dashboard.layout')
@section('title', 'Game List')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Game List</h1>
    {{-- data table --}}
    @if (session('msg'))
        <p class="text-danger">{{ session('msg') }}</p>
    @endif

    <a type="button" class="btn btn-primary text-white" style="text-decoration: none" href="{{ route('addgame.show') }}">
        + Add Game
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Game List</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Genre</th>

                            <th>Developer</th>
                            <th>Release Date</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Genre</th>


                            <th>Developer</th>
                            <th>Release Date</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($dataGame as $item)
                            <tr>
                                <td>
                                    <img src="{{ $item->thumbnail }}" width="150" alt="" srcset="">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <p style="width:300px;height:100px;overflow: auto; text-overflow: ellipsis;">
                                        {{ $item->short_description }}
                                    </p>
                                </td>
                                <td>{{ $item->genre }}</td>


                                <td>{{ $item->developer }}</td>
                                <td>{{ $item->release_date }}</td>
                                <td class="row">
                                    <a href="/dashboard/game/{{ $item->id }}" class="col btn btn-warning btn-icon-split"
                                        data-toggle="tooltip" title="Detail of {{ $item->title }}">
                                        <span class="icon text-white">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </a>
                                    <a href="{{ route('game.update-show', $item->id) }}"
                                        class="col btn btn-primary
                                        btn-icon-split"
                                        data-toggle="tooltip" title="Edit {{ $item->title }}">
                                        <span class="icon
                                        text-white">
                                            <i class="fas fa-pen"></i>
                                        </span>
                                    </a>
                                    <a id="delete-modal-button" data-delete-link="{{ route('game.delete', $item->id) }}"
                                        data-target="#delete-modal" data-toggle="modal"
                                        class="col btn btn-danger btn-icon-split" data-toggle="tooltip"
                                        title="Delete {{ $item->title }}">
                                        <span class="icon
                                        text-white">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                    <p><i>Last Updated {{ $item->updated_at }}</i></p>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('modal')
    {{-- delete modal --}}
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Game Data?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete the game data.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="" id="delete-modal-confirm" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')
    {{-- script for modal delete --}}
    <script>
        $(document).ready(function() {
            $('#delete-modal-button').on('click', function() {
                $('#delete-modal-confirm').attr('href', $(this).data('delete-link'));
            });
        });
    </script>
@endsection
