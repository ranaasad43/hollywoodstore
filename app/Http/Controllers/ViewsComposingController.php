<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsComposingController extends Controller
{
    protected $viewData = array();

    public function buildTemplate($page_name){

    	$page = config('pages.'.$page_name);
    	//dd($page);
    	if(!empty($page)){
    		$sections = array('headSection','headerSection','mainSection','footerSection');
    		//dd($this->viewData);
    		//dd($page);
    		foreach($sections as $section){
                
    			$this->viewData[$section.'s'] = $page[$section];
    		}

    		return view($page['layout'],$this->viewData);
    	}else{
    		dd('page not found');
    	}
    }
}
