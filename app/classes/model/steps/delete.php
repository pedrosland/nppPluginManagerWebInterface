<?php

class Model_Steps_Delete extends ORM{
	
	public $step_type = 3;
	
	public $variable = null;
	
	protected $_table_name = 'steps_delete'; // Without this it looks for table steps_deletes!
	
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
			$this->delete = preg_replace('/[\\/\\\\]+/', '\\', $this->variable.'\\'.$this->delete);
		}
		
		parent::save($validation);
	}
}