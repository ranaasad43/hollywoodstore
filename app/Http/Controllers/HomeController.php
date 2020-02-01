<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends ViewsComposingController
{
    public function gethome(){
    	$this->viewData['title'] = 'Welcome to Home Page';
    	
    	return $this->buildTemplate('home');
    }
}
 