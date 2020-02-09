<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends ViewsComposingController
{
    public function getadmin(){
    	$this->viewData['title'] = 'Admin Panel';
    	
    	return $this->buildTemplate('admin');
    }
}
