<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'username' => array(
		'unique' => 'This username is already in use. Please choose another.',
	),
	'email' => array(
		'email' => ':field must be a valid email address',
		'unique' => 'This email address is already in use. Please choose another.',
	),

	'not_exists' => ':field already exists',
	'unique' => ':field is already in use. Please choose antoher.',
	'alpha' => ':field must contain only letters',
	'alpha_dash' => ':field must contain only numbers, letters and dashes',
	'alpha_numeric' => ':field must contain only letters and numbers',
	'email_domain' => ':field must contain a valid email domain',
	'equals' => ':field must equal :param2',
	'exact_length' => ':field must be exactly :param2 characters long',
	'in_array' => ':field must be one of the available options',
	'matches' => ':field must be the same as :param3',
	'min_length' => ':field must be at least :param2 characters long',
	'max_length' => ':field must not exceed :param2 characters long',
	'not_empty' => ':field must not be empty',
	'numeric' => ':field must be numeric',
	'regex' => ':field does not match the required format',
	'url' => ':field must be a url',
);