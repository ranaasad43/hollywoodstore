<!DOCTYPE html>
<html>
	@foreach($headSections as $section)
		@include("../components.$section")
	@endforeach
<body>
	@foreach($headerSections as $section)
		@include("../components.$section")
	@endforeach
	
		<div class="row section ">
			@foreach($mainSections as $section)
				@include("../components.$section")
			@endforeach
		</div>
	</div>
	@foreach($footerSections as $section)
		@include("../components.$section")
	@endforeach
</body>
</html>