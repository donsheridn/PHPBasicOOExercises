<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/10/2015
 * Time: 6:02 PM
 */

namespace MagicMethods\AndConstants;

const myconstant = "This is my constant!";

echo myconstant.PHP_EOL;

// __MAGICCONSTANTS__

$magicconstants =  ['__DIR__','__FILE__','__NAMESPACE__','__FUNCTION__',
    '__CLASS__','__METHOD__','__LINE__','__TRAIT__',];

print_r($magicconstants);
echo PHP_EOL;

foreach($magicconstants as $index => $constant){
    echo "$index = $constant".PHP_EOL;
}

// __DIR__

echo "The directory is: ".__DIR__.PHP_EOL.PHP_EOL;

// __FILE__

echo "The filepath is: ".__FILE__.PHP_EOL.PHP_EOL;

// __NAMESPACE__

echo "The namespace is: ".__NAMESPACE__.PHP_EOL.PHP_EOL;

// __FUNCTION__

function MyFunction(){
    echo "The function is: ".__FUNCTION__.PHP_EOL.PHP_EOL;
}

echo MyFunction();

// __CLASS__
// __METHOD__

class MyClass{
    public function myMethod(){
        echo "The class is: ".__CLASS__.PHP_EOL.PHP_EOL;
        echo "The method is: ".__METHOD__.PHP_EOL.PHP_EOL;
    }
}

$obj = new MyClass();
$obj->myMethod();

// __LINE__

echo "We are in: ".__FILE__." at line number: ".__LINE__.PHP_EOL.PHP_EOL;

// __TRAIT__

trait MyTrait{

    public function sayHello(){
        echo "this is from the Trait, the Trait is: ".__TRAIT__.PHP_EOL.PHP_EOL;
    }
}

class NewClass{
    use MyTrait;

    public function weAreIn(){
        echo "We are in function: ".__FUNCTION__." of file: ".__FILE__.PHP_EOL.PHP_EOL;

    }
}

$obj1 = new NewClass();
$obj1->weAreIn();
$obj1->sayHello();


// Class Constant

class MyClassNow{

    const theConstant = "This is the class constant\n";

    public function displayThis(){

        echo self::theConstant;
    }

}

$obj2 = new MyClassNow();
$obj2->displayThis();

echo PHP_EOL;

echo "Accessed by class name: ".MyClassNow::theConstant.PHP_EOL;

echo PHP_EOL;

$name = "MagicMethods\AndConstants\MyClassNow";
echo "Accessed by class name variable: " . $name::theConstant .PHP_EOL;

echo PHP_EOL.PHP_EOL;
//echo "Accessed by class name variable: " . $name::displayThis() .PHP_EOL;
echo "Accessed by object: ";
echo $obj2->displayThis().PHP_EOL;