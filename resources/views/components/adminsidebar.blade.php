<div class="col m3 genere-col">				
	<div class="heading">
		<h5 class="z-depth-2 ">
      @if(!empty(session()->get('admin')))
        {{session()->get('admin')['name']}}
      @endif
    </h5>	
	</div>							
	@if(!empty(session()->get('admin')))
    <ul class="collection genere-list z-depth-2">       
      
      <li class="collection-item">
        <div>
          Logout
          <a href="{{route('delsession')}}" class="secondary-content">
            <i class="material-icons">logout</i>
          </a>
        </div>
      </li>
    </ul>
  @endif
  <ul class="collection genere-list z-depth-2">   
      <li class="collection-item">
      	<div>
      		Add Film
      		<a href="{{route('addfilm')}}" class="secondary-content">
      			<i class="material-icons">send</i>
      		</a>      		
      	</div>
      </li>       
	</ul>

</div>