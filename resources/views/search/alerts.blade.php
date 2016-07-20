@extends('app')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default register-panel">
					<div class="panel-heading"><h4>Sign up and be alerted about upcoming tryouts posted in your area.</h4></div>
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
						
						
						@if (isset($message))
								<div class="alert alert-success">
									<strong>Success!</strong> You successfully created an alert!<br><br>

									<ul>										
										<li>{{ $message }}</li>										
									</ul>
								</div>
						@endif

						@if (Session::get('notFound'))
								<div class="alert alert-danger">
									<strong>Oh no!</strong> We couldn't find any tryouts that match that criteria.<br><br>

									<ul>										
										<li>{{ Session::get('notFound') }}</li>										
									</ul>
									<a href="{{ url('/search') }}" class="btn btn-content">Search Again</a>
								</div>
						@endif
						{!! Form::open(['class' => 'form-horizontal', 'url' => 'alerts', 'method' => 'post','id'=> 'post-tryout']) !!}

							<div class="form-group">
								<label class="col-md-4 control-label">E-Mail Address</label>
								<div class="col-md-6">
									<input type="email" class="form-control" name="email">
								</div>
							</div>

							<div class="form-group">
								{!! Form::label('sport', 'Sport', ['class'=> 'col-md-4 control-label']) !!}

								<div class="col-md-6">
									{!! Form::select('sport', [
																'any' => 'Any',
																'baseball' => 'Baseball',
																'basketball' => 'Basketball',
																'cheer' => 'Cheer',
																'football' => 'Football',
																'hockey' => 'Hockey',
																'lacrosse' => 'Lacrosse',
																'soccer' => 'Soccer',
																'softball' => 'Softball'
																], null, ['class'=> 'form-control', 'id' => 'form-sport'] ) !!}
								</div>
							</div>

							<div class="form-group age">
							{!! Form::label('age', 'Please select an age group or leave all unchecked for alerts of any age', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-7 btn-group">
								{!! Form::label('18', '18u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '18', null, ['class' => 'hidden', 'id' => '18']) !!}

								{!! Form::label('17', '17u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '17', null, ['class' => 'hidden', 'id' => '17']) !!}

								{!! Form::label('16', '16u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '16', null, ['class' => 'hidden', 'id' => '16']) !!}

								{!! Form::label('15', '15u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '15', null, ['class' => 'hidden', 'id' => '15']) !!}

								{!! Form::label('14', '14u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '14', null, ['class' => 'hidden', 'id' => '14']) !!}

								{!! Form::label('13', '13u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '13', null, ['class' => 'hidden', 'id' => '13']) !!}

								{!! Form::label('12', '12u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '12', null, ['class' => 'hidden', 'id' => '12']) !!}						

								{!! Form::label('11', '11u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '11', null, ['class' => 'hidden', 'id' => '11']) !!}

								{!! Form::label('10', '10u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '10', null, ['class' => 'hidden', 'id' => '10']) !!}

								{!! Form::label('9', '9u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '9', null, ['class' => 'hidden', 'id' => '9']) !!}

								{!! Form::label('8', '8u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '8', null, ['class' => 'hidden', 'id' => '8']) !!}

								{!! Form::label('7', '7u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '7', null, ['class' => 'hidden', 'id' => '7']) !!}

								{!! Form::label('6', '6u', ['class'=> 'btn btn-primary unchecked radio']) !!}
								{!! Form::radio('age', '6', null, ['class' => 'hidden', 'id' => '6']) !!}
							</div>
						</div>

							<div class="form-group">
								{!! Form::label('city', 'City', ['class'=> 'col-md-4 control-label']) !!}

								<div class="col-md-6">
									{!! Form::text('city', null, ['class'=> 'form-control']) !!}
								</div>
							</div>

							<div class="form-group">
								{!! Form::label('state', 'State', ['class'=> 'col-md-4 control-label']) !!}

								<div class="col-md-6">
										{!! Form::select('state', [
																'AL' => 'Alabama',
																'AK' => 'Alaska',
																'AZ' => 'Arizona',
																'AR' => 'Arkansas',
																'CA' => 'California',
																'CO' => 'Colorado',
																'CT' => 'Connecticut',
																'DE' => 'Delaware',
																'DC' => 'District of Columbia',
																'FL' => 'Florida',
																'GA' => 'Georgia',
																'HI' => 'Hawaii',
																'ID' => 'Idaho',
																'IL' => 'Illinois',
																'IN' => 'Indiana',
																'IA' => 'Iowa',
																'KS' => 'Kansas',
																'KY' => 'Kentucky',
																'LA' => 'Louisiana',
																'ME' => 'Maine',
																'MD' => 'Maryland',
																'MA' => 'Massachusetts',
																'MI' => 'Michigan',
																'MN' => 'Minnesota',
																'MS' => 'Mississippi',
																'MO' => 'Missouri',
																'MT' => 'Montana',
																'NE' => 'Nebraska',
																'NV' => 'Nevada',
																'NH' => 'New Hampshire',
																'NJ' => 'New Jersey',
																'NM' => 'New Mexico',
																'NY' => 'New York',
																'NC' => 'North Carolina',
																'ND' => 'North Dakota',
																'OH' => 'Ohio',
																'OK' => 'Oklahoma',
																'OR' => 'Oregon',
																'PA' => 'Pennsylvania',
																'RI' => 'Rhode Island',
																'SC' => 'South Carolina',
																'SD' => 'South Dakota',
																'TN' => 'Tennessee',
																'TX' => 'Texas',
																'UT' => 'Utah',
																'VT' => 'Vermont',
																'VA' => 'Virginia',
																'WA' => 'Washington',
																'WV' => 'West Virginia',
																'WI' => 'Wisconsin',
																'WY' => 'Wyoming'
																], null, ['class'=> 'form-control', 'id' => 'form-state'] ) !!}
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">Sign up for alerts</button>
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
