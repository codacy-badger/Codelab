<?php
class lang {

    public static function text($text, $transform = null){
        $text = trim($text);

        if ($transform != null) {
            switch ($transform) {
                case 'u':
                    $text = mb_strtoupper($text);
                    break;
                case 'uw':
                    $text = ucwords($text);
                    break;
                case 'uf':
                    $text = ucfirst($text);
                    break;
                case 'l':
                    $text = mb_strtolower($text);
                    break;
                default:
                    break;
            }
        }
        return $text;
    }

    public static function extract($text){
        $languages = json_decode($text, true);
        if (isset($languages[app::lang()]) AND $languages[app::lang()] != ''):
            return @$languages[app::lang()];
        endif;
    }


}
