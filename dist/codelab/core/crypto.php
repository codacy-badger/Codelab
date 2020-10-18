<?php

	class crypto {
		// In ##################################################################
		public static function in($string)
		{
			$output = false;
			$key = hash('sha256', clConfig['crypto']['key']);
			$iv = substr(hash('sha256', clConfig['crypto']['iv']), 0, 16);
			$output = openssl_encrypt($string, clConfig['crypto']['method'], clConfig['crypto']['key'], 0, $iv);
			$output = base64_encode($output);
			$output = urlencode($output);
			return $output;
		}

		// Out ##################################################################
		public static function out($hash)
		{
			$output = false;
			$key = hash('sha256', clConfig['crypto']['key']);
			$iv = substr(hash('sha256', clConfig['crypto']['iv']), 0, 16);
			$hash = urldecode($hash);
			$output = openssl_decrypt(base64_decode($hash), clConfig['crypto']['method'], clConfig['crypto']['key'], 0, $iv);
			return $output;
		}
	}

	// Crypto methods
	//
