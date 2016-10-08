<div class="card">
    <div class="card-header">
        <h4 class="text-center">Total Post</h4>
    </div>
    <div class="card-content">
        <h1 class="text-center">{{ $info->post->count() }}</h1><br/>
        <h4>Latest : <a href="{{ route('post.single', ['slug' => $info->post->last()->slug]) }}">{{ $info->post->last()->title }}</a></h4>
    </div>
    <div class="dashboard-card-action">
        <a href="{{ route('post.create') }}" ><i class="fa fa-2x fa-sticky-note"></i></a>
        <a href="{{ route('user.posts', ['user' => Auth::user()->username]) }}" ><i class="fa fa-2x fa-list"></i></a>
    </div>
</div>
