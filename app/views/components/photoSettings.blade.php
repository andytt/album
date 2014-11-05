<div class="container-fluid">
    <div class="col-xs-12 text-center">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-share-alt"></i>
            </span>
            <input type="text" class="form-control photo-url" value="{{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()]) }}}">
        </div>
    </div>
    <div class="col-xs-12"><hr /></div>
    <div class="col-xs-12 text-center">
        <form role="form" method="POST" action="{{ URL::route('albums.photos.update', [$album->getKey(), $photo->getKey()]) }}">
            <input type="hidden" name="_method" value="PATCH" />
            <div class="form-group">
                <label for="photo-name">Photo Name</label>
                <input
                    type="text"
                    name="photoName"
                    class="form-control"
                    id="photo-name"
                    placeholder="Photo Name"
                    value="{{{ $photo->getAttribute('name') ?: '' }}}"
                />
            </div>
            <div class="form-group">
                <label for="photo-description">Photo</label>
                <input
                    type="text"
                    name="photoDescription"
                    class="form-control"
                    id="photo-description"
                    placeholder="Photo Description"
                    value="{{{ $photo->getAttribute('description') ?: '' }}}"
                />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-xs-12"><hr /></div>
    <div class="col-xs-12 text-center">
        <a href="{{ URL::route('albums.photos.destroy', [$album->getKey(), $photo->getKey()]) }}"
            class="btn btn-danger btn-sm delete-photo">
                <i class="fa fa-trash"></i>&nbsp;Delete&nbsp;Photo
        </a>
    </div>
</div>
