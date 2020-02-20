
<div class="heading">	
	<p class="message-box {{!empty($message_class) ? $message_class : ''}}">
	  {{!empty($message) ? $message : ''}}
	</p>
	<ul>
		@if(!empty($errors))
		  @foreach($errors as $error)
			<li class="red-text center-align">{{$error}}</li>
		  @endforeach
		@endif  
	</ul>	
</div>