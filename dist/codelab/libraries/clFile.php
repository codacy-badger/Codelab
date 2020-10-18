<?php
	class clFile {


		// In ##################################################################
		public static function size($path)
		{
			if(!file_exists($path)) return false;
			if(is_file($path)) return filesize($path);
			return 0;
		}

		public static function del($path)
		{
			$fileToRemove = $path;
			if (file_exists($fileToRemove)) {
			   // yes the file does exist
			   if (@unlink($fileToRemove) === true) {
				  return true;
			   } else {
					return false;

			   }
			} else {
				return false;
			}
		}




	}


?>
