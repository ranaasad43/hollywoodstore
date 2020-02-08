<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Helpers\ApiCaller;
use Cart;
class CartController extends Controller{
    
    public function addToCart(Request $req,$id,ApiCaller $api){
    	//dd($id);
    	$result = $api->getApiData('GET','film/'.$id,[]);
    	//dd($result->data);
    	if(!empty($result->data)){
    		Cart::add(array(
    			'id' => $result->data->id,
    			'name' => $result->data->title,
    			'quantity' => 1,
    			'price' => 20,
    			'attributes' => array()
    		));
    		return redirect()->back();
    	}else{
    		return redirect()->back();
    	}
    }
}
