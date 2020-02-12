
<div class="navbar-fixed ">
  <nav class="black nav-div">
    <div class="nav-wrapper container ">
      <a href="{{url('/')}}" class="brand-logo">Hollywood Store</a>
      
      <span class="red-text loginuser">Welcome 
        {{!empty($userData) ? $userData->name : 'Guest'}}         
      </span>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        @if(!empty(session()->get('userData')))
          <li>
            <a href="#" title="shopping cart">Cart Items:{{$quantity}}/Total:{{$total}}$</a>
          </li>
        @endif
        <li><a href="#">Help</a></li>
        
      </ul>
    </div>
  </nav>  
</div>
<div class="container   main">