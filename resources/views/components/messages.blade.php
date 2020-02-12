<div class="heading">	
	<p class="message-box {{!empty($message_class) ? $message_class : ''}}">
	  {{!empty($message) ? $message : ''}}
	</p>
	<ul>
	  @foreach($errors as $error)
		<li class="red-text center-align">{{$error}}</li>
	  @endforeach
	</ul>	
</div>