@extends('app')

@section('content')
<div class="container-fluid">
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Post A Tryout</h4></div>
				<h5>Post your tryout information for free!</h5>

				{{-- Message to git --}}
				
				{{-- Credit Card payments turned off --}}
				{{-- <h5>Get your tryout information seen by people in your area for only $5!</h5>
				<a href="/stripe.com/" target="_blank"><img width="150px" height="80px" src="utryout/img/stripe.jpg"></a> --}}

				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							{{-- Credit Card payments turned off --}}
							{{-- <strong>Don't worry, your credit card has not been charged!</strong><br><br> --}}
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					{!! Form::open(['class' => 'form-horizontal', 'action' => 'TryoutsController@store', 'id'=> 'post-tryout']) !!}

						<div class="form-group">
							{!! Form::label('organization', 'Organization (Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('organization', null, ['class'=> 'form-control', 'placeholder' => 'Enter Organization/Team Name']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('website', 'Organization Website (Exclude http:// From Web Address)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('website', null, ['class'=> 'form-control', 'placeholder' => 'www.example or example.com']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('contact_name', 'Name of Contact (Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('contact_name', null, ['class'=> 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('contact_email', 'Email of Contact (Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::email('contact_email', null, ['class'=> 'form-control']) !!}
							</div>
						</div>
							
						<div class="form-group">
							{!! Form::label('sport', 'Sport', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::select('sport', [
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
							{!! Form::label('age', 'Please select an age group', ['class'=> 'col-md-4 control-label']) !!}

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
							{!! Form::label('date', 'Tryout Date/Event Date/Players Needed By This Date (Must Be filled Out In The 07/04/1776 Format Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::input('date', 'date', null, ['class'=> 'form-control', 'placeholder' => '07/04/1776']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('time', 'Tryout Time (Eg. 08:00 AM)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::input('time', 'time', null, ['class'=> 'form-control']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('location_name', 'Location Name (Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('location_name', null, ['class'=> 'form-control', 'placeholder' => 'Enter Park or Field Name']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('address', 'Address (Required)', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('address', null, ['class'=> 'form-control', 'placeholder' => 'Enter Street Address']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('city', 'City (Required)', ['class'=> 'col-md-4 control-label']) !!}

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
						
						{{-- Credit Card information turned off --}}
						{{-- <div class="form-group">
							{!! Form::label('coupon', 'Coupon Code', ['class'=> 'col-md-4 control-label']) !!}

							<div class="col-md-6">
								{!! Form::text('coupon', null, ['class'=> 'form-control coupon', 'placeholder' => 'Enter Valid Coupon Code']) !!}
							</div>
						</div> --}}	

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::button('Post Tryout', ['class'=> 'btn post', 'data-toggle'=> 'modal', 'data-target'=> '.bs-example-modal-sm', 'type' => 'submit']) !!}
							</div>
						</div>
					{!! Form::close() !!}
							
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Small modal -->
{{-- Credit Card payments turned off --}}
{{-- <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
   
    	<div class="modal-body">
    		  <h4>Your tryout will be seen by parents and players looking in your area!</h4>
		      {!! Form::open(['id'=> 'billing-form']) !!}
		      	<div class="form-group">
					
					<div class="">
						{!! Form::email('', null, ['class'=> 'form-control', 'data-stripe'=> 'receipt-email', 'id'=> 'stripe-email', 'name'=> 'stripe-email','placeholder' => 'Billing Email Address']) !!}
					</div>
				</div>
		      	<div class="form-group">
					
					<div class="">
						{!! Form::text('', null, ['class'=> 'form-control', 'data-stripe'=> 'number', 'placeholder' => 'Credit Card Number']) !!}
					</div>
				</div>
				<div class="form-group">
					
					<div class="">
						{!! Form::text('', null, ['class'=> 'form-control', 'data-stripe'=> 'cvc', 'placeholder' => 'CVC Number']) !!}
					</div>
				</div>
				<div class="form-group">
					
					<div class="col-md-6">
						{!! Form::selectMonth(null, null, ['class'=> 'form-control', 'data-stripe'=> 'exp-month']) !!}
					</div>
					<div class="col-md-6">
						{!! Form::selectYear(null, date('Y'), date('Y') + 10, null, ['class'=> 'form-control', 'data-stripe'=> 'exp-year']) !!}
					</div>
				</div>
				<div class="form-group">
					
					<div class="">
						{!! Form::submit('Buy Now', ['class'=>'btn btn-primary']) !!}
					</div>
					<a href="//stripe.com/" target="_blank"><img width="150px" height="80px" src="utryout/img/stripe.jpg"></a>
				</div>
				<div class="payment-errors">
					
				</div>			
		      {!! Form::close() !!}
		 </div>
    </div>
  </div> --}}

</div>
@endsection

@section('scripts')

	<script src="{{ asset('utryout/adm/js/billing.js') }}"></script>

@endsection
