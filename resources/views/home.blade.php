@extends('layouts.app')

@section('title') Home Page @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('partials.post_list')
        </div>
    </div>
</div>
@endsection
