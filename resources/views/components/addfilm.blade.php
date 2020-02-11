<div class="col m9">
	<div class="heading">
		<h5 class="z-depth-2">Add Film</h5>
    <p class="message-box {{!empty($message_class) ? $message_class : ''}}">
      {{!empty($message) ? $message : ''}}
    </p>
    <ul>
       @foreach($errors as $error)
        <li class="red-text center-align">{{$error}}</li>
      @endforeach
    </ul>	
	</div>
	<div class="container form-container">
		 <form class="col s12" method="post" action="{{url('/addfilm')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="input-field ">
          <input  name="title" type="text" >
          <label for="title">Film title :</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field">
          <input type="number" name="year" min="1900" max="3000">
          <label for="year">Release Year :</label>
        </div>
      </div>
      <div class="row">
        <div >
          <label>Select Genre :</label>
          <select class="browser-default" name="genre">
            <option value="" disabled selected>Genre</option>
            <option value="1">Horror</option>
            <option value="2">Scifi</option>
            <option value="3">Action</option>
            <option value="4">Comedy</option>
            <option value="5">Fantasy</option>
            <option value="6">Mystery</option>
          </select>          
        </div>
      </div>      
      <div class="row">
        <div >
          <label>Studio :</label>
          <select class="browser-default" name="studio">
            <option value="" disabled selected>Studio</option>
            <option value="1">Marvel Studio</option>
            <option value="4">Universal Pictures</option>
            <option value="5">DC Comics</option>
            <option value="6">Netflix</option>
            <option value="7">Lucasfilm</option>
            <option value="8">Warner Bros</option>
            <option value="9">Disney</option>
          </select>          
        </div>
      </div>
      <div class="row">
        <div class="col s12">          
          <div class="input-field col s12">
            <textarea name="plot" class="materialize-textarea"></textarea>
            <label for="plot">Plot :</label>
          </div>
        </div>
      </div>
      <div class="row">
        <div >
          <label>Featured:</label>
          <select class="browser-default" name="feature">
            <option value="" disabled selected>feature</option>
            <option value="0">No</option>
            <option value="1">Yes</option>            
          </select>          
        </div>
      </div>      
      <div class="file-field input-field">
      <div class="btn">
        <span>Poster</span>
        <input type="file" name="poster">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <div class="row">
        <div class="col s12">          
          <div class="input-field col s12">
            <button type="submit" class="btn-large">Add</button>
          </div>
        </div>
      </div>
    </form>
    <div class="clearfix"></div>    
     
    	
	</div>
 	
</div>