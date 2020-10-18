<?php

	class clRandom {



// In ##################################################################
public static function string($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// In ##################################################################
public static function readable($length)
{
    $conso=array("b","c","d","f","g","h","j","k","l",
    "m","n","p","r","s","t","v","w","x","y","z");
    $vocal=array("a","e","i","o","u");
    $word="";
    srand ((double)microtime()*1000000);
    $max = $length/2;
    for($i=1; $i<=$max; $i++)
    {
        $word.=$conso[rand(0,19)];
        $word.=$vocal[rand(0,4)];
    }
    return $word;
}

}
