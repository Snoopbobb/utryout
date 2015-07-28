@extends('app')

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Browse Tryouts</h4></div>
				<div class="panel-body">

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					{!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'action' => 'SearchController@browse']) !!}

						<div class="form-group">
							{!! Form::label('sport', 'By sport', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::select('sport', [
															'baseball' => 'Baseball',
															'basketball' => 'Basketball',
															'football' => 'Football',
															'hockey' => 'Hockey',
															'lacrosse' => 'Lacrosse',
															'soccer' => 'Soccer',
															'softball' => 'Softball'
															], null, ['class'=> 'form-control', 'id' => 'form-sport'] ) !!}
							</div>
						</div>

						<div class="form-group age">
							{!! Form::label('age', 'By age group', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-7 btn-group">
								{!! Form::label('18', '18u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '18', null, ['class' => 'hidden', 'id' => '18']) !!}

								{!! Form::label('17', '17u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '17', null, ['class' => 'hidden', 'id' => '17']) !!}

								{!! Form::label('16', '16u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '16', null, ['class' => 'hidden', 'id' => '16']) !!}

								{!! Form::label('15', '15u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '15', null, ['class' => 'hidden', 'id' => '15']) !!}

								{!! Form::label('14', '14u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '14', null, ['class' => 'hidden', 'id' => '14']) !!}

								{!! Form::label('13', '13u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '13', null, ['class' => 'hidden', 'id' => '13']) !!}

								{!! Form::label('12', '12u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '12', null, ['class' => 'hidden', 'id' => '12']) !!}						

								{!! Form::label('11', '11u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '11', null, ['class' => 'hidden', 'id' => '11']) !!}

								{!! Form::label('10', '10u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '10', null, ['class' => 'hidden', 'id' => '10']) !!}

								{!! Form::label('9', '9u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '9', null, ['class' => 'hidden', 'id' => '9']) !!}

								{!! Form::label('8', '8u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '8', null, ['class' => 'hidden', 'id' => '8']) !!}

								{!! Form::label('7', '7u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '7', null, ['class' => 'hidden', 'id' => '7']) !!}

								{!! Form::label('6', '6u', ['class'=> 'btn btn-primary unchecked']) !!}
								{!! Form::radio('age', '6', null, ['class' => 'hidden', 'id' => '6']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('radius', 'By Location Within', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::select('radius', [
															'5000' => 'Any',
															'5' => '5 Miles',
															'10' => '10 Miles',
															'15' => '15 Miles',
															'20' => '20 Miles',
															'25' => '25 Miles',
															'50' => '50 Miles',
															'100' => '100 Miles'
															], null, ['class'=> 'form-control', 'id' => 'form-radius'] ) !!}
							</div>

							{!! Form::label('zip', 'of your Zip', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('zip', null, ['class'=> 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="">
								{!! Form::submit('Find Tryout', ['class'=> 'btn']) !!}
							</div>
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection