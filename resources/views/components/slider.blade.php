
<div class="row slider-container">
			<div class="col m12">
				<div class="carousel carousel-slider center hollycarousel">
				<div class="carousel-fixed-item center">
				  
				</div>
				<div class="carousel-item red white-text" href="#one!">
				  <img class="slider-img" src="images/jl.jpg" alt="movie">
				</div>
				<div class="carousel-item amber white-text" href="#two!">
				  <img class="slider-img" src="images/avengers.png" alt="movie">
				</div>
				<div class="carousel-item green white-text" href="#three!">
				  <img class="slider-img" src="images/darknight.jpg" alt="movie">
				</div>
				<div class="carousel-item blue white-text" href="#four!">
				  <img class="slider-img" src="images/slide2.jpg" alt="movie">
				</div>
			</div>
			</div>
		</div>
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