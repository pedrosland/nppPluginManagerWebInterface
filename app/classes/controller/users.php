<?php

class Controller_Users extends Controller{
	
	public function action_login(){
		// If user already logged in then redirect them
		if($this->logged_in === true){
			$this->request->redirect('plugins');
		}
		
		$this->body = new View('users/login');
		
		if($this->request->method() == Request::POST){
			// Log user in
			if($this->auth->login($this->request->post('username'), $this->request->post('password')) === true){
				$this->request->redirect('plugins');
			}else{
				$this->body->error = 'Your username and password do not match.';
			}
		}
	}
	
	// TO STOP REGISTRATION, COMMENT FROM HERE...
	public function action_register(){
		$this->body = new View('users/register');
		$this->body->errors = array();
		
		if($this->request->method() === Request::POST){
			$login_role = ORM::factory('role',array('name' => 'login'));
			
			$user = new Model_User();
			
			try{
				$user->create_user($this->request->post(), array('username', 'password', 'email'));
				$user->add('roles', $login_role);
				$user->save();
				
				Session::instance()->write();
				
				$this->request->redirect('plugins');
			}catch(ORM_Validation_Exception $e){
				$this->body->errors = Arr::flatten($e->errors('model'));
			}
		}
	}
	// TO HERE!
	
	public function action_edit(){
		if($this->logged_in !== true){
			$this->request->redirect('users/login');
		}
		
		$this->body = new View('users/edit');
		$this->body->errors = array();
		
		if($this->request->method() === Request::POST){
			$user = $this->auth->get_user();
			
			try{
				$user->update_user($this->request->post(), array('email', 'password'));
				
				$this->body->success = 'Your information has been updated.';
			}catch(ORM_Validation_Exception $e){
				$this->body->errors = Arr::flatten($e->errors('model'));
			}
		}
	}
	
	public function action_logout(){
		// Log the user out
		$this->auth->logout();
		$this->request->redirect('users/login');
	}
}
