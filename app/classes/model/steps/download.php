<?php

class Model_Steps_Download extends ORM{
	
	public $step_type = 0;
	
	public function filters(){
		return array(
			'url' => array(
				array('Model_Plugin::makeHttp'),
			),
			TRUE => array(
				array('trim'),
			),
		);
	}
}