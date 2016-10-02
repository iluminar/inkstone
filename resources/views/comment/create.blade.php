<div class="card comment-form">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('comment.store') }}">
        <div class="card-header">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}" style="margin-top:15px;">
                <div class="col-md-10">
                    <input id="content" type="text" class="form-control" name="content">

                    @if ($errors->has('content'))
                        <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>

        </div>
    </form>
</div>
