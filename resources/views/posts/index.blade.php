@extends('layouts.app')

@section('title') Dashboard - Posts @endsection

@section('content')
    
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        @include('partials.sidebar')
    </div>

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
        @include('partials.post_list')
    </div>

@endsection