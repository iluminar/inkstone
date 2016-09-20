@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('content')

<div class="row post-header">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="">{{ $post->title }}</h1>
        <img class="post-author" src="{{ $post->author->socials[0]->avatar }}" alt="" />
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {!! Markdown::convertToHtml($post->content) !!}
        </div>
    </div>
</div>

@endsection
