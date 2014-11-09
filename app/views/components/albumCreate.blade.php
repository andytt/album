<h3 class="text-center">Create New Album</h3>
<form role="form" action="{{ URL::route('albums.store') }}" method="POST">
    <div class="form-group">
        <label class="sr-only" for="album-name">Album Name</label>
        <input type="text" name="albumName" class="form-control" id="album-name" placeholder="Album Name">
        @if ($errors->has('albumName'))
            <p class="text-danger">{{{ $errors->first('albumName') }}}</p>
        @endif
    </div>
    <div class="form-group">
        <label class="sr-only" for="album-description">Description</label>
        <input type="text" name="albumDescription" class="form-control" id="album-description" placeholder="Description">
        @if ($errors->has('albumDescription'))
            <p class="text-danger">{{{ $errors->first('albumDescription') }}}</p>
        @endif
    </div>
    <div class="checkbox text-center">
        <label>
            <input type="checkbox" name="albumPublic" />Public&nbsp;This&nbsp;Album
        </label>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>

