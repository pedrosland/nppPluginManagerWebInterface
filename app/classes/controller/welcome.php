<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {
	
	public function action_index()
	{
		$this->body = new View('welcome/index');		
	}

} // End Welcome
