<?php
	class fontawesome {

		// ROW ##################################################################
		public static function start()
		{
            app::asset(
                array(
                    '/app/addons/fontawesome-pro/css/fontawesome.basic.min.css',
                    '/app/addons/fontawesome-pro/css/light.min.css',
                )
            );

		}




		// ROW ##################################################################
		public static function icons($icons)
		{
			foreach ($icons as $key => $value):
				$path = '/app/addons/fontawesome-pro/css/icons/' . $value . '.css';
				$filename = clPath . $path;
			    if (!file_exists($filename) OR !is_file($filename)):

					$getFontAwesomeCore = file_get_contents(clPath . '/app/addons/fontawesome-pro/css/fontawesome.css');

					$results = '';
					$resultsCatch = false;

					foreach(preg_split("/((\r?\n)|(\r\n?))/", $getFontAwesomeCore) as $faCoreLine){
						$faCoreLine = trim($faCoreLine);
						$faCoreLine = str_replace(" ","",$faCoreLine);
						$faCoreLine = str_replace(" ","",$faCoreLine);
						$valueCheck = '.' . $value . '{';
						$valueCheckBefore = '.' . $value . ':before{';
						//echo $faCoreLine . ' = ' . $valueCheck . '<br />';
						if ($resultsCatch == true):
							$results .= $faCoreLine;
							if (strpos($faCoreLine, '}') !== false):
							    $resultsCatch = false;
							endif;
						endif;
						if ($faCoreLine == $valueCheck OR $faCoreLine == $valueCheckBefore):
							$resultsCatch = true;
							$results .= $faCoreLine;
						endif;
					}




					$content = $results;
					$fp = fopen($filename,"wb");
					fwrite($fp,$content);
					fclose($fp);
				endif;
				app::asset($path);

			endforeach;

		}

	}
?>
