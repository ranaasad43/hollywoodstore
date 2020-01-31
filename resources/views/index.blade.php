<!DOCTYPE html>
<html>
	@include('components.head')
<body>
  @include('components/navbar')
	<div class="container   main">		
		@include('components.slider')
		@include('components.innernav')
		<div class="row section ">
			@include('components.sidebar')
			@include('components.feature')
		</div>
	</div>
	@include('components.footer')
</body>
</html>