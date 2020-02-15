<footer class="page-footer black">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">HollywoodStore</h5>
          <p class="grey-text text-lighten-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat.</p>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Follow Us</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">About Us</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container center-align">
      © 2020 Copyright Hollywood Store      
      </div>
    </div>
  </footer>
  @foreach($footerJsLinks as $link)
    <script type="text/javascript" src="{{url('/'.$link)}}"></script>
  @endforeach