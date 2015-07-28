@extends('app')

@section('content')
	<div class="container-fluid">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Have a question or a comment? Drop us a line.</h4></div>
				<div class="panel-body">
		
					{!! Form::open(['class' => 'form-horizontal']) !!}

						<div class="form-group">
							{!! Form::label('name', 'Name', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Your Name or Your Organization/Team Name']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('email', 'Email', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::email('email', null, ['class'=> 'form-control', 'placeholder' => 'Enter Your Email Address']) !!}
							</div>
						</div>
						
						<div class="form-group">
							{!! Form::label('comment', 'Comments', ['class'=> 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::textarea('comment', null, ['class'=> 'form-control', 'placeholder' => 'Ask your questions or let us know your comments and we\'ll get back to you soon. Thank you!']) !!}
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