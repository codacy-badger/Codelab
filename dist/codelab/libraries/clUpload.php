<?php
    class clUpload {

				public static function upload($inputFile, $dir = '', $clearFilename = false, $setFilename = false, $clearFolder = false){


					$filename = $inputFile["name"];
					$pathinfo = pathinfo($filename);

					if ($dir != ''):
						if (!file_exists($dir) OR !is_dir($dir)):
							folders::create($dir);
						endif;
					endif;

					if ($setFilename != false):
						$setFilename = str_replace("{ext}",$pathinfo['extension'],$setFilename);
						$filename = $setFilename;
					endif;

					if ($clearFilename == true):
						$filename = $pathinfo['filename'];
						$filename = str::alias($filename);
						$filename = $filename . '.' . strtolower($pathinfo['extension']);
					endif;


					if ($clearFolder == true):
						folders::empty(PATH . '/' . $dir);
					endif;


					$destination = PATH . '/' . $dir . $filename;

					if (move_uploaded_file($inputFile["tmp_name"], $destination)):
						return $filename;
				    else:
				        return false;
				    endif;
				}
        }
