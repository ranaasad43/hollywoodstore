<?php

	namespace App\Http\Helpers;

	class ApiCaller{

		protected $apiKey;
		protected $apiToken;

		public function __construct(){
			$this->apiKey = env('API_KEY');
			$this->apiToken = env('API_TOKEN');
		}

		public function getApiData($method,$endpoint,$data=[],$debug=false){
			//dd(env('API_URL').$endpoint);
			//dd(env('API_DEBUG'));
			//dd($data);
			// $credential = [
			// 	'key' => $this->apiKey,
			// 	'token' => $this->apiToken
			// ];				

			// $data = array_merge($credential,$data);

			//dd($data);
			//dd(env('API_URL').$endpoint);
			if(!empty($data['file'])){
				$file = $data['file'];
				$name = $data['filename'];
				$type = $data['filetype'];
				//dd($file);
				if (function_exists('curl_file_create')) {
  					$cFile = curl_file_create($file,$type,$name);
  					$data['file'] = $cFile;
  					//dd($data);
					}
			}



			$curl = curl_init();
			switch($method){
				case 'POST':

					$options = array(
						CURLOPT_URL => env('API_URL').$endpoint,
						CURLOPT_POST => true, 
						CURLOPT_POSTFIELDS => $data,
						CURLOPT_RETURNTRANSFER => !empty(env('API_DEBUG')) ?	false:true

					);
					break;
			}

			switch ($method) {
				case 'GET':
					//dd($endpoint);
					$endUrl = $endpoint . '?';
					foreach($data as $key => $value){
						$endUrl .= "$key=$value&";
					}
					//dd('get api');
					$endPointUrl = rtrim($endUrl,'&');
					//dd($endPointUrl);
					$options = array(
						CURLOPT_URL => env('API_URL').$endPointUrl,
						CURLOPT_RETURNTRANSFER => !empty(env('API_DEBUG')) ? false : true 
					);

					break;
			}

			//dd($options);
			curl_setopt_array($curl,$options);
			$result = curl_exec($curl);
			curl_close($curl);
			dd($result);
			return json_decode($result);	
		}
	}  