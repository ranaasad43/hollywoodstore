<?php

	namespace App\Http\Helpers;

	class ApiCaller{

		public function getApiData($method,$endpoint,$data=[],$debug=false){
			//dd(env('API_URL').$endpoint);

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

			//dd($options);
			curl_setopt_array($curl,$options);
			$result = curl_exec($curl);
			curl_close($curl);

			return json_decode($result);	
		}
	}  