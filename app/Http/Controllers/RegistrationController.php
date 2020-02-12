<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
use App\Http\Helpers\ApiCaller;

class RegistrationController extends ViewsComposingController
{
    public function index(){
    	$this->viewData['title'] = 'Registration Page';
    	return $this->buildTemplate('register');
    }

    public function adduser(Request $req,ApiCaller $api){
    	
    	$rules = [
    		// 'name' =>'min:3',
    		// 'user_name' => 'min:5',
    		// 'email' => 'email',
    		// 'password' => 'required',
    		// 'retype-password' => 'required|same:password',
    		// 'dob' => 'date',
    		// 'country' => 'required',
    		// 'image' => 'mimes:png,png'

    	];

    	$msgs = [
    		'name.min' => 'minimum three letters name'
    	];

    	$validator = Validator::make($req->all(),$rules,$msgs);

        if(!empty($validator->messages()->all())){
            $this->viewData['errors'] = $validator->messages()->all();
            return $this->buildTemplate('register');
        }

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

        $params = array();

        $params['name'] = $req->get('name');
        $params['user_name'] = $req->get('user_name');
        $params['email'] = $req->get('email');
        $params['password'] = sha1($req->get('password'));
        $params['gender'] = $req->get('gender');
        $params['date_of_birth'] = $req->get('dob');
        $params['country'] = $req->get('country');
        $params['profile_image'] = $image_name;

        //dd($params);
        $response = $api->getApiData('POST','adduser',$params);
        //dd($response);
        $msgClass = ($response->status == 400) ? 'red-text' :'green-text';
        //dd($msgClass);
        $this->viewData['message'] = !empty($response->message) ? $response->message : '';
        $this->viewData['message_class'] = $msgClass;

        $this->viewData['errors'] = !empty($response->errors) ? $response->errors : [];
        //dd($this->viewData);
        if($response->status == 400){
          return $this->buildTemplate('register');  
        }else{
          return redirect('/',$this->viewData);
        }    

    }

    public function getLoginPage(){
      $this->viewData['title'] = 'Login Here';
      return $this->buildTemplate('login');
    }

    public function userLogin(Request $req,ApiCaller $api){
      //dd($req->all());
      $rules = [
        'email' =>'email',
        'password' => 'required'
      ];

      $message = [];

      $validator = Validator::make($req->all(),$rules,$message);

      if(!empty($validator->messages()->all())){
        $this->viewData['errors'] = $validator->message()->all();
        return $this->buildTemplate('login');
      }

      $params = array();

      $params['email'] = $req->get('email');
      $params['password'] = sha1($req->get('password'));

      $response = $api->getApiData('GET','userLogin',$params);
      //dd(serialize($response->data));
      if(empty($response->data)){
        $this->viewData['errors'] = 'User not Found .Try Again';
        return $this->buildTemplate('login');
      }

      session(['userData' => serialize($response->data)]);
      //dd(session()->get('userData'));
      return redirect('/');
    }

    public function logout(){
      if(!empty(session()->get('userData')) || !empty(session()->get('admin'))){
        session()->flush();
        }

      return redirect()->back();
    }
}
