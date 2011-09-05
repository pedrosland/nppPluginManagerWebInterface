<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller {
	public function before()
	{
		parent::before();	
	}
	
	public function action_index()
	{
		# $this->request->response = 'hello, world!';
		$this->body = new View('welcome/index');		
	}

} // End Welcome
