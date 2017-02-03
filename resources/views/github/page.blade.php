@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header">
                    <a class="post-title" href="{{ route('post.single', ['slug' => $page['slug']]) }}">{{ $page['name'] }}</a><br/>
                    Published on {{ $page['publish_time'] }}
                </div>

                <div class="card-content">
                    {!! Markdown::convertToHtml($page['content']) !!}
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
