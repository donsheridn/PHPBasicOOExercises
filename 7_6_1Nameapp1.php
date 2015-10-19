<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/11/2015
 * Time: 8:05 PM
 */

//can access this through the web at http://localhost:8000/2ObjectOriented-Ans/7_6_1Nameapp1.php

header('Content-type: text/plain');

require_once('7_6_1Namelib1.php');


echo \App\Namelib1\MYCONST . "\n".PHP_EOL;

echo \App\Namelib1\MyFunction() . "\n".PHP_EOL;

echo \App\Namelib1\MyClass::WhoAmI() . "\n".PHP_EOL;