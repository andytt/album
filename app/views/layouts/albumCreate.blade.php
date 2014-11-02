@extends('master')

@section('styles')

<style>
    #container {
        position: relative;
        width: 100%;
        height: 100%;
        display: table;
    }

    #album-create-container {
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
    <div id="album-create-container">
        <div class="col-md-4 col-md-offset-4">
            @include('components.albumCreate')
        </div>
    </div>
</div>

@stop

@section('scripts')

<script>
</script>

@stop
