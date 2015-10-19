<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/12/2015
 * Time: 11:41 AM
 */
//use __NAMESPACE__ to dynamically generate a fully-qualified class name
namespace App\Namelib1;

header('Content-type: text/plain');

class MyClass {
    public function WhoAmI() {
        return __METHOD__;
    }
}

$c = __NAMESPACE__ . '\\MyClass';    //dont forget here \\ escapes to \ giving it App\Namelib1\MyClass

//echo $c.PHP_EOL;
//var_dump($c);

$m = new $c;               //here we use the generated fully-qualified class name
                           //to create a new object of the class
echo $m->WhoAmI().PHP_EOL; // outputs: App\Lib1\MyClass::WhoAmI


$m = new namespace\MyClass;  //use the namespace keyword to access the the class

echo $m->WhoAmI().PHP_EOL; // outputs: App\Lib1\MyClass::WhoAmI