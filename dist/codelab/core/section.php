<?php
class section {

    public static function get($variable = null){
        GLOBAL $clSection;
        if ($variable == null):
            return $clSection;
        else:
            return $clSection[$variable];
        endif;

    }
    public static function create($additionalClass = null){

        GLOBAL $clSection;
        $id = 'clSection_' . $clSection['id'];
        $class = 'clSection ' . $clSection['class'] . ' ' . $clSection['additionalClass']  .  ' ' . $additionalClass;
        $class = trim($class);
        $output = 'id="' . $id . '" class="' . $class . '"';
        echo $output;
    }
}
