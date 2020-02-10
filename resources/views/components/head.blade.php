<head>
	<title>{{!empty($title) ? $title : 'Hollywood Store'}}</title>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	@foreach($headerCssLinks as $links)		
		<link rel="stylesheet" type="text/css" href="{{url('/'.$links)}}">
	@endforeach
	<script type="text/javascript">
		base_url = "{{url('/')}}";
	</script>	
</head>