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

@if ($albums->isEmpty())
<div id="container">
    <div id="album-show-container" class="text-center">
        <h4> Hey, let's <a class="navbar-create-album" href="{{ URL::route('albums.create') }}">create an album</a>!</h4>
    </div>
</div>
@else
    <div class="row">
        <div class="col-xs-12">
            @include('components.albumList')
        </div>
    </div>
@endif

@stop

@section('scripts')

<script>
    (function ($, document) {
        $(function () {
            $('.navbar-create-album').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

            $('.album-navicon').colorbox({
                closeButton: false,
                width: 500,
                maxWidth: '95%'
            });

            $(document).on('click', '.toggle-privacy', function (e) {
                e.preventDefault();
                var $this = $(this);

                $.getJSON(this.href, {}, function () {
                    if ($this.find('i').hasClass('fa-check')) {
                        $this.html('<i class="fa fa-ban text-danger"></i>&nbsp;Private');
                    } else {
                        $this.html('<i class="fa fa-check text-success"></i>&nbsp;Public');
                    }
                });
            });
        });
    })(window.jQuery, document);
</script>

@stop
