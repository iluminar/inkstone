@extends('layouts.blog')

@section('title') Create a Project @endsection

@section('content')

<div class="container">
    <div class="row">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('post.store') }}">

            @include ('webops.partials.create-project-basic')
            @include ('webops.partials.create-server')
            @include ('webops.partials.create-site')
            @include ('webops.partials.create-database')

        </form>
    </div>
</div>

@endsection

@section('script')

@endsection
