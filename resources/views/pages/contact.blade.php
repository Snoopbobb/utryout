@extends('app')

@section('content')
	<div class="container-fluid">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Have a question or a comment? Drop us a line.</div>
				<div class="panel-body">
		
					{!! Form::open(['class' => 'form-horizontal']) !!}

						<div class="form-group">
							{!! Form::label('name', 'Name', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Organization/Team Name']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('email', 'Email', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::email('email', null, ['class'=> 'form-control', 'placeholder' => 'www.example or example.com']) !!}
							</div>
						</div>
						
						<div class="form-group">
							{!! Form::label('comment', 'Comments', ['class'=> 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::textarea('comment', null, ['class'=> 'form-control', 'placeholder' => 'List any other details']) !!}
							</div>
						</div>	

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Send', ['class'=> 'btn']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>	
@endsection