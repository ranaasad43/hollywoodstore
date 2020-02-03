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
			$credential = [
				'key' => $this->apiKey,
				'token' => $this->apiToken
			];				

			$data = array_merge($credential,$data);

			//dd($data);


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
			//dd($result);
			return json_decode($result);	
		}
	}  