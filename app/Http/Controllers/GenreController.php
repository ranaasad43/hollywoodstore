<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\ApiCaller;

class GenreController extends ViewsComposingController{
	
	public function getGenre($id,ApiCaller $api){
		
		$results = $api->getApiData('GET','getgenre/'.$id,[]);
		//dd($results->status);
		$this->viewData['status'] = !empty($results->status) ? $results->status : '';
		$this->viewData['films'] = !empty($results->data) ? $results->data : '';
		//dd($this->viewData);
		return $this->buildTemplate('genre');
	}
}
