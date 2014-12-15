<div class="row">
    <div class="col-xs-12">
        <div class="thumbnail">
            <a href="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey() . '.jpg']) }}">
                <img src="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey() . '.jpg']) }}">
            </a>
        </div>
    </div>
</div>
