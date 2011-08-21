<?php

class Model_Steps_Copy extends ORM{
	
	public $step_type = 1;
	
	public $variable = null;
	
	public function rules(){
		return array(
			'id' => array( //since variable only half exists, we use id
				array('Model_Plugins_Step::valid_variable', array($this)),
			)
		);
	}
	
	protected $_ignored_columns = array('variable');
	
	public function save(Validation $validation = NULL){
		if($this->variable != null){
			$this->to = preg_replace('/[\\/\\\\]+/', '\\', $this->variable.'\\'.$this->to);
		}
		
		parent::save($validation);
	}
}