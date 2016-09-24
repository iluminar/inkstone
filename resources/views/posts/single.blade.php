@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('partials.author')
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a class="post-title" href="{{ route('post.single', ['slug' => $post['slug']]) }}">{{ $post['title'] }}</a><br/>
                </div>

                <div class="card-author">

                </div>

                <div class="card-content">
                    {!! Markdown::convertToHtml($post['content']) !!}
                </div>

                <div class="card-action">
                    <a href="#" target="new_blank">Link</a>
                    <a href="#" target="new_blank">Link</a>
                    <a href="#" target="new_blank">Link</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
