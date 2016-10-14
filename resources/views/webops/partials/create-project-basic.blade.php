<div class="col-md-4">
    <div class="card">
        <div class="form-card-header text-center">Basic</div>
        <div class="form-card-content">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-8">
                    <input id="name" type="text" class="form-control" name="name" autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

        </div>

        <div class="card-action">

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
