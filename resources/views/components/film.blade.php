<div class="col m9">				
	<div class="heading">
		<h5 class="z-depth-2 ">{{$film->title}}</h5>	
	</div>
	  <div class="row">
    <div class="col s9 m9">
      <div class="card film-card">
        <div class="card-image">
        	<?php 
						$title = str_replace(' ', '',$film->title);
					  $title = str_replace(':', '',$title);
					?>
					<img src="{{url('/posters/'.$title.'/'.$film->poster)}}" alt="movie">
          
          
        </div>
        <div class="card-content">
          <span class="card-title">{{$film->title}}</span>
					<span class="movie-price">Price :20$</span>
          <p>{{$film->plot}}</p>
        </div>
        <div class="card-action">
          <a href="{{url('/addToCart/'.$film->id)}}" id="add_to_cart" class="btn" data-product="{{$film->id}}">Add To Cart</a>
          
        </div>
      </div>
    </div>
  </div>
	{{-- <ul class="feature-movies">
		@if(!empty($film))
				<li class="z-depth-3">
					<img src="{{url('/images/thor.jpg')}}" alt="movie">
					<div class="movie-title">{{$film->title}}</div>
					<div class="movie-year">{{$film->year}}</div>
					<div class="movie-price">20$</div>
					<a href="{{url('/film/'.$film->id)}}" id="add_to_cart" class="btn" >Read More</a>
					<a href="{{url('/addToCart/'.$film->id)}}" id="add_to_cart" class="btn" data-product="{{$film->id}}">Add To Cart</a>
				</li>
		@endif				
	</ul> --}}

</div>