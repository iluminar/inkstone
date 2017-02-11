@extends('layouts.app')

@section('title') Login @endsection

@section('content')
<login></login>
@endsection

@section('script')
<script type="text/javascript">
    window.errors = <?php echo json_encode($errors->toArray()); ?>
</script>
<script src="/js/auth/login.js"></script>
@endsection
