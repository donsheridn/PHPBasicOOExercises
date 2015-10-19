<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/4/2015
 * Time: 12:57 PM
 */
class Foo
{
    public static $my_static = 'foo';   //public makes it accessible outside the class
                                        //static means you have to use ::
    public function staticValue() {     //public non-static means you can use -> to access
        return self::$my_static;        //the function
    }
}

class Bar extends Foo
{
    public function fooStatic() {       //adds a public non-static function to the extended class
        return parent::$my_static;      //this uses the parent keyword to access the public static
    }                                   //property of base class.
}


print Foo::$my_static . "\n". "\n";           //print out the public static property of the base class

$foo = new Foo();
print $foo->staticValue() . "\n".PHP_EOL;
//print $foo->my_static . "\n";      //Throws error as you cant access public static properties using ->
                                   //print out the public static property using the child class

print $foo::$my_static . "\n". "\n";     //this lets you access the public static property

$classname = 'Foo';
print $classname::$my_static . "\n".PHP_EOL; // As of PHP 5.3.0 it's possible to reference the class using a variable.

print Bar::$my_static . "\n". "\n";      //This directly calls classname to access the public static property

$bar = new Bar();
print $bar->fooStatic() . "\n".PHP_EOL;    //Whereas this use a variable to access the public method.

//Example2
class Woo {
    public static function aStaticMethod() {
      print "Inside the public static method"."\n".PHP_EOL;
                                              //public static function meaning you have to use
                                              //:: to access it either inside or outside the class
    }
}

Woo::aStaticMethod();
$classname = 'Woo';
$classname::aStaticMethod(); // As of PHP 5.3.0

//Example3
function test()
{
    static $count = 0;        //here a static variable is used to remember the count between
                              //function calls. Static variables are initialized only in the
                              //first call of function
    $count++;
    echo $count;
    if ($count < 10) {
        test();               //Recursively call the function your in test() while $count < 10
    }                         //it will call it recursively 9 times, when it reaches 10
                              //there will be no more recursive calls and then it will begin
    $count--;                 //finishing off every unfinished rec call decreasing the count everytime
    echo $count;
}

test();