<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
use App\Http\Helpers\ApiCaller;

class FilmsController extends ViewsComposingController
{
    public function addPage(){
    	$this->viewData['title'] = "Add Film";
    	return $this->buildTemplate('addfilm');
    }

    public function store(Request $req,ApiCaller $api){
    	//dd($req->all());
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
            return $this->buildTemplate('addfilm');
        }

    	// if(!is_dir(public_path('/users'))){
    	// 	mkdir(public_path('/users'));
    	// }

    	// if(!is_dir(public_path('/users/'.$req->get('user_name')))){
    	// 	mkdir(public_path('/users/'.$req->get('user_name')));
    	// }   	

    	// $image = Image::make($req->file('image'));
    	// $wm = Image::make(public_path('/images/film.png'))->resize(50,50);

    	// $image->insert($wm, 'bottom-left');

    	// $directory = public_path('/users/'.$req->get('user_name'));

    	// $image_name = $req->get('user_name').'.'.$req->file('image')->getClientOriginalExtension();

    	// $image->save($directory.'/'.$image_name);

        $params = array();

        $params['title'] = $req->get('title');
        $params['year'] = $req->get('year');
        $params['genre'] = $req->get('genre');
        $params['studio'] = $req->get('studio');
        $params['plot'] = $req->get('plot');

        //dd($params);
        $response = $api->getApiData('POST','addfilm',$params);
        //dd($response);
        $msgClass = ($response->status == 400) ? 'red-text' :'green-text';
        //dd($msgClass);
        $this->viewData['message'] = !empty($response->message) ? $response->message : '';
        $this->viewData['message_class'] = $msgClass;

        $this->viewData['errors'] = !empty($response->errors) ? $response->errors : [];
        //dd($this->viewData);
        if($response->status == 400){
          return $this->buildTemplate('addfilm');  
        }else{
            $data = $this->viewData;
            //dd($data);
          return $this->buildTemplate('home');
        }
    }
}
