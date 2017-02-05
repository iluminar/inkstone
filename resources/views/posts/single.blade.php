@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('content')
<post></post>
{{-- 
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('partials.author')
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a class="post-title" href="{{ route('post.single', ['slug' => $post['slug']]) }}">{{ $post['title'] }}</a><br/>
                    Published on {{ $post['publish_time'] }}
                </div>

                <div class="card-content">
                    {!! Markdown::convertToHtml($post['content']) !!}
                </div>

                <div class="card-action">
                    <a href="#" target="new_blank">Link</a>
                    <a href="#" target="new_blank">Link</a>
                    <a href="#" target="new_blank">Link</a>
                </div>
            </div>

            @if (Auth::check())
                @include('comment.create')
            @endif
        </div>

        <div class="col-md-3">
            @include('comment.list')
        </div>
    </div>
</div>
 --}}
@endsection

@section('script')
<script type="text/javascript">
    window.data = @php echo json_encode([
            'post' => $post,
        ]);
        @endphp;
    window.converter = new showdown.Converter();
</script>

{{-- <script type="text/javascript">
$("#write").click(function () {
    $("#comment-form input").focus().animate({
        scrollTop: $("#comment-form").offset().top
    }, 1000);
});
</script>
 --}}<script src="/js/post.js"></script>
@endsection
