<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/11/2015
 * Time: 8:24 PM
 */
// application library 2
namespace App\Namelib2;

const MYCONST = 'App\Namelib2\MYCONST';

function MyFunction() {
    return __FUNCTION__;      //used here, this returns App\Namelib2\MyFunction
}                             //this is because functions exist in the global namepace
                              //whereas methods are part of class / object.

class MyClass {
    static function WhoAmI() {
        return __METHOD__ . " " . __FUNCTION__;
//        return __FUNCTION__; //when used here, this returns the function name
    }                          //WhoAmI without the file path
}

//echo "this returns the function name from 7_6_2Namelib2.php which is ";
//echo MyFunction().PHP_EOL;

//echo "this returns the method name, then the function name, of the MyClass object in 7_6_2Namelib2.php which is ";
//$MyClassObj = new MyClass();
//echo $MyClassObj->WhoAmI()."\n";