@forelse ($post->comments as $comment)
    <div class="card">
        <div class="card-content">

        </div>

        <div class="card-action">

        </div>
    </div>

@empty
    <div class="card">
        <div class="card-content">
        </div>

        <div class="card-action">
            @if (Auth::check())
            Be the first to write a comment
            @else
            <a href="{{ route('login') }}" style="text-transform: lowercase; margin-right:6px"> login</a>to write a comment
            @endif
        </div>
    </div>

@endforelse
