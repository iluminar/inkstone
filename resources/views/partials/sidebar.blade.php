<div class="card">
    <div class="card-image">
        <span class="card-title">Material Cards</span>
    </div>

    <div class="card-action">
        <a href="#">Post</a>
    </div>
    <div class="sub-menu hidden">
            <div class="row card-action">
                <div class="col-md-10 col-md-offset-1">
                    <a href="{{ route('post.create') }}"><i class="fa fa-plus"></i>Create a Post</a>
                </div>
            </div>
            <div class="row card-action">
                <div class="col-md-10 col-md-offset-1">
                    <a href="{{ route('user.posts', ['user' => Auth::user()->username]) }}"><i class="fa fa-list"></i>All Post</a>
                </div>
            </div>
    </div>
    <div class="card-action">
        <a href="{{ route('post.index') }}">Page</a>
    </div>
    <div class="card-action">
        <a href="{{ route('post.index') }}">Comment</a>
    </div>
    <div class="card-action">
        <a href="{{ route('post.index') }}">Question</a>
    </div>
    <div class="card-action">
        <a href="{{ route('post.index') }}">Bookmark</a>
    </div>
    <div class="card-action">
        <a href="{{ route('post.index') }}">Settings</a>
    </div>
</div>

@section('script')

<script type="text/javascript">
$(".card-action a").click(function() {
    $(this).parent().next().toggleClass('hidden');
});
</script>

@endsection
