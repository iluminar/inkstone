@extends('layouts.app')

@section('title') {{ Auth::user()->name }} - Github @endsection

@section('content')
<repo-list></repo-list>
{{-- <div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-9">
            <div class="card">
                <div class="card-action">
                    <h3 class="">Your Github Repository</h3>
                    <a href="{{ route('user.github.refresh', ['user' => Auth::user()->username]) }}" class="btn btn-info">refresh data</a>
                </div>
            </div>
            <div class="card">
                @foreach ($repos as $repo)
                    <div class="card-action">
                        {{ $repo->name }}
                        <a class="pull-right btn btn-info" href="{{ route('show.github.page', ['user' => Auth::user()->username, 'repo' => $repo->name]) }}">@if ($repo->has_page)Show Page @else Create Page @endif</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}
@endsection

@section('script')
<script type="text/javascript">
    window.data = @php echo json_encode([
            'repos' => $repos,
            'username' => Auth::user()->username
        ]);
        @endphp;
</script>
<script src="/js/userGithub.js"></script>
@endsection
