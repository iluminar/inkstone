@extends('layouts.app')

@section('title') Home Page @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="text-center"><h4>All posts</h4></div>
                @include('partials.post_list')
            </div>
        </div>
    </div>
</div>
@endsection
