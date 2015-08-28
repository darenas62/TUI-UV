<?php namespace TUI_UV\Http\Controllers;

use TUI_UV\Http\Requests;
use TUI_UV\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
	public function about(){
		
		//$people=[];
		$people =[
			'Taylor Otwell', 'Dayle Rees', 'Eric Barnes'
			];		
		
		return view('pages.about',compact('people'));

	}

	public function contact(){
			
		return view('pages.contact');
	}	

}
