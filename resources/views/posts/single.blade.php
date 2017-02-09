@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.css">
@endsection

@section('content')
<post></post>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.js"></script>
<script type="text/javascript">
    window.data = @php echo json_encode([
            'post' => $post
        ]);
        @endphp;
    window.converter = new showdown.Converter();
</script>
 <script src="/js/post.js"></script>
@endsection
