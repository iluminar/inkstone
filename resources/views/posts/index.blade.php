@extends('layouts.app')

@section('title') Dashboard - Posts @endsection

@section('script')

<script type="text/javascript">
    window.data = @php echo json_encode([
            'post' => $post,
        ]);
        @endphp
</script>

@endsection
