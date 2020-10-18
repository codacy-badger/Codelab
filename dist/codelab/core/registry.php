<?php

	$param = array(
		'table' => 'clRegistry',
		'columns' => array('id', 'name', 'value'),
		'order' => 'id',
		'sort' => 'asc'
	 );
	$results = sql::get($param);
	$clRegistryQuery = array();
	foreach ($results as $key => $value):
		$clRegistryQuery[$value['name']] = $value['value'];
	endforeach;
	DEFINE('clRegistry', $clRegistryQuery);
	unset($clRegistryQuery);


	class registry {
		// In ##################################################################
		public static function get($name, $default = null)
		{
			$return = @clRegistry[$name];
			if ($return == ''){
				return $default;
			} else {
				return $return;
			}
		}
	}

	?>
