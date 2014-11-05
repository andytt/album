@extends('master')

@section('styles')

<style>
    body {
        padding-top: 70px;
    }
</style>

@stop

@section('body')

@include('components.menubar')

<div class="row">
    <div class="col-xs-12 col-md-6 col-md-offset-3">
        <a href="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey() . '.jpg']) }}" class="thumbnail">
            <img src="{{ URL::route('albums.photos.show', [$album->getKey(), $photo->getKey() . '.jpg']) }}">
        </a>
    </div>
</div>

@stop

@section('scripts')

<script>
    (function ($) {
        $(function () {
            $('.navbar-create-album').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

            $('.btn-add-photo').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

            $('.thumbnail').colorbox({
                closeButton: false,
                photo: true,
                maxWidth: '99%',
                maxHeight: '99%'
            });
        });
    })(window.jQuery);
</script>

@stop
