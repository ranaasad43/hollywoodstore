<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsComposingController extends Controller
{
	protected $viewData = array();

	public function buildTemplate($page_name){

		$page = config('pages.'.$page_name);

		$globalCss = config('globalcss');
		$globalJs = config('globaljs');
		//dd($globalJs);
		if(!empty($page)){
			$sections = array('headSection','headerSection','mainSection','footerSection');
			//dd($this->viewData);
			//dd($page);
			foreach($sections as $section){
				
				$this->viewData[$section.'s'] = $page[$section];
			}

			$pageHeaderCssLinks = array();
			$pageHeaderCss = $page['headerCss'];
			//dd($pageHeaderCss);
			foreach($globalCss as $key => $css){
				if(in_array($key,$pageHeaderCss)){
					$pageHeaderCssLinks[$key] = $css;
				}
			}

			//dd($pageHeaderCssLinks);

			$this->viewData['headerCssLinks'] = $pageHeaderCssLinks;

			$footerJsLinks = array();
			$footerJs = $page['footerJs'];
			//dd($pageHeaderCss);
			foreach($globalJs as $key => $js){
				if(in_array($key,$footerJs)){
					$footerJsLinks[$key] = $js;
				}
			}

			//dd($footerJsLinks);

			$this->viewData['footerJsLinks'] = $footerJsLinks;


			//dd($this->viewData);
			return view($page['layout'],$this->viewData);
		}else{
			dd('page not found');
		}
	}
}
