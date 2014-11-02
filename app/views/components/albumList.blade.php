<div class="row">
@foreach ($albums as $idx => $album)
    <div class="col-xs-12 col-md-3">
        <div class="thumbnail">
            {{-- */ $photo = $album->photos()->first(); /* --}}
            <a href="{{ URL::route('albums.show', [$album->getKey()]) }}">
            @if (!empty($photo))
                <img src="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()]) }}">
            @else
                <img data-src="holder.js/100%x200/font:PT Mono/text:Empty Album" alt="This album is currently empty.">
            @endif
            </a>
            <div class="caption">
                <h3>{{{ $album->getAttribute('name') }}}</h3>
            </div>
        </div>
    </div>

    @if (0 === ($idx + 1) % 4)
        <div class="clearfix hidden-xs"></div>
    @endif
@endforeach
</div>
