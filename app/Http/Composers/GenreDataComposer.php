<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Helpers\ApiCaller;

	class GenreDataComposer {

		public function compose(View $view){

			$api = new ApiCaller();
			$result = $api->getApiData('GET','genres',[]);
			//dd($result->data);
			$view->with('genres',!empty($result->data) ? $result->data : []);
		}
	}
