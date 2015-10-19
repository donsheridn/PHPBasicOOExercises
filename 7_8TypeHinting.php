<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/7/2015
 * Time: 2:02 PM
 */
// An example class
class MyClass
{
    /**
     * A test function
     *
     * First parameter must be an object of type OtherClass
     */
    public function test(OtherClass $otherclass) {
        echo $otherclass->var;
    }


    /**
     * Another test function
     *
     * First parameter must be an array
     */
    public function test_array(array $input_array) {
        print_r($input_array);
    }

    /**
     * First parameter must be iterator
     */
    public function test_interface(Traversable $iterator) {
        //traversable is an abstract internal engine base interface for use with
        // iterator or IteratorAggregate an so is used as the object type for them
        echo get_class($iterator);
        // get_class - Gets the name of the class of the given object.
        // and is a built in PHP class / object function
        // here it gets the class name of the ArrayObject passed to it
    }

    /**
     * First parameter must be callable
     */
    public function test_callable(callable $callback, $data) {
        // here the callable data type is used as the type hint for the function
        // the function also takes a regular data variable which isn't type hinted
        call_user_func($callback, $data);
        // call_user_func() — Call the callback given by the first parameter
    }
}

// Another example class
class OtherClass {
    public $var = 'Hello World';
}


// An instance of each class
$myclass = new MyClass;
$otherclass = new OtherClass;

// Fatal Error: Argument 1 must be an object of class OtherClass not a string
//$myclass->test('hello');

// Fatal Error: Argument 1 must be an instance of OtherClass not a stdClass
$foo = new stdClass;
//$myclass->test($foo);

// Fatal Error: Argument 1 must not be null
//$myclass->test(null);

// Works: Prints Hello World as test() takes an $otherclass object
$myclass->test($otherclass);
echo "\n".PHP_EOL;

// Fatal Error: Argument 1 must be an array not a string
//$myclass->test_array('a string');

// Works: Prints the array
$myclass->test_array(array('a', 'b', 'c'));
echo "\n".PHP_EOL;

// Works: Prints ArrayObject, this function is defined with the traversable data type
// which is an abstract internal engine base interface for use with
// iterator or IteratorAggregate an so is used as the type hint for them
// Here an ArrayObject (class which allows arrays to work as objects) is used
// to pass an array as an object to the test_interface() method which is defined to
// take a traversable data type for use with an iterator, you could just pass the
// array! You couldn't just pass array because get_class() only works on objects
$myclass->test_interface(new ArrayObject(array()));
print "\n".PHP_EOL;

// Works: Prints int(1) - Here you pass a callback function (var_dump) to the
// test_callable function where call_user_func() is used to call var_dump and
// display the data
$myclass->test_callable('var_dump', 1);