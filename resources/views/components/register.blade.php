<div class="col m12">
	<div class="heading">
		<h5 class="z-depth-2">Registration</h5>	
	</div>
	<div class="container">
		{!! Form::open(['url' => '/registration' , 'files' => true]) !!}
    <div class="form-group">
        {{ Form::label('name:', null) }}
        {{ Form::text('name', '', ['placeholder' => '']) }}
    </div>
    <div class="form-group">
        {{ Form::label('user name:', null) }}
        {{ Form::text('user_name', '', ['placeholder' => '' , 'class' => 'user_name']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email:', null) }}
        {{ Form::email('email', '') }}
    </div>
    <div class="form-group">
        {{ Form::label('password:', null) }}
        {{ Form::password('password') }}
    </div>
    <div class="form-group">
        {{ Form::label('retype-password:', null) }}
        {{ Form::password('retype-password'  ) }}
    </div>
    <div class="form-group">
        {{ Form::label('Male:', null) }}
        {{ Form::radio('gender', 'male')}}
        {{ Form::label('Fe-Male:', null) }}
        {{ Form::radio('gender', 'fe-male')}}
    </div>
    <div class="form-group">
        {{ Form::label('Date of Birth:', null) }}
        {{ Form::date('dob', \Carbon\Carbon::now()) }}
    </div>
    <div class="form-group">
        {{ Form::label('Select Country :', null) }}
        {{  Form::select('country', ['pak'=> 'Pakistan' , 'in'=> 'India']) }}
    </div>
    <div class="form-group">
        {{ Form::label('Profile Image:', null) }}
        {{ Form::file('image') }}
    </div>
        {{ Form::submit('Register' , ['class' => 'btn ']) }}
	{!! Form::close() !!}	
	</div>
	
	
</div>