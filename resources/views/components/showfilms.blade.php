<div class="col m9">				
	<div class="heading">
		<h5 class="z-depth-2 ">All Films</h5>	
	</div>

	<ul class="feature-movies">
		@if(!empty($films))
			@foreach($films as $film)
				<li class="z-depth-3">
					<img src="{{url('/posters/'.$film->title.'/'.$film->poster)}}" alt="movie">
					<div class="movie-title">{{$film->title}}</div>
					<div class="movie-year">{{$film->year}}</div>
					<div class="movie-price">20$</div>
					<a href="{{url('/film/'.$film->id)}}" id="add_to_cart" class="btn" >Read More</a>
					<a href="{{url('/addToCart/'.$film->id)}}" id="add_to_cart" class="btn" data-product="{{$film->id}}">Add To Cart</a>

					<form action="{{route('delfilm',$film->id)}}" method="post">
						@csrf
						@method('DELETE')				    
						<button type="submit" class="btn" >Delete</button>  
					</form>
					
				</li>
			@endforeach
		@endif				
	</ul>			
</div>