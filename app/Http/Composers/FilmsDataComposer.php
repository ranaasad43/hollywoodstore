<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Helpers\ApiCaller;

	class FilmsDataComposer {

		public function compose(View $view){
			$api = new ApiCaller;
			$results = $api->getApiData('GET','showfilms',[]);     
			
			//dd($results->data);
			$view->with('films',!empty($results->data) ? $results->data : []);
		}

	}
