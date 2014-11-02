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

@include('components.menubar', compact('album'))

<div id="container">
    <div id="album-show-container">
        <div class="col-md-4 col-md-offset-4">
            @include('components.albumShow')
        </div>
        <div class="col-md-12">
            @if (!$photos->isEmpty())
                @include('components.photoList')
            @endif
        </div>
    </div>
</div>

@stop

@section('scripts')

<script>
    (function ($) {
        $(function () {
            $('.btn-add-photo').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

            $('a.thumbnail').colorbox({
                rel: '{{ $album->getKey() }}',
                photo: true,
                closeButton: false,
                maxWidth: '95%',
                maxHeight: '95%'
            });

            $('#navbar-create-album').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });
        });
    })(window.jQuery);
</script>

@stop
