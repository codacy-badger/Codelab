<?php


	class clGuard {


		public static function root()
	    {
	        if (!auth::check() OR !user::root()):

				die(USER['root']);
	        endif;
	    }


		public static function  suspicionCreate() {

        }
		public static function  suspicionsCheck() {
            return false;
        }


		public static function  ipBanCheck($ip) {
            $param = array(
                'table' => 'guardBanIp',
                'columns' => sql::columns('guardBanIp'),
                'where' => 'ip = "' . sql::str($ip) . '"',
                'limit' => 1
            );
            if (count(sql::get($param)) == 0):
                return false;
            else:
                return true;
            endif;
        }

		public static function  injectionCheck() {
            return false;
        }







        public static function live($checkOnly = false) {
            $guardErrors = array();

            if (guard::ipBanCheck(user::ip())):
                array_push($guardErrors, 'ip ban');
            endif;


            if (!empty($guardErrors)):
				$errors = $guardErrors;
                include(PATH . '/app/pages/guard.php');
				unset($errors);
                die();
            endif;
            return true;
        }




	}

	?>
