<div class="row">
@foreach ($photos as $idx => $photo)
    <div class="col-xs-12 col-md-3">
        <a href="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()]) }}" class="thumbnail">
            <img src="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()]) }}">
        </a>
    </div>

    @if (0 === ($idx + 1) % 4)
        <div class="clearfix hidden-xs"></div>
    @endif
@endforeach
</div>

@if (!empty($photos))
    <div class="row">
        <div class="col-xs-12 text-center">
            {{ $photos->links() }}
        </div>
    </div>
@endif
