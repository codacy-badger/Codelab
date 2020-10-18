<?php
	class clValid {


		// In ##################################################################
		public static function password($string, $param = null)
		{
			// Validate password strength
			$uppercase = preg_match('@[A-Z]@', $string);
			$lowercase = preg_match('@[a-z]@', $string);
			$number    = preg_match('@[0-9]@', $string);
			if(!$uppercase || !$lowercase || !$number || strlen($string) < 6) {
			    return false;
			}else{
			    return true;
			}
		}


		// In ##################################################################
		public static function email($string, $domains = null)
		{
			if (filter_var($string, FILTER_VALIDATE_EMAIL))
			{
				return true;
			} else
			{
				return false;
			}
		}

		// In ##################################################################
		public static function md5hash($string)
		{
			if (preg_match('/^[a-f0-9]{32}$/', $md5) == true)
			{
				return true;
			} else
			{
				return false;
			}
		}

		// In ##################################################################
		public static function ip($string)
		{
			if (filter_var($ip, FILTER_VALIDATE_IP))
			{
				return true;
			} else
			{
				return false;
			}
		}

		// In ##################################################################
		public static function url($string, $liveCheck = false)
		{
			$validation = filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);

			if ( $validation ) $output = true;
			else $output = false;

			return $output;
		}

		// In ##################################################################
		public static function domain($string)
		{
			if(filter_var(gethostbyname($url), FILTER_VALIDATE_IP))
			{
				return true;
			} else {
				return false;
			}
		}


		// In ##################################################################
		public static function pesel($string)
		{
			$a = substr($pesel, 0, 1);
			$b = substr($pesel, 1, 1);
			$c = substr($pesel, 2, 1);
			$d = substr($pesel, 3, 1);
			$e = substr($pesel, 4, 1);
			$f = substr($pesel, 5, 1);
			$g = substr($pesel, 6, 1);
			$h = substr($pesel, 7, 1);
			$i = substr($pesel, 8, 1);
			$j = substr($pesel, 9, 1);
			$checksum = substr($pesel, 10, 1);

			$result = $a + 3*$b + 7*$c + 9*$d + $e + 3*$f + 7*$g + 9*$h + $i + 3*$j;

			$check = 10 - substr($result, -1, 1);

			if (substr($result, -1, 1) == 0)
				$check = 0;

			if ($check == $checksum)
				return true;
			else
				return false;
		}



				function lower($string)
				{
					return $string === strtolower($string);
				}

				function upper($string)
				{
					return $string === strtoupper($string);
				}

				// Returns true if the given string is a palindrome, false otherwise.
				// PL: Czy wyraz jest palindromem (tak samo brzmi czytany od końca)
				function palindrome($string)
				{
					return strrev($string) === (string) $string;
				}

	}

	?>
