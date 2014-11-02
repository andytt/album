<div class="row">
@foreach ($photos->toArray() as $idx => $photo)
    <div class="col-xs-12 col-md-3">
        <a href="{{ URL::route('albums.photos.show', [$album->getKey(), $photo['id']]) }}" class="thumbnail">
            <img src="{{ URL::route('albums.photos.show', [$album->getKey(), $photo['id']]) }}">
        </a>
    </div>

    @if (0 === ($idx + 1) % 4)
        <div class="clearfix hidden-xs"></div>
    @endif
@endforeach
</div>
