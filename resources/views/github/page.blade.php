@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
	    <form class="form-horizontal" role="form" method="POST" action="{{ route('comment.store', ['slug' => '']) }}">
	        <div class="col-md-6 col-md-offset-3">
	            <div class="card">
	                <div class="card-header">
	                	<h3 class="text-center">Create Your Github Page</h3>
	                </div>

	                <div class="card-content">

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="draft" checked="true"> Show <code>readme.md</code> file as home page
                                    </label>
                                </div>
                            </div>
                        </div>

			            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}" style="margin-top:15px;">
                            <label for="title" class="col-md-4 control-label">Document directory</label>
			                <div class="col-md-8">
			                    <input id="content" type="text" class="form-control" name="content" placeholder="/path/to/doument/directory" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">

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
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
	                </div>
	            </div>
	        </div>
	</div>
</div>


@endsection