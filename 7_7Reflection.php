<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/7/2015
 * Time: 12:05 PM
 */

//use reflection classes to populate the properties dynamically and then print them

class MyClass{

    public $one = '';
    public $two = '';

    public function __contruct(){

    }

    public function echoone(){

        echo $this->one.PHP_EOL;
    }

    Public function echotwo(){

        echo $this->two.PHP_EOL;
    }

}

$obj1 = new MyClass();   //here I instantiate an instance of MyClass class, so I can now use the
//Reflection properties discovered above to manipulate the instances properties
//I know it has 2 properties.

$reflector = new ReflectionClass('MyClass');   //this reports information about the MyClass class
//so you can now use the methods of the ReflectionClass
//$reflector = new ReflectionClass($obj1);

$classproperties = $reflector->getProperties(); //this gets any properties in MyClass,
//MyClass has 2 properties $one and $two.

print_r($classproperties);                      //this displays the array of properties found in MyClass
echo PHP_EOL;



$i =1;
foreach($classproperties as $property){

    echo $property->getName()." is this before being set: ".$obj1->{$property->getName()}.PHP_EOL;

    $obj1->{$property->getName()}=$i;
    //Invoking the method to print what was populated
//    $obj1->{"echo".ucfirst($index->getName())}()."\n";

    echo $property->getName()." is this after being set: ".$obj1->{$property->getName()}.PHP_EOL;
    $i++;
}

//$obj1->echoone();
//$obj1->echotwo();

//print_r($classproperties);
//echo PHP_EOL;
