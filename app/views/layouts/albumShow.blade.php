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

@if ($photos->isEmpty())
    <div id="container">
        <div id="album-show-container" class="text-center">
            @include('components.albumShow')
        </div>
    </div>
@else
    <div class="row">
        <div class="col-xs-12">
            @if (!$photos->isEmpty())
                @include('components.photoList')
            @endif
        </div>
    </div>
@endif

@stop

@section('scripts')

<script>
    (function ($, document) {
        $(function () {
            $('.btn-add-photo').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

            $('.thumbnail').children('a').colorbox({
                rel: '{{ $album->getKey() }}',
                photo: true,
                closeButton: false,
                maxWidth: '99%',
                maxHeight: '99%'
            });

            $('.photo-navicon').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '99%'
            });

            $('.navbar-create-album').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

            $(document)
            .on('click', '.photo-url', function (e) {
                e.preventDefault();
                $(this).select();
            })
            .on('click', '.delete-photo', function (e) {
                e.preventDefault();
                var url = this.href,
                    options = {
                        _method: 'DELETE'
                    };

                if (confirm('Are U SURE?')) {
                    $.post(url, options).done(function () {
                        location.reload()
                    });
                }
            });
        });
    })(window.jQuery, document);
</script>

@stop
