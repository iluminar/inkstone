@extends('layouts.app')

@section('title') {{ Auth::user()->name }} - All Posts @endsection

@section('content')
<list></list>
@endsection

@section('script')
<script type="text/javascript">
    window.data = @php echo json_encode([
            'posts' => $posts,
        ]);
        @endphp;
    window.converter = new showdown.Converter();
</script>
<script src="/js/userPosts.js"></script>

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
