<?php

class Controller_Users extends Controller{
	
	public function action_login(){
		// If user already logged in then redirect them
		if($this->logged_in === true){
			$this->request->redirect('plugins');
		}
		
		$this->body = new View('users/login');
		$this->body->from = $this->request->query('from');
		
		if($this->request->method() == Request::POST){
			// Log user in
			if($this->auth->login($this->request->post('username'), $this->request->post('password')) === true){
				
				if ($this->request->post('from') != ''){
					$this->request->redirect('../' . $this->request->post('from'));
				} else {
					$this->request->redirect('plugins');
				}
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
			//$login_role = ORM::factory('role',array('name' => 'login'));
			
			$user = new Model_User();
			
			//try{
				$user->create_user($this->request->post(), array('username', 'password', 'email'));
				
				$user->authorisation_token = $this->generate_auth_token();
				
				$user->save();
				
				$this->email_user($user->email, $user->username, $user->authorisation_token);
				
				// Disabled for authorisation
				//$user->add('roles', $login_role);
				
				
				
				Session::instance()->write();
				
				$this->body = new View('users/registered');
				
				$this->request->redirect('plugins');
			// }catch(ORM_Validation_Exception $e){
				// $this->body->errors = Arr::flatten($e->errors('model'));
			// }
		}
	}
	
	public function action_verify() {
		$user = ORM::factory('user')
				->where('username', '=', $this->request->query('user'))
				->find();
			

		if ($user->loaded()){
			$user->authorisation_token == $this->request->query('auth');
			$user->verified = true;
			$user->save();
			$this->email_admin($user->username, $user->email);
			$this->body = new View("users/verified");
		}
		else {
			$this->body = new View("users/unverified");
		}
		
	}
	
	private function email_user($email, $username, $authtoken){
		$emailconfig = Kohana::$config->load('email.default');
		$from = $emailconfig['from'];
		$replyto = $emailconfig['replyto'];
		
		$subject = "Account confirmation at Notepad++ Plugins";
		$message = "Hi, 
Thank you for registering your account with the Plugins administration tool.  Now you just need 
to click the link below (or copy and paste it into your browser) in order to verify your email address.
Your account will then be subject to approval (only people who author plugins or are actively involved
in the Notepad++ community are eligible for accounts).  

If you have a new plugin or update, make sure it's announced on the Plugin Development forum in the 
Notepad++ project on sourceforge first.  This goes for any future changes you make too - changes won't be
uploaded until a few days after the announcement on the forum.  

If this request didn't come from you, please reply to this email giving as many details as possible (for instance 
the email headers).

Here's the link:
http://www.brotherstone.co.uk/npp/pm/admin/users/verify?user=$username&auth=$authtoken

Many thanks,

Notepad++ Plugins Admin System.
";
		mail($email, $subject, $message, "From: Notepad++ Plugin Admin <$from>\r\nReply-To: $replyto");

	}
	
	
	private function email_admin($username, $email){
		$emailconfig = Kohana::$config->load('email.default');
		$from = $emailconfig['from'];
		$replyto = $emailconfig['replyto'];
		
		$subject = "New Account for N++ Plugins";
		$to = "davegb@pobox.com";
		$message = "Hi, 
		The account $username with email $email has registered for use with the N++ plugins admin system.  Please authorise this login.
		
http://www.brotherstone.co.uk/npp/pm/admin/users/authorise

Many thanks,
The Admin System.
";
		mail($email, $subject, $message, "From: Notepad++ Plugin Admin <$from>\r\nReply-To: $replyto");

	}
	
	
	private function generate_auth_token() {
		return substr(base64_encode(hash('sha512', 'Some Magic Piece of text ' . date('Ymd Hisu - l') . rand(1, 32767))), 0, 20);
	}
	
	
	// TO HERE!
	
	
	public function action_authorise(){
		if($this->admin !== true){
			$this->request->redirect('users/login?from=users/authorise');
		}
		
		
		$this->body = new View('users/authorise');
		
		if($this->request->param('id')){
			$user = ORM::factory('user')->where('username', '=', $this->request->param('id'))->find();
			if ($user->loaded()){
				
				$login_role = ORM::factory('role',array('name' => 'login'));
				try {
				
				$user->add('roles', $login_role);
				}
				catch(Exception $e)
				{
				}
				# Is this necessary? Do we need to save after doing an "add"?
				$user->save();
				
				$this->body = new View('users/authorised');
				$this->body->authuser = $user;
				$this->email_user_active($user->email, $user->username);
			}
			
		} else {
			$qry_login = DB::select('*')->from('roles_users')
						->where('roles_users.user_id', '=', DB::expr('user.id'))
						->where('roles_users.role_id', '=', '1');
						
			$qry = ORM::factory('user')
						->select('*')
						->where('verified', '=', '1')
						->where(NULL, 'not exists', $qry_login)
						->find_all();
			
			$this->body->users = $qry;
		}
		
		
	}
	
	private function email_user_active($email, $username){
		$emailconfig = Kohana::$config->load('email.default');
		$from = $emailconfig['from'];
		$replyto = $emailconfig['replyto'];
		
		$subject = "Account activated at Notepad++ Plugins";
		$message = "Hi, 
Your account ($username) has now been activated in the Notepad++ Plugin Admin system.  You can now login and maintain your plugins.

Here's the link:
http://www.brotherstone.co.uk/npp/pm/admin/plugins

Many thanks,

Notepad++ Plugins Admin System.
";
		mail($email, $subject, $message, "From: Notepad++ Plugin Admin <$from>\r\nReply-To: $replyto");

	}
		
	
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
