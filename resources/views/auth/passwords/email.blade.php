@extends('layouts.app')

<!-- Main Content -->
@section('content')
<email></email>
@endsection

@section('script')
<script type="text/javascript">
    window.errors = <?php echo json_encode($errors->toArray()); ?>;
    window.status = <?php echo json_encode(session('status')); ?>
</script>
<script src="/js/auth/email.js"></script>
@endsection
