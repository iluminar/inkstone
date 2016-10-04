@forelse ($post->comments as $comment)
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ $comment->author->socials[0]->avatar }}" alt="" style="width:100%;border-radius:50%;margin: auto" />
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <a href="{{ route('dashboard') }}" class="comment-author-name">{{ $comment->author->name }}</a>
                    </div>
                    <div class="row comment-date">
                        {{ $comment->created_at }} ago
                    </div>
                </div>
            </div>
        </div>

        <div class="card-action">
            {{ $comment->content }}
        </div>
    </div>

@empty
    <div class="card">
        <div class="card-content">
        </div>

        <div class="card-action">
            @if (Auth::check())
            Be the first to <a id="write" style="text-transform: lowercase; margin-right:1px; cursor: pointer">write</a> a comment
            @else
            <a href="{{ route('login') }}" style="text-transform: lowercase; margin-right:6px"> login</a>to write a comment
            @endif
        </div>
    </div>

@endforelse
