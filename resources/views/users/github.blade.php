@extends('layouts.app')

@section('title') {{ Auth::user()->name }} - Github @endsection

@section('content')
<repo-list></repo-list>
@endsection

@section('script')
<script type="text/javascript">
    window.data = @php echo json_encode([
            'repos' => $repos,
            'username' => Auth::user()->username
        ]);
        @endphp;
</script>
<script src="/js/users/github.js"></script>
@endsection
