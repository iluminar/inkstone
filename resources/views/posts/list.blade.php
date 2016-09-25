<ul class="list-group">
    @foreach ($posts['data'] as $post)
        <div class="card">
            <div class="card-header">
                <a class="post-title" href="{{ route('post.single', ['slug' => $post['slug']]) }}">{{ $post['title'] }}</a><br/>
                <img class="avatar" src="{{ $post['author']['socials'][0]['avatar'] }}" alt="" />
                <span>{{ $post['author']['name'] }}</span>
            </div>

            <div class="card-author">

            </div>

            <div class="card-content">
                {!! Markdown::convertToHtml(str_limit($post['content'], 350, '...')) !!}
            </div>

            <div class="card-action">
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
            </div>
        </div>
    @endforeach
</ul>

<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination pagination-lg">
        @if (!is_null($posts['prev_page_url']))
        <li>
            <a href="{{ url($posts['prev_page_url']) }}" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        @endif

        @for ($i = 1; $i <= $posts['total']; $i++)
        <li @if ( $i == $posts['current_page']) {{ "class=current" }} @endif><a href="#">{{ $i }}</a></li>
        @endfor

        @if (!is_null($posts['next_page_url']))
        <li>
            <a href="{{ url($posts['next_page_url']) }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
