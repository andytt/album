<div class="row">
@foreach ($photos as $idx => $photo)
    <div class="col-xs-12 col-md-3">
        <div class="thumbnail">
            <a href="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey() . '.jpg']) }}">
                <img src="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey() . '.jpg']) }}">
            </a>
            <div class="caption">
                <h3>
                    @if ($photo->getAttribute('name'))
                        <a href="{{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()]) }}}"><span>{{{ $photo->getAttribute('name') }}}</span></a>
                    @else
                        <a href="{{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey()]) }}}"><em>Empty&nbsp;Name</em></a>
                    @endif

                    @if ($isAlbumCreator)
                    <span class="pull-right">
                        <a href="{{ URL::route('albums.photos.api.settings', [$album->getKey(), $photo->getKey()]) }}"
                            class="photo-navicon">
                            <i class="fa fa-navicon"></i>
                        </a>
                    </span>
                    @endif
                </h3>
            </div>
        </div>
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
