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
    <div class="col-xs-12"><hr /></div>
    <div class="col-xs-12 text-center">
        <form role="form" method="POST" action="{{ URL::route('albums.destroy', [$album->getKey()]) }}">
            <input type="hidden" name="_method" value="DELETE" />
            <button type="submit" class="btn btn-danger btn-sm delete-album"><i class="fa fa-trash"></i>&nbsp;Delete&nbsp;Album</button>
        </form>
    </div>
</div>
