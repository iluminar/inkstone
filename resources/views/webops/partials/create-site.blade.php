<div class="col-md-4">
    <div class="card">
        <div class="form-card-header text-center">Site</div>

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

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="domain" class="col-md-4 control-label">Domain</label>

                <div class="col-md-8">
                    <input id="domain" type="text" class="form-control" name="domain" autofocus>

                    @if ($errors->has('domain'))
                        <span class="help-block">
                            <strong>{{ $errors->first('domain') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="domain" class="col-md-4 control-label">Repository</label>

                <div class="col-md-8">
                    <input id="domain" type="text" class="form-control" name="domain" autofocus>

                    @if ($errors->has('domain'))
                        <span class="help-block">
                            <strong>{{ $errors->first('domain') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

        </div>

    </div>
</div>
