@extends('layouts.blog')

@section('title') Dashboard @endsection

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-3 col-lg-3">
            @include('blog.partials.sidebar')
        </div>

        <div class="col-md-3 col-lg-3">
            @include('blog.users.partials.post')
        </div>
    </div>
</div>

@endsection
