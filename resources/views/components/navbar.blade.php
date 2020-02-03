<nav class="black">
    <div class="nav-wrapper container ">
      <a href="{{url('/')}}" class="brand-logo">Hollywood Store</a>
      
      <span class="red-text loginuser">Welcome 
      	{{!empty($userData) ? $userData->name : 'Guest'}}      		
  	  </span>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#">Shoppong cart:</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
  </nav>