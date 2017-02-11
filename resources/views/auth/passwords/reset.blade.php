@extends('layouts.app')

@section('content')
<reset></reset>
@endsection

@section('script')
<script type="text/javascript">
    window.errors = <?php echo json_encode($errors->toArray()); ?>;
    window.token = "{{ $token }}"
</script>
<script src="/js/auth/reset.js"></script>
@endsection
