<div class="card">
    <div class="card-header">
        <h4 class="text-center">Total Post</h4>
    </div>
    <div class="card-content">
        <h4 class="text-center">{{ $info->post->count() }}</h4>
    </div>
    <div class="dashboard-card-action">
        <a href="{{ route('post.create') }}" ><i class="fa fa-2x fa-sticky-note"></i></a>
        <a href="{{ route('post.index') }}" ><i class="fa fa-2x fa-list"></i></a>
    </div>
</div>
