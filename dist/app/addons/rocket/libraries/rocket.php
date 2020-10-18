<?php
	class rocket {


		// ROW ##################################################################
		public static function config($configName = null)
		{

			$output = array();
			$cssFile = file_get_contents(rocketDir . '/rocket.css');
			foreach(preg_split("/((\r?\n)|(\r\n?))/", $cssFile) as $line){
				$line = trim($line);
				if (substr($line,0,2) == '--'):
					$linePart = explode(':', $line);
					$name = $linePart[0];
					$name = str_replace("--","",$name);
					$value = $linePart[1];
					$value = str_replace(";","",$value);
					$output[$name] = $value;
				endif;

			}
			if ($configName == null):
				return $output;
			else:
				return $output[$configName];
			endif;
		}




		// ROW ##################################################################
		public static function start()
		{
            app::asset(
                array(
                    '/app/addons/rocket/dist/rocket.css',
                    '/app/addons/rocket/dist/rocket.js',
                )
            );
		}

        public static function style($style) // String or array
        {
            if (!is_array($style)):
				$stylePathMinified = rocketDir . '/styles/minified/rocket.' . $style . '.min.css';
				if (file_exists($stylePathMinified) AND is_file($stylePathMinified)):
				    app::asset('/app/addons/rocket/dist/styles/minified/rocket.' . $style . '.min.css',);
				else:
					app::asset('/app/addons/rocket/dist/styles/rocket.' . $style . '.css',);
				endif;

            else:
                foreach ($style as $key => $value):
					$stylePathMinified = rocketDir . '/styles/minified/rocket.' . $value . '.min.css';
					if (file_exists($stylePathMinified) AND is_file($stylePathMinified)):
					    app::asset('/app/addons/rocket/dist/styles/minified/rocket.' . $value . '.min.css',);
					else:
						app::asset('/app/addons/rocket/dist/styles/rocket.' . $value . '.css',);
					endif;
                endforeach;
            endif;
        }

		public static function script($script) // String or array
        {
            if (!is_array($script)):
				$stylePathMinified = rocketDir . '/scripts/minified/rocket.' . $script . '.min.js';
				if (file_exists($stylePathMinified) AND is_file($stylePathMinified)):
				    app::asset('/app/addons/rocket/dist/scripts/minified/rocket.' . $script . '.min.js',);
				else:
					app::asset('/app/addons/rocket/dist/scripts/rocket.' . $script . '.js',);
				endif;

            else:
                foreach ($script as $key => $value):
					$stylePathMinified = rocketDir . '/scripts/minified/rocket.' . $value . '.min.js';
					if (file_exists($stylePathMinified) AND is_file($stylePathMinified)):
					    app::asset('/app/addons/rocket/dist/scripts/minified/rocket.' . $value . '.min.js',);
					else:
						app::asset('/app/addons/rocket/dist/scripts/rocket.' . $value . '.js',);
					endif;
                endforeach;
            endif;
        }

		public static function regenerate($minify = false)
        {



			$dirs = array_filter(glob(rocketDir . '/styles/*.css'), 'is_file');
			foreach ($dirs as $key => $value):
					$fileOutput = '';
					if (substr($value, -7) != 'min.css'):
						// Gee file content
						$cssFile = file_get_contents($value);
						// Search for breakpoints
						foreach(preg_split("/((\r?\n)|(\r\n?))/", $cssFile) as $line){
							//if ($line != ''):
								if (strpos($line, '@breakpoint[L]') !== false):
									$fileOutput .= '@media (max-width: ' . rocket::config('breakpointL') . ') { /* @breakpoint[L] */' . PHP_EOL;
								elseif (strpos($line, '@breakpoint[M]') !== false):
									$fileOutput .= '@media (max-width: ' . rocket::config('breakpointM') . ') { /* @breakpoint[M] */' . PHP_EOL;
								elseif (strpos($line, '@breakpoint[S]') !== false):
									$fileOutput .= '@media (max-width: ' . rocket::config('breakpointS') . ') { /* @breakpoint[S] */' . PHP_EOL;
								elseif(strpos($line, '@breakpoint[XS]') !== false):
									$fileOutput .= '@media (max-width: ' . rocket::config('breakpointXS') . ') { /* @breakpoint[XS] */' . PHP_EOL;
								else:
									$fileOutput .= $line . PHP_EOL;
								endif;

							//endif;
						}
						file_put_contents($value, $fileOutput);
						if ($minify == true):

							$minifiedFilePath = pathinfo($value);
							$minifiedFilePath = $minifiedFilePath['dirname'] . '/minified/'. $minifiedFilePath['filename'] . '.min.css';


							// # Minify file
							$minifiedOutput = $fileOutput;
							// Remove comments
							$pattern = '!/\*[^*]*\*+([^/][^*]*\*+)*/!';
							$minifiedOutput = preg_replace($pattern, '', $minifiedOutput);

							// Remove new lines
							$minifiedOutput = trim(preg_replace('/\s\s+/', ' ', $minifiedOutput));
							// ### Remove spaces
							// Double  Sapces
							$minifiedOutput = str_replace("  ","",$minifiedOutput);
							// Between values
							$minifiedOutput = str_replace("} ","}",$minifiedOutput);
							$minifiedOutput = str_replace(" {","{",$minifiedOutput);
							$minifiedOutput = str_replace("{ ","{",$minifiedOutput);
							$minifiedOutput = str_replace(" (","(",$minifiedOutput);
							$minifiedOutput = str_replace("; ",";",$minifiedOutput);
							$minifiedOutput = str_replace(": ",":",$minifiedOutput);
							file_put_contents($minifiedFilePath, $minifiedOutput);
						endif;
					endif;
				endforeach;
        }
	}
?>
