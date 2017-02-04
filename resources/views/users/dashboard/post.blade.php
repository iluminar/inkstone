    <div class="column is-3">
        <div class="card">
          <header class="card-header">
            <p class="card-header-title">
              Posts
            </p>
            <a class="card-header-icon">
              <span class="icon">
                <i class="fa fa-angle-down"></i>
              </span>
            </a>
          </header>
          <div class="card-content">
            <div class="content">
                <h4>Total : {{ $info->post->count() }}</h4>
                @if ($info->post->count() > 0)
                    <h4>Latest : <a href="{{ route('post.single', ['slug' => $info->post->last()->slug]) }}">{{ $info->post->last()->title }}</a></h4>
                @else

                @endif
            </div>
          </div>
          <footer class="card-footer">
            <a class="card-footer-item" href="{{ route('post.create') }}">Create</a>
            <a class="card-footer-item" href="{{ route('user.posts', ['user' => Auth::user()->username]) }}">List</a>
            {{-- <a class="card-footer-item">Delete</a> --}}
          </footer>
        </div>
    </div>
