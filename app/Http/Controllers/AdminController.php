<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class AdminController extends ViewsComposingController
{
		

    public function getadmin(Request $req){
    	//dd($req->name);
    	$rules = [
        'name' =>  'required',
        'email' =>'email',
        'password' => 'required'
      ];

      $message = [];

      $validator = Validator::make($req->all(),$rules,$message);

      if(!empty($validator->messages()->all())){
        $this->viewData['errors'] = $validator->message()->all();
        return $this->buildTemplate('adminlogin');
    	}

      $name = $req->name;
    	$admin = 'admin@admin.com';
    	$pass = 'admin';

  	 $data = array();
  	 if($req->email != $admin || $req->password != $pass ){
  	 		//dd('data not matched');
  	 		$this->viewData['errors'] = 'Error .Try Again';
        return $this->buildTemplate('adminlogin');
  	 }else{
  	 	//dd('data matched');
  	 	$data['name'] = $name;
  	 	session(['admin' => $data]);
  	 	//dd(session()->get('admin'));
      return redirect('/adminpage');
  	 }
    
  	}

  	public function adminpage(){
  		$this->viewData['title'] = 'Admin page';
    	
    	return $this->buildTemplate('admin');
  	}

    public function adminlogin(){
    	$this->viewData['title'] = 'Admin login';
    	
    	return $this->buildTemplate('adminlogin');	
    }
}
