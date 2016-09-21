<ul class="list-group">
    @foreach ($posts['data'] as $post)
        <div class="card">
            <div class="card-image">
                <img class="img-responsive" src="">
                <span class="card-title">Material Cards</span>
            </div>

            <div class="card-content">
                <p>{!! Markdown::convertToHtml($post['content']) !!}</p>
            </div>

            <div class="card-action">
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
                <a href="#" target="new_blank">Link</a>
            </div>
        </div>

        <!-- <li class="list-group-item">
            <a href="{{ route('post.single', ['slug' => $post['slug']]) }}">{{ $post['title'] }}</a>
            {!! Markdown::convertToHtml($post['content']) !!}
        </li> -->
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
