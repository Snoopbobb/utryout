@extends('app')

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Search</div>
				<div class="panel-body">
					{!! Form::open() !!}
						<div class="form-group"> 
							{!! Form::label('search', 'Search:', ['class'=> 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::text('search', null, ['class'=> 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Search', ['class'=> 'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection