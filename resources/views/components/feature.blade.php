<div class="col m9">				
	<div class="heading">
		<h5 class="z-depth-2 ">Feature Movies</h5>	
	</div>

	<ul class="feature-movies">
		@if(!empty($films))
			@foreach($films as $film)
				<li class="z-depth-3">
					<img src="images/thor.jpg" alt="movie">
					<div class="movie-title">{{$film->title}}</div>
					<div class="movie-year">{{$film->year}}</div>
					<div class="movie-price">20$</div>
					<a href="#" class="btn">Buy</a>
				</li>
			@endforeach
		@endif				
	</ul>			
</div>