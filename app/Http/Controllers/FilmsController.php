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
    	//dd($req->file('poster')->getClientOriginalName());
        //dd($req->poster->getClientMimeType());
        //dd($req->poster->path());
        //dd($_FILES['poster']['type']);
        //dd($req->file('poster'))->mimeType();
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

         //$file = $req->poster->path();
         
         //$fileMime = $req->poster->getClientMimeType();
         if(!is_dir(public_path('/posters'))){
    				mkdir(public_path('/posters'));
    			}
    			if(!is_dir(public_path('/posters/'.$req->get('title')))){
    				mkdir(public_path('/posters/'.$req->get('title')));
    			}  			
    			$postername = $req->year.$req->genre.$req->studio.".".$req->file('poster')->getClientOriginalExtension();
    			$directory = public_path('/posters/'.$req->get('title'));
    			$poster = $req->file('poster');
         	

        $params = array();

        $params['title'] = $req->get('title');
        $params['year'] = $req->get('year');
        $params['genre'] = $req->get('genre');
        $params['studio'] = $req->get('studio');
        $params['plot'] = $req->get('plot');
        $params['poster'] = $postername;
        // $params['file'] = $file;
        // $params['filename'] = $filename;
        // $params['filetype'] = $fileMime;

        //dd($params);
        $response = $api->getApiData('POST','addfilm',$params);
        //dd($response);
        if($response->status == 200){        	
    			$poster->move($directory,$postername);    			
        };
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

    public function getFilms(Request $req, ApiCaller $api){
        //dd($req->all());
        $params = [];
        $params['search'] = $req->get('search');
        $results = $api->getApiData('GET','films',$params);
        //dd($results->data);
        return json_encode($results);
    }

    public function getFilm($id,ApiCaller $api){
        
        $results = $api->getApiData('GET','film/'.$id,[]);
        //dd($results);
        $this->viewData['status'] = !empty($results->status) ? $results->status : '';
        $this->viewData['film'] = !empty($results->data) ? $results->data : '';
        //dd($this->viewData);
        return $this->buildTemplate('film');
    }

    public function getStudios($id,ApiCaller $api){
        
        $results = $api->getApiData('GET','getstudios/'.$id,[]);
        //dd($results);
        $this->viewData['status'] = !empty($results->status) ? $results->status : '';
        $this->viewData['films'] = !empty($results->data) ? $results->data : '';
        //dd($this->viewData);
        return $this->buildTemplate('studio');
    }

    public function showFilms(ApiCaller $api){
        //dd('showfilms');
        $results = $api->getApiData('GET','showfilms',[]);
        //dd($results);
        $this->viewData['status'] = !empty($results->status) ? $results->status : '';
        $this->viewData['films'] = !empty($results->data) ? $results->data : '';
        //dd($this->viewData);
        return $this->buildTemplate('films');
    }

    public function destroy($id,ApiCaller $api){
        $results = $api->getApiData('DELETE','delfilm/'.$id,[]);
        //dd($results);
        return redirect()->back();    
    }
}
