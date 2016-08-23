@extends('layouts.app')

@section('title') Home Page @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All posts</div>

                <div class="panel-body">
                </div>
                    <ul class="list-group">
                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                {!! Markdown::convertToHtml($post->content) !!}
                            </li>
                        @endforeach
                    </ul>
            </div>
        </div>
    </div>
</div>
@endsection
