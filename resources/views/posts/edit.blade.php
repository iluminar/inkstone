@extends('layouts.app')

@section('title') Edit Post @endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.css">
<link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
<edit-form></edit-form>
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.js"></script>
<script type="text/javascript">
    window.url = "{{ route('post.update', ['slug' => $post->slug]) }}";
    window.post = <?php echo json_encode($post->toArray()); ?>;
    window.errors = <?php echo json_encode($errors->toArray()); ?>
</script>
<script src="/js/posts/edit.js"></script>
@endsection
