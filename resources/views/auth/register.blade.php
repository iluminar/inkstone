@extends('layouts.app')

@section('title') Register @endsection

@section('content')
<register></register>
@endsection

@section('script')
<script type="text/javascript">
    window.url = "{{ url('/register') }}"
    window.errors = <?php echo json_encode($errors->toArray()); ?>
</script>
<script src="/js/auth/register.js"></script>
@endsection
