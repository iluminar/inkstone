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
@endsection
