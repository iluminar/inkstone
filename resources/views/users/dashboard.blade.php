@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-3 col-lg-3">
            @include('partials.sidebar')
        </div>

        <div class="col-md-3 col-lg-3">
            @include('users.partials.post')
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    
</script>

@endsection
