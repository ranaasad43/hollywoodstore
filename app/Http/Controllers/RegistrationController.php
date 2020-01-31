<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends ViewsComposingController
{
    public function index(){
    	$this->viewData['title'] = 'Registration Page';
    	return $this->buildTemplate('register');
    }
}
