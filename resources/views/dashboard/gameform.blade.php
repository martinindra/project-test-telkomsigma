@extends('dashboard.layout')
@section('title', 'Add Form')
@section('content')
    <form action="{{ route('addgame.submit') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-6">
                <label for="titleInput">Game Title</label>
                <input type="text" class="form-control" id="titleInput" name="title" placeholder="Game Title..." required>
            </div>
            <div class="form-group col-6">
                <label for="thumbnail">Game Thumbnail URL</label>
                <input type="text" class="form-control" id="thumbnail" name="thumbnail"
                    placeholder="https://example.com/image.jpg" required>
            </div>
            <div class="form-group col-12">
                <label for="shortDescriptionInput">Short Description</label>
                <textarea class="form-control" id="shortDescriptionInput" name="desc" rows="5" required></textarea>
            </div>
            <div class="form-group col-6">
                <label for="platformOption">Platform</label>
                <select class="form-control" id="platformOption" name="platform" required>
                    <option value="">Select Platform</option>
                    <option value="PC (Windows)">PC (Windows)</option>
                    <option value="Web Browser">Web Browser</option>
                    <option value="PC (Windows), Web Browser">PC (Windows), Web Browser</option>
                </select>
            </div>
            <div class="form-group col-6">
                <label for="genreInput">Game Genre</label>
                <input name="genre" type="text" class="form-control" id="genreInput"
                    placeholder="MMORPG, ACTION, ADVENTURE, MULTIPLAYER" required>
            </div>
            <div class="form-group col-6">
                <label for="publisherInput">Publisher</label>
                <input name="publisher" type="text" class="form-control" id="publisherInput" placeholder="DE STUDIO"
                    required>
            </div>
            <div class="form-group col-6">
                <label for="developerInput">Developer</label>
                <input name="developer" type="text" class="form-control" id="developerInput" placeholder="DE STUDIO"
                    required>
            </div>
            <div class="form-group col-6">
                <label for="gameUrlInput">Game URL</label>
                <input name="url" type="text" class="form-control" id="gameUrlInput"
                    placeholder="https://example.com/game-site" required>
            </div>
            <div class="form-group col-6">
                <label for="releasedate">Release Date</label>
                <input name="releasedate" type="date" class="form-control" id="releasedate" placeholder="09-29-2000"
                    required>
            </div>
            <div class="form-group col-6">
                <label for="profileInput">Profile URL</label>
                <input name="profile" type="text" class="form-control" id="profileInput" value="https://www.mmobomb.com"
                    readonly>
            </div>
        </div>
        <a type="button" class="btn btn-secondary text-white" style="text-decoration: none"
            href="javascript:history.back()">Cancel</a>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>




@endsection
