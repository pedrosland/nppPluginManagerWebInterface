<?php

class Model_Plugins_Step extends ORM{

	protected $_sorting = array('order' => 'ASC');
	
	public static function valid_variable($model){
		$valid = array('$PLUGINDIR$', '$CONFIGDIR$', '$NPPDIR$');
		return in_array($model->variable, $valid, true);
	}
	
}