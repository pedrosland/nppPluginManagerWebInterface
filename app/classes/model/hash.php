<?php

class Model_Hash extends ORM{
	
	public static function insert($plugin, $step, $fileInfo){
		// Use the query builder because it will take care of repeats and escaping for us.
		$query = Db::insert('FileHash', array(
			'md5sum',
			'filename',
			'pluginName',
			'addedDate',
			'status'
		));
				
		foreach($fileInfo['hashes'] as $i => $hash){
			if($hash == ''){
				// Directory
				continue;
			}
			
			$query->values(array(
				$hash,
				$fileInfo['files'][$i],
				$plugin->name,
				date('Y-m-d H:i:s'),
				'ok'
			));
		}
		
		$query = $query->compile(Database::instance());
		
		// The query will start with "INSERT INTO". We need "INSERT IGNORE INTO"
		$query = 'INSERT IGNORE'.substr($query, 6);
		
		Db::query(Database::INSERT, $query)->execute();
	}
}
