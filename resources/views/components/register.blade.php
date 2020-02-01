<div class="col m12">
	<div class="heading">
		<h5 class="z-depth-2">Registration</h5>	
	</div>
	<div class="container form-container">
		{!! Form::open(['url' => '/register' ,'method' => 'post', 'files' => true]) !!}
    <div class="input-field ">
        {{ Form::label('name:', null) }}
        {{ Form::text('name', '') }}
    </div>
    <div class="input-field ">
        {{ Form::label('user name:', null) }}
        {{ Form::text('user_name', '') }}
    </div>
    <div class="input-field ">
        {{ Form::label('email:', null) }}
        {{ Form::email('email', '') }}
    </div>
    <div class="input-field ">
        {{ Form::label('password:', null) }}
        {{ Form::password('password') }}
    </div>
    <div class="input-field ">
        {{ Form::label('retype-password:', null) }}
        {{ Form::password('retype-password'  ) }}
    </div>
    <p>
      <label>          
       {{ Form::radio('gender', 'male')}}
       <span>Male</span>        
     </label>
    </p>
    <p>    
      <label>          
       {{ Form::radio('gender', 'female')}}
       <span>Female</span>        
      </label>
    </p>    
    <div class="input-field ">
        {{ Form::label('Date of Birth:', null) }}
        {{ Form::date('dob', \Carbon\Carbon::now()) }}
    </div>    
    <div class="">
      <label>Select Country:</label>
     <select class="browser-default" name="country">     
      <option value="pak">Pakistan</option>
      <option value="in">India</option>
      <option value="us">United States</option>
    </select>    
  </div>
  <div class="file-field input-field">
      <div class="btn">
        <span>Profile Image</span>
        <input type="file" name="image">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>   
    {{ Form::submit('Register' , ['class' => 'btn ']) }}
	{!! Form::close() !!}	
	</div>
	
	
</div>