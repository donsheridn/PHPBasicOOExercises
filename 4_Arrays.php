<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 5/13/2015
 * Time: 11:32 AM
 */

//Create an enumerated array with the old PHP array construct
$arrayAssoc3 = array("bar","foo");
//var_dump($arrayAssoc3);
print_r($arrayAssoc3);
echo PHP_EOL;

// as of PHP 5.4, you can create an enumerated array using the array short syntax [] instead of array()
$arrayAssoc4 = ["bar","foo"];
//var_dump($arrayAssoc4);
print_r($arrayAssoc4);
echo PHP_EOL;

//Create an associative array with the old PHP array construct
$arrayAssoc1 = array(
    "foo" => "bar",
    "bar" => "foo",
);
//var_dump($arrayAssoc1);
print_r($arrayAssoc1);
echo PHP_EOL;

// as of PHP 5.4, you can create an associative array using the array short syntax [] instead of array()
$arrayAssoc2 = [
    "foo" => "bar",
    "bar" => "foo",
];
//var_dump($arrayAssoc2);
print_r($arrayAssoc2);
echo PHP_EOL;

//Create a multi-dimensional array and display its contents
$array1 = array("bar",24,array(array("foo","manchu"),"boo" ) );

print_r($array1[0]); echo PHP_EOL;
print_r($array1[1]); echo PHP_EOL;
print_r($array1[2][1]); echo PHP_EOL;
print_r($array1[2][0][0]); echo PHP_EOL;
print_r($array1[2][0][1]); echo PHP_EOL;

echo PHP_EOL;

$array2 = ["bar",24,[ ["foo","manchu"],"boo"] ];

print_r($array2[0]); echo PHP_EOL;
print_r($array2[1]); echo PHP_EOL;
print_r($array2[2][1]); echo PHP_EOL;
print_r($array2[2][0][0]); echo PHP_EOL;
print_r($array2[2][0][1]); echo PHP_EOL;

print_r($array2);
unset($array2[2][0][1]); // This removes the element from the array
//print_r($array2[2][0][1]); echo PHP_EOL;
print_r($array2);

unset($array2[2][0]);    // This deletes the whole array
print_r($array2);