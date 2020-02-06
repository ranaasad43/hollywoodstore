<div class="row">
	<div class="col m12 ">
		<nav class="amber accent-3">
	    <div class="nav-wrapper">			    				      
			  <ul id="nav-mobile" class="left hide-on-med-and-down">			      	
			        <li><a href="{{url('/')}}">Home</a></li>			  
			        <li><a href="#">Movies</a></li>
			  </ul>       
			  @if(empty(session()->get('userData')))			       
				  <ul id="nav-mobile" class="right hide-on-med-and-down">
				  	<li><a href="{{route('addfilm')}}" class="btn">Add Film</a></li>
				   	<li><a href="{{url('/register')}}" class="btn">Register</a></li>
				    <li><a href="{{url('/login')}}" class="btn">Login</a></li>
				  </ul>
			  @else
					<ul id="nav-mobile" class="right hide-on-med-and-down">     	
					  <li><a href="{{route('delsession')}}" class="btn">Logout</a></li>
					</ul>
				@endif   
	    </div>
		</nav>
	</div>
</div>