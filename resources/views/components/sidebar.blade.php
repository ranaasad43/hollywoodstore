<div class="col m3 genere-col">				
	<div class="heading">
		<h5 class="z-depth-2 ">Genere</h5>	
	</div>							
	<ul class="collection genere-list z-depth-2">	        
    @if(!empty($genres))
    @foreach($genres as $genre)
      <li class="collection-item">
      	<div>
      		{{$genre->title}}
      		<a href="{{url('/genre/'.$genre->genre_id)}}" class="secondary-content">
      			<i class="material-icons">send</i>
      		</a>
      	</div>
      </li>
    @endforeach
    @else
			<li>Genre Not Found</li>
		@endif      
	</ul>
	<div class="heading">
		<h5 class="z-depth-2 ">Studios</h5>
		<ul class="collection genere-list z-depth-2">	        
	    @if(!empty($studios))
	    @foreach($studios as $studio)
	      <li class="collection-item">
	      	<div>
	      		{{$studio->title}}
	      		<a href="{{url('/studio/'.$studio->studio_id)}}" class="secondary-content">
	      			<i class="material-icons">send</i>
	      		</a>
	      	</div>
	      </li>
	    @endforeach
	    @else
				<li>Genre Not Found</li>
			@endif      
		</ul>
			
	</div>
</div>