<div class="container-fluid">
    <div class="col-xs-12 text-center">
        Privacy:
        <button type="button"
            data-state="{{ $album->getAttribute('public') ? 'public' : 'private' }}"
            data-url="{{ URL::route('albums.api.privacy', [$album->getKey()]) }}"
            class="btn btn-default btn-sm toggle-privacy">
            @if ($album->getAttribute('public'))
                <i class="fa fa-check text-success"></i>&nbsp;Public
            @else
                <i class="fa fa-ban text-danger"></i>&nbsp;Private
            @endif
        </button>
    </div>
</div>
