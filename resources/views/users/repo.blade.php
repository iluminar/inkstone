@extends('layouts.app')

@section('title') {{ Auth::user()->name }} - {{ $repo->name }} @endsection

@section('content')
<repo></repo>
@endsection

@section('script')
<script type="text/javascript">
    window.data = @php echo json_encode([
            'repo' => $repo,
            'errors' => $errors,
            'username' => Auth::user()->username
        ]);
        @endphp;
</script>
<script src="/js/users/repo.js"></script>
@endsection
