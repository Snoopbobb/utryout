@extends('app')

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Post Tryout</div>
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
					{!! Form::open(['class' => 'form-horizontal', 'action' => 'TryoutsController@store']) !!}
						{!! Form::hidden('user_id', Auth::user()->id) !!} 
						{{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}

						<div class="form-group">
							{!! Form::label('organization', 'Organization', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('organization', null, ['class'=> 'form-control', 'placeholder' => 'Enter Organization/Team Name']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('website', 'Organization Website', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('website', null, ['class'=> 'form-control', 'placeholder' => 'www.example or example.com']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('contact_name', 'Name of Contact', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('contact_name', null, ['class'=> 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('contact_email', 'Email of Contact', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::email('contact_email', null, ['class'=> 'form-control']) !!}
							</div>
						</div>
							{{--****************************** Make sport a dropdown ****************************************************** --}}
						<div class="form-group">
							{!! Form::label('sport', 'Sport', ['class'=> 'col-md-4 control-label']) !!}

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
							{!! Form::label('age', 'Please select an age group', ['class'=> 'col-md-4 control-label']) !!}

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
							{!! Form::label('date', 'Tryout Date', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::input('date', 'date', null, ['class'=> 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('time', 'Tryout Time', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::input('time', 'time', null, ['class'=> 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('location_name', 'Location Name', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('location_name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Park or Field Name']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('address', 'Address', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('address', null, ['class'=> 'form-control', 'placeholder' => 'Enter Street Address']) !!}
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
							{!! Form::label('description', 'Description', ['class'=> 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::textarea('description', null, ['class'=> 'form-control', 'placeholder' => 'List any other details']) !!}
							</div>
						</div>	

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::submit('Submit Post', ['class'=> 'btn']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

	<script src="{{ asset('/adm/js/billing.js') }}"></script>

@endsection
