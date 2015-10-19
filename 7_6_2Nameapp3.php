<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/11/2015
 * Time: 9:09 PM
 */
use App\Namelib1 as L;            //use alias L for Namelib1
use App\Namelib2\MyClass as Obj;  //use alias Obj for the MyClass class of
                                  // Namelib2

header('Content-type: text/plain');
require_once('7_6_1Namelib1.php');
require_once('7_6_2Namelib2.php');

echo L\MYCONST . "\n";            //you can now directly access either Namelib1
echo L\MyFunction() . "\n";       //or Namelib2 has both have been imported
echo L\MyClass::WhoAmI() . "\n";  //however you need to differentiate one from the
echo Obj::WhoAmI() . "\n";        //other using aliases. These are known as
                                  //qualified names