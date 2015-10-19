<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/11/2015
 * Time: 8:05 PM
 */
// application library 1
namespace App\Classlib1;

const MYCONST = 'App\Classlib1\MYCONST';

function MyFunction1() {
    return __FUNCTION__."\n".__NAMESPACE__.PHP_EOL;
}

class MyClass1 {
    static function WhoAmI1() {
        return __METHOD__;
    }
}

//echo MyFunction1();