@extends('layouts.app')

@section('title') {{ Auth::user()->name }} - Github @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-lg-3">
            @include('partials.sidebar')
        </div>
        <div class="col-md-6 col-lg-9">
            <div class="card">
                <div class="card-action">
                    <h3 class="text-center">Your Github Repository</h3>
                </div>
            </div>
            <div class="card">
                @foreach ($repos as $repo)
                    <div class="card-action">
                        {{ $repo->name }}
                        <a class="pull-right btn btn-info" href="{{ route('create.github.page', ['user' => Auth::user()->username, 'repo' => $repo->name]) }}">Create Page</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
$('.draft').click(function(){
    var element = this;
    var slug = $(this).data('postSlug');
    var url = '{{ route('post.index') }}' + '/' + slug +'/publish';
    $.ajax({
        url: url,
        type: 'PATCH',
        data: {'slug': slug},
        success: function(data){
            if(data.status) {
                $(element).children().toggleClass("fa-toggle-on").toggleClass("fa-toggle-off")
            }
        }
    });
});
</script>

@endsection
