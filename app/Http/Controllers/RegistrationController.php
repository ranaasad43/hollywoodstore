<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;

class RegistrationController extends ViewsComposingController
{
    public function index(){
    	$this->viewData['title'] = 'Registration Page';
    	return $this->buildTemplate('register');
    }

    public function adduser(Request $req){
    	dd($req->all());
    	$rules = [
    		'name' =>'min:3',
    		'user_name' => 'min:5',
    		'email' => 'email',
    		'password' => 'required',
    		'retype-password' => 'required|same:password',
    		'dob' => 'date',
    		'country' => 'required',
    		'image' => 'mimes:png,png'

    	];

    	$msgs = [
    		'name.min' => 'minimum three letters name'
    	];

    	$validator = Validator::make($req->all(),$rules,$msgs);

    	if(!is_dir(public_path('/users'))){
    		mkdir(public_path('/users'));
    	}

    	if(!is_dir(public_path('/users/'.$req->get('user_name')))){
    		mkdir(public_path('/users/'.$req->get('user_name')));
    	}   	

    	$image = Image::make($req->file('image'));
    	$wm = Image::make(public_path('/images/film.png'))->resize(50,50);

    	$image->insert($wm, 'bottom-left');

    	$directory = public_path('/users/'.$req->get('user_name'));

    	$image_name = $req->get('user_name').'.'.$req->file('image')->getClientOriginalExtension();

    	$image->save($directory.'/'.$image_name);

    	dd($validator->messages()->all());

//        dd($validator->messages()->all());

        
    }
}
