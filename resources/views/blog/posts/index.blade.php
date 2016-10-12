@extends('layouts.app')

@section('title') Dashboard - Posts @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('blog.partials.sidebar')
        </div>

        <div class="col-md-6">
            @include('blog.posts.list')
        </div>
    </div>
</div>

@endsection
