@extends('layouts.app')

@section('content')
<page></page>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/showdown/1.6.3/showdown.js"></script>
<script type="text/javascript">
    window.data = @php echo json_encode([
            'page' => $page,
            'username' => Auth::user()->username
        ]);
        @endphp;
    window.converter = new showdown.Converter();
</script>
<script src="/js/users/page.js"></script>
@endsection
