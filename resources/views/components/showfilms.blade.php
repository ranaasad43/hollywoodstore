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
					<a href="{{url('/film/'.$film->id)}}" id="add_to_cart" class="btn yellow" >Read More</a>
					<a href="{{url('/addToCart/'.$film->id)}}" id="add_to_cart" class="btn  green accent-4" data-product="{{$film->id}}">Add To Cart</a>
					<a href="{{url('/editfilm/'.$film->id)}}" id="add_to_cart" class="btn blue darken-3
" >Update</a>
					<form action="{{route('delfilm',$film->id)}}" method="post">
						@csrf
						@method('DELETE')				    
						<button type="submit" class="btn red darken-2" >Delete</button>  
					</form>
					
				</li>
			@endforeach
		@endif				
	</ul>			
</div>