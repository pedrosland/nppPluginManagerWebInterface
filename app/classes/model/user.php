<?php

class Model_User extends Model_Auth_User{
	
	/**
	 * Labels for fields in this model
	 *
	 * @return array Labels
	 */
	public function labels()
	{
		return array(
			'username'         => 'Your username',
			'email'            => 'Your email address',
			'password'         => 'Your password',
		);
	}
	
	/**
	 * Password validation for plain passwords.
	 *
	 * @param array $values
	 * @return Validation
	 */
	public static function get_password_validation($values)
	{
		return parent::get_password_validation($values)
			->label('password_confirm', 'Your confirm password');
	}
}
