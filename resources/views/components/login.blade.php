<div class="col m12 ">
	<div class="heading">
		<h5 class="z-depth-2">Login Here</h5>
    <p class="message-box {{!empty($message_class) ? $message_class : ''}}">
      {{!empty($message) ? $message : ''}}
    </p>
    <ul>
      @foreach($errors as $error)
        <li class="red-text center-align">{{$error}}</li>
      @endforeach
    </ul>	
	</div>
	<div class="container form-container">
		{!! Form::open(['url' => '/login','method' => 'post' ]) !!}
    
    <div class="input-field ">
        {{ Form::label('email:', null) }}
        {{ Form::email('email', request()->get('email')) }}
    </div>
    <div class="input-field ">
        {{ Form::label('password:', null) }}
        {{ Form::password('password') }}
    </div>
      
    {{ Form::submit('Login' , ['class' => 'btn ']) }}
	{!! Form::close() !!}	
	</div>
</div>