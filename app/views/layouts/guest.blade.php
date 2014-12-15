@extends('master')

@section('styles')

{{-- */ $backgroundImages = ['sunset', 'sunsetSky', 'sky']; /* --}}
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.4/css/nanoscroller.css">

<style>
    .container-fluid {
        padding: 0;
    }

    #container {
        position: relative;
        width: 100%;
        height: 100%;
        display: table;
        background: url('/{{ $backgroundImages[array_rand($backgroundImages)] }}.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    #container::before {
        position: absolute;
        content: ' ';
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: #000;
        opacity: .4;
    }

    #form-signup-container {
        width: 100%;
        height: auto;
        display: table-cell;
        vertical-align: middle;
    }

    .nano > .nano-content {
        padding-right: 20px;
    }
</style>

@stop

@section('body')

<div id="container">
    <div id="form-signup-container">
        <div class="col-xs-12 col-md-7">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 id="title-banner">Gallery</h1>
                </div>
                <div class="col-xs-12 text-center">
                    <h3 id="subtitle-banner">Discover The Prettiest ;)</h3>
                </div>
                <div class="col-xs-12"><br /></div>
                <div class="col-xs-12"><br /></div>
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    @if (strpos(Route::currentRouteAction(), 'create') !== false)
                        @include('components.signup')
                    @else
                        @include('components.signin')
                    @endif
                </div>
            </div>
        </div>
        <div class="hidden-xs hidden-sm col-md-4">
            <div class="row">
                <div class="col-xs-12 nano">
                    <div class="guest-photo-container nano-content"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.4/javascripts/jquery.nanoscroller.min.js"></script>

<script>
    var pusher = new Pusher('{{ $_ENV['PUSHER_APP_KEY'] }}');
    var channel = pusher.subscribe('photos');
    var $photoContainer = $('.guest-photo-container');

    channel.bind('create', function (data) {
        $.get(data.url, function (rep) {
            $photoContainer.prepend(rep);

            $('.thumbnail').find('a').colorbox({
                rel: 'realtime',
                closeButton: false,
                photo: true,
                maxWidth: '99%',
                maxHeight: '99%'
            });
        });
    });

    $(function () {
        $('.nano').css('height', $(document).height() * 0.7).nanoScroller({
            iOSNativeScrolling: true,
            preventPageScrolling: true
        });
    });
</script>
@stop
