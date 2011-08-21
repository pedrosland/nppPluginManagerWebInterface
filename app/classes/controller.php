<?php

class Controller extends Kohana_Controller{
	
	/*
	 * Text or View to be included inside the base template
	 * @type String, View
	 */
	protected $body;
	
	/*
	 * Render base and body
	 * @type Boolean
	 */
	protected $render = true;
	
	/*
	 * @type Boolean
	 */
	protected $logged_in;
	
	/*
	 * Is this an admin user?
	 * @type Boolean
	 */
	protected $admin;

	/*
	 * @type Auth
	 */
	protected $auth;

	/*
	 * @type Model_User
	 */
	protected $user;
	
	public function before(){
		$this->auth = Auth::instance();
		
		$this->logged_in = $this->auth->logged_in('login');
		
		$this->admin = $this->auth->logged_in('admin');
		
		$this->user = $this->auth->get_user();
		
		View::bind_global('logged_in', $this->logged_in);
		
		View::bind_global('admin', $this->admin);
		
		View::bind_global('user', $this->user);
	}
	
	public function after(){
		if($this->render === true){
			$base = new View('base');
			$base->body = $this->body;
			
			$this->response->body($base->render());
		}
	}
	
}
