<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Helpers\ApiCaller;

	class StudioDataComposer {

		public function compose(View $view){

			$api = new ApiCaller();
			$result = $api->getApiData('GET','studios',[]);
			//dd($result->data);
			$view->with('studios',!empty($result->data) ? $result->data : []);
		}
	}
