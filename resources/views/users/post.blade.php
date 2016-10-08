@extends('layouts.app')

@section('title') {{ Auth::user()->name }} - All Posts @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-lg-3">
            @include('partials.sidebar')
        </div>
        <div class="col-md-6 col-lg-6">
            @include('posts.list')
        </div>
    </div>
</div>
@endsection
