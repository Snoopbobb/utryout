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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Organization</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="organization" placeholder="Enter Oranization/Team Name">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Organization Website</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="website">
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

						<div class="form-group">
							<label class="col-md-4 control-label">Age</label>
							<div class="col-md-6">
									<select id="form-state" class="form-control" name="state">
									<option value="" selected disabled>Age</option>
									<option value="5">5 and under</option>
									<option value="6">6 and under</option>
									<option value="7">7 and under</option>
									<option value="8">8 and under</option>
									<option value="9">9 and under</option>
									<option value="10">10 and under</option>
									<option value="11">11 and under</option>
									<option value="12">12 and under</option>
									<option value="13">13 and under</option>
									<option value="14">14 and under</option>
									<option value="15">15 and under</option>
									<option value="16">16 and under</option>
									<option value="17">17 and under</option>
									<option value="18">18 and under</option>
									<option value="18">18 and up</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label">Tryout date and time</label>
							<div class="col-md-6">
								<input type="date" class="form-control" name="date">
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
								<input type="textarear" class="form-control" name="description" placeholder="List any other tryout details">
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

				</div>
			</div>
		</div>
	{{-- </div> --}}
</div>
@endsection
