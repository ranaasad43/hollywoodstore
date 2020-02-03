<nav class="black">
    <div class="nav-wrapper container ">
      <a href="{{url('/')}}" class="brand-logo">Hollywood Store</a>
      <?php $userData = []; ?>
      @if(!empty(session()->get('userData')))
		<?php
			$usersData = unserialize(session()->get('userData'));			
		?>		
      @else
		<?php
			$usersData = ['name'=>'Guest'];			
		?>	
      @endif
      <span class="red-text loginuser">User : {{$usersData->name}}</span>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="#">Shoppong cart:</a></li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
  </nav>