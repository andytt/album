<div class="container-fluid">
    <div class="col-xs-12 text-center">
        <a href="{{ URL::route('albums.photos.destroy', [$album->getKey(), $photo->getKey()]) }}"
            class="btn btn-danger btn-sm delete-photo">
                <i class="fa fa-trash"></i>&nbsp;Delete&nbsp;Photo
        </a>
    </div>
</div>
