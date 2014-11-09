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
    @if ($isAlbumCreator)
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <ul class="nav nav-pills nav-justified visible-md visible-lg" role="tablist">
                <li role="presentation"><a href="#" class="image-rotate-left"><i class="fa fa-rotate-left"></i>&nbsp;Rotate&nbsp;Left</a></li>
                <li role="presentation"><a href="#" class="image-rotate-right">Rotate&nbsp;Right&nbsp;<i class="fa fa-rotate-right"></i></a></li>
            </ul>
            <ul class="nav nav-pills nav-justified visible-xs visible-sm" role="tablist">
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Edit&nbsp;Photo&nbsp;<i class="fa fa-caret-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a href="#" class="image-rotate-left"><i class="fa fa-rotate-left"></i>&nbsp;Rotate&nbsp;Left</a></li>
                        <li role="presentation"><a href="#" class="image-rotate-right">Rotate&nbsp;Right&nbsp;<i class="fa fa-rotate-right"></i></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    @endif
</div>

@stop

@section('scripts')

<script>
    (function ($, location) {
        $(function () {
            $('#album-settings').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

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

            $('.image-rotate-left').on('click', function (e) {
                e.preventDefault()
                $.getJSON('{{ URL::route('albums.photos.api.rotate', [$album->getKey(), $photo->getKey(), 'left']) }}', function (rep) {
                    location.reload();
                });
            });

            $('.image-rotate-right').on('click', function (e) {
                e.preventDefault();
                $.getJSON('{{ URL::route('albums.photos.api.rotate', [$album->getKey(), $photo->getKey(), 'right']) }}', function (rep) {
                    location.reload()
                });
            });
        });
    })(window.jQuery, window.location);
</script>

@stop
