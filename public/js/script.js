$('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true,
    duration:100
  });

$('#submit_search').click(function(){
	var data = {};
	data.search = $('#search_value').val();
	// data.KEY = '2e3b4e5bc05c0b678ec769adc918409b';
	// data.TOKEN = '$2y$10$1iX2L8xcVPoleQ1XTCO1F.S4d8eVyviuRt0fIpeMLMDJ6tF3x5ASq';
	console.log(data);
	$.ajax({
		type: "POST",
		url:base_url+'/films',
		data:data,
		success: function(res){
			//console.log(res);
			result = JSON.parse(res);
			//console.log(result.data);
			if(typeof result.status != 'undefined' && result.status == 200){
				if(result.data.length > 0){
					var html = "";
					$.each(result.data,function(key,value){
						html += "<li class='z-depth-3'>";
							html += "<img src='{{url('/posters/'.$film->title.'/'.$film->poster)}}' alt='movie'>";
							html += "<div class='movie-title'>"+value.title+"</div>";
							html += "<div class='movie-year'>"+value.year+"</div>";
							html += "<div class='movie-price'>"+"20$"+"</div>";
							html += "<a href='"+base_url+"/addToCart/"+value.id+"' id='add_to_cart' class='btn'>Add To Cart</a>"; 	
						html += "</li>";
					});
					$('.feature-movies').html(html);					
				}else{
					$('.feature-movies').html('<li>not found</li>');
				}
			}
		},
		error: function(error){
			console.log(JSON.stringify(error));
		}

	});
});
