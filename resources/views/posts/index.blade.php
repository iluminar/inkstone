@extends('layouts.app')

@section('title') Dashboard - Posts @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('partials.sidebar')
        </div>

        <div class="col-md-9">
            @include('partials.post_list')
        </div>
    </div>
</div>


@endsection