@extends('layouts.app')

@section('title') Home Page @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('posts.list')
        </div>
    </div>
</div>
@endsection
