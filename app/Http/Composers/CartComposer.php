<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Http\Helpers\ApiCaller;
use Cart;

class CartComposer {

		public function compose(View $view){
			//dd(Cart::getContent());
			$view->with('quantity',Cart::getTotalQuantity())
				->with('total',Cart::getTotal());
		}
	}
