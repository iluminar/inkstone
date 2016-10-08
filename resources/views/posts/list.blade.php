<ul class="list-group">
    @foreach ($posts['data'] as $post)
        <div class="card">
            <div class="card-header">
                <a class="post-title" href="{{ route('post.single', ['slug' => $post['slug']]) }}">{{ $post['title'] }}</a><br/>
                <img class="avatar" src="{{ $post['author']['socials'][0]['avatar'] }}" alt="" />
                <span>{{ $post['author']['name'] }}</span>
                <span class="pull-right">Published on {{ $post['publish_time'] }}</span>
            </div>

            <div class="card-author">

            </div>

            <div class="card-content">
                {!! Markdown::convertToHtml(str_limit($post['content'], 350, '...')) !!}
            </div>

            <div class="flex-card-action">
                @if (isset($owner))
                    <a href="javascript:;" class="draft" data-post-slug="{{ $post['slug'] }}">
                        <i class="fa fa-2x @if ($post['draft']) fa-toggle-on @else fa-toggle-off @endif"></i>
                    </a>
                    <a href="{{ route('post.edit', ['slug' => $post['slug']]) }}" ><i class="fa fa-2x fa-edit"></i></a>
                    <a href="{{ route('post.delete', ['slug' => $post['slug']]) }}" ><i class="fa fa-2x fa-close"></i></a>
                @else
                    <a href="javascript:;" >Link</a>
                    <a href="javascript:;" >Link</a>
                    <a href="javascript:;" >Link</a>
                @endif
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

        @for ($i = 1; $i <= $posts['last_page']; $i++)
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
