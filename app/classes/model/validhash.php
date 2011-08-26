<?php

class Model_Validhash extends ORM{
	
	protected $_table_name = 'valid_hash';
	
	protected $_sorting = array(
		'file' => 'ASC'
	);
	
	public function rules(){
		return array(
			'file' => array(
				array('not_empty'),
				array('min_length', array(':value', 1)),
				array('max_length', array(':value', 255))
			),
			
			'hash' => array(
				array('min_length', array(':value', 32)),
				array('max_length', array(':value', 32)),
				array(array($this, 'unique'), array('hash', ':value')),
			),
		);
	}

}