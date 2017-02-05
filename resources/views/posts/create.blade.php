@extends('layouts.app')

@section('title') Create a Post @endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.css">
<link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css" />
 -->@endsection

@section('content')
<create-form></create-form>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Create a Post</div>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('post.store') }}">
                    <div class="card-content">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">Title</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control" name="title" autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('publish_time') ? ' has-error' : '' }}">
                            <label for="publish_time" class="col-md-2 control-label">Publish Time</label>

                            <div class="col-md-10" id="datetimepicker">
                                <input id="publish_time" type="text" class="form-control" name="publish_time" autofocus>

                                @if ($errors->has('publish_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publish_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                            <label for="tags" class="col-md-2 control-label">Tags</label>

                            <div class="col-md-10">
                                <input id="tags" type="text" class="form-control" name="tags" autofocus>

                                @if ($errors->has('tags'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-2 control-label">Content</label>

                            <div class="col-md-10">
                                <textarea id="content" type="content" class="form-control" name="content"></textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="card-action">

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="draft"> save as draft
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
 -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplemde/1.11.2/simplemde.min.js"></script>
<script type="text/javascript">
    window.url = "{{ route('post.store') }}";
    window.errors = <?php echo json_encode($errors->toArray()); ?>
</script>
<script src="/js/create.js"></script>
@endsection
