@extends('layouts.app')

@section('title') {{ Auth::user()->name }} - All Posts @endsection

@section('content')
<list></list>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.6.3/showdown.js"></script>
<script type="text/javascript">
    window.data = @php echo json_encode([
            'posts' => $posts,
        ]);
        @endphp;
    window.converter = new showdown.Converter();
</script>
<script src="/js/users/posts.js"></script>
@endsection
