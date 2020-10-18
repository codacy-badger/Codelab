<?php

session_start();

if (!isset($_SESSION[clConfig['session']['name']])):
    $_SESSION[clConfig['session']['name']] = array();
endif;


    if (@clConfig['session']['path'] != false):
        $path = clPath . clConfig['session']['path'];
        if (!file_exists($path) OR !is_dir($path)):
            if (!@mkdir($path, 0700)) {
                $error = error_get_last();
                die($error['message']);
            }
        endif;
        session_save_path($path);
        unset($path);
    endif;
    // Start session
    if (session_status() == PHP_SESSION_NONE):
        session_start();
    endif;


class session {

    public static function return(){
        return @$_SESSION[clConfig['session']['name']];
    }

    public static function set($name, $value = null){
        $_SESSION[clConfig['session']['name']][$name] = $value;
    }
    public static function get($name = null){
        if ($name == null):
            return $_SESSION[clConfig['session']['name']];
        else:
            return $_SESSION[clConfig['session']['name']][$name];
        endif;
    }
    public static function delete($name){
        unset($_SESSION[clConfig['session']['name']][$name]);
    }
    public static function destroy(){
        unset($_SESSION[clConfig['session']['name']]);
    }
}
