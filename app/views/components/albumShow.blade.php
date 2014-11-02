@if ($photos->isEmpty())
    <div class="text-center h4">
        This album is currently empty.
        <br />
        <br />
        <a href="{{ URL::route('albums.photos.create', [$album->getKey()]) }}" class="btn-add-photo">Add New Photos</a>
    </div>
@endif
