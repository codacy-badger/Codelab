<?php

    $clRuntime_global = array();
    $clRuntime_system = array();


	class runtime {
        // In ##################################################################
		public static function global($name, $value)
		{
            GLOBAL $clRuntime_global;
            $clRuntime_global[$name] = $value;
		}

        // In ##################################################################
		public static function log($text, $isSub = false)
		{
            GLOBAL $clRuntime_system;
            $clRuntime_system[$text] = $isSub;
		}

        // In ##################################################################
		public static function error($text, $isCritical = false)
		{
            $output = '<div class="clRuntime clRuntime-error">' . $text . '</div>';
			if ($isCritical == true):
                die();
            endif;
		}
	}

	?>
