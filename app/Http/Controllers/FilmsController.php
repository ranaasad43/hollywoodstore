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
    		 'title' =>'min:3',
    		 'year' => 'min:4',
         'genre' => 'required',
         'studio' => 'required',
         'plot' => 'required',
    		 'poster' => 'mimes:jpeg,jpg,png',
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
        $posterdir = str_replace(' ', '',$req->get('title') );
        $posterdir = str_replace(':', '',$posterdir);
        //dd($posterdir);
          if(!is_dir(public_path('/posters'))){
    				mkdir(public_path('/posters'));
    			}
    			if(!is_dir(public_path('/posters/'.$posterdir))){
    				mkdir(public_path('/posters/'.$posterdir));
    			}  			
    			$postername = $req->year.$req->genre.$req->studio.".".$req->file('poster')->getClientOriginalExtension();
    			$directory = public_path('/posters/'.$posterdir);
    			$poster = $req->file('poster');
         	

        $params = array();

        $params['title'] = $req->get('title');
        $params['year'] = $req->get('year');
        $params['genre'] = $req->get('genre');
        $params['studio'] = $req->get('studio');
        $params['plot'] = $req->get('plot');
        $params['poster'] = $postername;
        $params['featured'] = $req->get('featured');
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
          return $this->buildTemplate('admin');
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
        $this->viewData['status'] = !empty($results->status) ? $results->status : '';
        $this->viewData['message'] = !empty($results->message) ? $results->message : '';
        $this->viewData['message_class'] = 'red';
        return $this->buildTemplate('admin');    
    }

    public function edit($id,ApiCaller $api){
    	$results = $api->getApiData('GET','film/'.$id,[]);
    	//dd($results);
    	$this->viewData['film'] = $results->data;
    	return $this->buildTemplate('editfilm');
    }

    public function update(Request $req,ApiCaller $api,$id){
    	//dd($req->all());
      $rules = [
         'title' =>'min:3',
         'year' => 'min:4',
         'genre' => 'required',
         'studio' => 'required',
         'plot' => 'required',
         'poster' => 'required|mimes:jpeg,jpg,png',
      ];

      $msgs = [
        'name.min' => 'title should be minum 3 letters'
      ];

      $validator = Validator::make($req->all(),$rules,$msgs);

        if(!empty($validator->messages()->all())){
          //dd($validator->messages()->all());
          $this->viewData['errors'] = $validator->messages()->all();
          return $this->buildTemplate('editfilm');
        }

      $posterdir = str_replace(' ', '',$req->get('title') );
      $posterdir = str_replace(':', '',$posterdir);
      
      if(!is_dir(public_path('/posters/'.$posterdir))){
        mkdir(public_path('/posters/'.$posterdir));
      }       
      $postername = $req->year.$req->genre.$req->studio.".".$req->file('poster')->getClientOriginalExtension();
      $directory = public_path('/posters/'.$posterdir);
      $poster = $req->file('poster');

      //dd($postername." :" .$posterdir);  
      
    	$params['title'] = $req->get('title');
      $params['year'] = $req->get('year');
      $params['genre'] = $req->get('genre');
      $params['studio'] = $req->get('studio');
      $params['plot'] = $req->get('plot');
      $params['featured'] = $req->get('featured');
      $params['poster'] = $postername;
      
      $posterdir = str_replace(' ', '',$req->get('title') );
      $posterdir = str_replace(':', '',$posterdir);
      
      if(!is_dir(public_path('/posters/'.$posterdir))){
        mkdir(public_path('/posters/'.$posterdir));
      }       
      $postername = $req->year.$req->genre.$req->studio.".".$req->file('poster')->getClientOriginalExtension();
      $directory = public_path('/posters/'.$posterdir);
      $poster = $req->file('poster');

      //dd($params);
      
    	$response = $api->getApiData('POST','updatefilm/'.$id,$params);
      //dd($results);
      

      if(!empty($response)){
        $this->viewData['status'] = !empty($response->status) ? $response->status : '';
        $this->viewData['message'] = !empty($response->message) ? $response->message : '';
        if($response->status == 200){         
          $poster->move($directory,$postername);          
        }

        if($response->status == 400){
          return $this->buildTemplate('editfilm'); 
        } 
      }
        return $this->buildTemplate('admin');    
    }
}
