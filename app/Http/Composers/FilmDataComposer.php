<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Helpers\ApiCaller;

	class FilmDataComposer {

		public function compose(View $view){

			$api = new ApiCaller();
			$params = array();
			$segments = request()->segments();
			//dd($segments);
			$params['featured'] = 1;
			if(!empty($segments)){
				switch ($segments[0]){
					case 'genre_id':
						$params['genre_id'] = $segments[1];
					break;	
				}
			}
			//dd($params);
			$result = $api->getApiData('GET','films',$params);
			//dd('fafsdf');
			//dd($result->data);
			$view->with('films',!empty($result->data) ? $result->data : []);
		}

	}
