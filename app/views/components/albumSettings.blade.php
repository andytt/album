<h4 class="text-center">
    <a href="{{ URL::route('albums.api.privacy', [$album->getKey()]) }}" class="toggle-privacy">
        @if ($album->getAttribute('public'))
            <i class="fa fa-check text-success"></i>&nbsp;Public
        @else
            <i class="fa fa-ban text-danger"></i>&nbsp;Private
        @endif
    </a>
</h4>
