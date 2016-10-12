@extends('layouts.blog')

@section('title') {{ Auth::user()->name }} - All Posts @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3 col-lg-3">
            @include('blog.partials.sidebar')
        </div>
        <div class="col-md-6 col-lg-6">
            @include('blog.posts.list')
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
