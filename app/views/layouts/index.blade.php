@extends('master')

@section('styles')

<style>
    body {
        padding-top: 70px;
    }

    #container {
        position: relative;
        width: 100%;
        height: 100%;
        display: table;
    }

    #album-show-container {
        width: 100%;
        height: auto;
        display: table-cell;
        vertical-align: middle;
    }
</style>

@stop

@section('body')

@include('components.menubar')

<div id="container">
    <div id="album-show-container">
        @if (!$albums->isEmpty())
            <div class="col-md-12">
                @include('components.albumList')
            </div>
        @else
            <div class="text-center h4">
                Hey, let's <a class="navbar-create-album" href="{{ URL::route('albums.create') }}">create an album</a>!
            </div>
        @endif
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
        });
    })(window.jQuery);
</script>

@stop
