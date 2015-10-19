<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/2/2015
 * Time: 11:56 AM
 */
namespace Foo;

class BaseClass {
    function __construct() {
        print "In BaseClass constructor\n";
        echo "\n";
//        echo PHP_EOL;
    }
}

class SubClass extends BaseClass {
    function __construct() {
        parent::__construct();                 //calls the construct() of the parent class
        print "In SubClass constructor\n";
//        echo "\n";
        echo PHP_EOL;
    }
}

class OtherSubClass extends BaseClass {
    // inherits BaseClass's constructor
}

// In BaseClass constructor
$obj = new BaseClass();

// In BaseClass constructor
// In SubClass constructor
$obj = new SubClass();

// In BaseClass constructor
$obj = new OtherSubClass();


//Example demonstrating how old style constructors dont work on newer versions of PHP
class Bar {
    public function Bar() {
        // treated as constructor in PHP 5.3.0-5.3.2
        // treated as regular method as of PHP 5.3.3
        print "In regular method Bar which is no longer a constructor in PHP >5.3\n";
        //        echo "\n";
        echo PHP_EOL;
    }
}

//$obj = new Bar();   // not treated as a constructor anymore so this outputs nothing
Bar::Bar();



//next example
class MyDestructableClass {
    function __construct() {
        print "In constructor\n";
        $this->name = "MyDestructableClass";
    }

    function __destruct() {
        print "Destroying " . $this->name . "\n";
    }
}

$obj = new MyDestructableClass();