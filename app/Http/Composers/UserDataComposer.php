<?php 
	
namespace App\Http\Composers;

use Illuminate\View\View;

	class UserDataComposer {

		public function compose(View $view){

			$sessionData = session()->get('userData');
			$userData = !empty($sessionData) ? unserialize($sessionData) : '';
			//dd($userData);
			$view->with('userData',$userData);
		}
	}
