<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/11/2015
 * Time: 8:35 PM
 */
//namespace App\Namelib2;    //When you join a namespace you no longer have to preface
                             //constants, methods, and functions with Namelib2.

use App\Namelib2;                //you can use constants, methods, and functions
                                 //from App\Namelib2 but you have to preface them with
                                 //Namelib2

require_once('7_6_1Namelib1.php');   //if you comment these out you get no output
require_once('7_6_2Namelib2.php');   //as even though your part of the same namespace
                                //you still need to import the files to use their
                                //classes with the namespace names and
                                //you need to code your __autoload functions to resolve
                                //the namespace names to their file paths

header('Content-type: text/plain');
//echo MYCONST . "\n";                 //these statements will output the Namelib2
//echo MyFunction() . "\n";            //values because this file is in the same
//echo MyClass::WhoAmI() . "\n";       //namespace

echo Namelib2\MYCONST . "\n";          //even though we import Namelib2 we still
echo Namelib2\MyFunction() . "\n";     //have to preface these because at this
echo Namelib2\MyClass::WhoAmI() . "\n";//point this file doesn't have a namespace
//                                       //and so is in the global namespace.

//echo MYCONST . "\n";            //when you join the file back to the namespace
//echo MyFunction() . "\n";       //these will print out from Namelib2
//echo MyClass::WhoAmI() . "\n";