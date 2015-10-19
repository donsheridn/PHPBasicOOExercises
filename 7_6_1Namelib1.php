<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/11/2015
 * Time: 8:05 PM
 */

//you acces this through the web at http://localhost:8000/2ObjectOriented-Ans/7_6_1Namelib1.php

// application library 1
namespace App\Namelib1;

//const MYCONST = 'App\Namelib1\MYCONST';
const MYCONST = "This is MYCONST value of namespace App\Namelib1 \n";

function MyFunction() {
    return __FUNCTION__."\n".__NAMESPACE__.PHP_EOL;
}

class MyClass {
    static function WhoAmI() {
        return __METHOD__;
    }
}


echo "<pre>";
echo \App\Namelib1\MYCONST.PHP_EOL;

echo \App\Namelib1\myFunction().PHP_EOL;

echo \App\Namelib1\MyClass::whoAmI().PHP_EOL;
echo "</pre>";