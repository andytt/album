@extends('master')

@section('styles')

<style>
    .container-fluid {
        padding: 0;
    }

    #container {
        position: relative;
        width: 100%;
        height: 100%;
        display: table;
    }

    #container::before {
        position: absolute;
        content: ' ';
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background-color: black;
        opacity: .1;
        z-index: -1;
    }

    #exception-container {
        width: 100%;
        height: auto;
        display: table-cell;
        vertical-align: middle;
    }
</style>

@stop

@section('body')

<div id="container">
    <div id="exception-container">
        <div class="col-xs-12 text-center">
            <h1 id="title-banner">Gallery</h1>
        </div>
        <div class="col-xs-12 col-md-12">
            <h3 class="text-danger text-center">Sorry... Something Wrong</h3>
        </div>
    </div>
</div>

@stop
