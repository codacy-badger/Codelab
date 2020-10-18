<?php
	class clFolder {

		// In ##################################################################
		public static function list($path, $type = null, $ordering = 0)
		{
			$return = scandir($path,$ordering);
				foreach ($return as $key => $value):
					if ($value == '.' OR $value == '..'):
						unset($return[$key]);
					endif;

					if ($type == 'folder' OR $type == 'folders'):
						if (!is_dir(rtrim($path,"/") . "/" . $value)):
							unset($return[$key]);
						endif;
					endif;
					if ($type == 'file' OR $type == 'files'):

						if (!is_file(trim($path,"/") . "/" . $value)):
							unset($return[$key]);
						endif;
					endif;

				endforeach;

			return $return;
		}



		// In ##################################################################
		public static function empty($path)
		{
			$files = glob($path . '*'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file))
			    unlink($file); // delete file
			}
			return true;
		}

		// In ##################################################################
		public static function size($path)
		{
			$bytestotal = 0;
			$path = realpath($path);
			if($path!==false && $path!='' && file_exists($path)){
				foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
					$bytestotal += $object->getSize();
				}
			}
			return $bytestotal;
		}
		// In ##################################################################
		public static function count($path, $type = null)
		{
			// TODO: TYPE!!!
			$total = 0;
			$path = realpath($path);
			if($path!==false && $path!='' && file_exists($path)){
				foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
					$total++;
				}
			}
			return $total;
		}







		public static function del($path)
		{
			if (!file_exists($path)) return true;
			if (!is_dir($path) || is_link($path)) return unlink($path);
				foreach (scandir($path) as $item) {
					if ($item == '.' || $item == '..') continue;
					if (!folders::del($path . "/" . $item)) {
						chmod($path . "/" . $item, 0777);
						if (!folders::del($path . "/" . $item)) return false;
					};
				}
				return rmdir($path);
		}

		public static function create($path, $mode = 0755)
		{
			if (!file_exists($path)) {
				mkdir($path, $mode, true);
				return true;
			} else {
				return false;
			}
		}
	}

?>
