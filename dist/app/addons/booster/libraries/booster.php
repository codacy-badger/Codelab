<?php


	class booster {

		// ROW ##################################################################
		public static function get()
		{

			$boosterParam = array(
			    'table' => 'booster',
			    'columns' => '*',
			);
			// Get booster settings
			$booster = sql::get($boosterParam, false);
			foreach ($booster as $key => $value):
				$booster[$value['settingName']] = $value['settingValue'];
				unset($booster[$key]);
			endforeach;
			return $booster;
		}

	}
?>
