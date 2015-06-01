@extends('app')

@section('content')
{{-- <div class="container-fluid"> --}}
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

					{{-- {!! Form::open() !!} --}}
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/tryouts') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Organization</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="organization" placeholder="Enter Organization/Team Name">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Organization Website</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="website" placeholder="www.example.com or example.com">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Name of Contact</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="contact_name">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Email of Contact</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="contact_email">
							</div>
						</div>
							{{--****************************** Make sport a dropdown ****************************************************** --}}
						<div class="form-group">
							<label class="col-md-4 control-label">Sport</label>
							<div class="col-md-6">
								<select id="form-state" class="form-control" name="sport">
									<option value="" selected disabled>Sport</option>
									<option value="baseball">Baseball</option>
									<option value="basketball">Basketball</option>
									<option value="football">Football</option>
									<option value="football">Hockey</option>
									<option value="football">Lacrosse</option>
									<option value="soccer">Soccer</option>
									<option value="softball">Softball</option>
								</select>
							</div>
						</div>

						<div class="form-group age">
							<p class="col-md-4 control-label">Please Select An Age Group</p>
							<div class="col-md-7 btn-group">
								<label for="18" class="btn btn-primary unchecked">18u</label>
								<input type="checkbox" name="age[]" value="18" id="18" class="hidden">
								<label for="17" class="btn btn-primary unchecked">17u</label>
								<input type="checkbox" name="age[]" value="17" id="17" class="hidden">
								<label for="16" class="btn btn-primary unchecked">16u</label>
								<input type="checkbox" name="age[]" value="16" id="16" class="hidden">						
								<label for="15" class="btn btn-primary unchecked">15u</label>
								<input type="checkbox" name="age[]" value="15" id="15" class="hidden">							
								<label for="14" class="btn btn-primary unchecked">14u</label>
								<input type="checkbox" name="age[]" value="14" id="14" class="hidden">
								<label for="13" class="btn btn-primary unchecked">13u</label>
								<input type="checkbox" name="age[]" value="13" id="13" class="hidden">
								<label for="12" class="btn btn-primary unchecked">12u</label>
								<input type="checkbox" name="age[]" value="12" id="12" class="hidden">
								<label for="11" class="btn btn-primary unchecked">11u</label>
								<input type="checkbox" name="age[]" value="11" id="11" class="hidden">						
								<label for="10" class="btn btn-primary unchecked">10u</label>
								<input type="checkbox" name="age[]" value="10" id="10" class="hidden">							
								<label for="9" class="btn btn-primary unchecked">9u</label>
								<input type="checkbox" name="age[]" value="9" id="9" class="hidden">
								<label for="8" class="btn btn-primary unchecked">8u</label>
								<input type="checkbox" name="age[]" value="8" id="8" class="hidden">
								<label for="7" class="btn btn-primary unchecked">7u</label>
								<input type="checkbox" name="age[]" value="7" id="7" class="hidden">
								<label for="6" class="btn btn-primary unchecked">6u</label>
								<input type="checkbox" name="age[]" value="6" id="6" class="hidden">						
							</div>
						</div>

						<div>
							<a href="#" class="btn btn-primary add" id="add-component">Add Another Age Group</a>
							<p>Note: Additional charge of $3.00 will be applied</p>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Tryout Date</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="date">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Tryout Time</label>
							<div class="col-md-6">
								<input type="time" class="form-control" id="time" name="time">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Location</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="location" placeholder="Enter park name, cross streets, etc.">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="city">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">State</label>
							<div class="col-md-6">
									<select id="form-state" class="form-control" name="state">
									<option value="" selected disabled>State</option>
									<option value="AL">Alabama</option>
									<option value="AK">Alaska</option>
									<option value="AZ">Arizona</option>
									<option value="AR">Arkansas</option>
									<option value="CA">California</option>
									<option value="CO">Colorado</option>
									<option value="CT">Connecticut</option>
									<option value="DE">Delaware</option>
									<option value="DC">District Of Columbia</option>
									<option value="FL">Florida</option>
									<option value="GA">Georgia</option>
									<option value="HI">Hawaii</option>
									<option value="ID">Idaho</option>
									<option value="IL">Illinois</option>
									<option value="IN">Indiana</option>
									<option value="IA">Iowa</option>
									<option value="KS">Kansas</option>
									<option value="KY">Kentucky</option>
									<option value="LA">Louisiana</option>
									<option value="ME">Maine</option>
									<option value="MD">Maryland</option>
									<option value="MA">Massachusetts</option>
									<option value="MI">Michigan</option>
									<option value="MN">Minnesota</option>
									<option value="MS">Mississippi</option>
									<option value="MO">Missouri</option>
									<option value="MT">Montana</option>
									<option value="NE">Nebraska</option>
									<option value="NV">Nevada</option>
									<option value="NH">New Hampshire</option>
									<option value="NJ">New Jersey</option>
									<option value="NM">New Mexico</option>
									<option value="NY">New York</option>
									<option value="NC">North Carolina</option>
									<option value="ND">North Dakota</option>
									<option value="OH">Ohio</option>
									<option value="OK">Oklahoma</option>
									<option value="OR">Oregon</option>
									<option value="PA">Pennsylvania</option>
									<option value="RI">Rhode Island</option>
									<option value="SC">South Carolina</option>
									<option value="SD">South Dakota</option>
									<option value="TN">Tennessee</option>
									<option value="TX">Texas</option>
									<option value="UT">Utah</option>
									<option value="VT">Vermont</option>
									<option value="VA">Virginia</option>
									<option value="WA">Washington</option>
									<option value="WV">West Virginia</option>
									<option value="WI">Wisconsin</option>
									<option value="WY">Wyoming</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
								<textarea class="form-control" name="description" placeholder="List any other details"></textarea>
							</div>
						</div>	

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Post
								</button>
							</div>
						</div>
					</form>
					{{-- {!! Form::close() !!} --}}
				</div>
			</div>
		</div>
	{{-- </div> --}}
</div>
@endsection
