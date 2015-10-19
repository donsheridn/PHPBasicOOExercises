<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/3/2015
 * Time: 8:07 PM
 */
abstract class AbstractClass
{
    // Force Extending class to define this method
    abstract protected function getValue();           //abstract method
    abstract protected function prefixValue($prefix); //abstract method

    // Common method
    public function printOut() {                      //non-abstract method
        print $this->getValue() . "\n";
    }
}

class ConcreteClass1 extends AbstractClass
{
    protected function getValue() {          //implementation of abstract method
        return "ConcreteClass1";
    }

    public function prefixValue($prefix) {   //implementation of abstract method
        return "{$prefix}ConcreteClass1";
    }
}

class ConcreteClass2 extends AbstractClass
{
    public function getValue() {             //implementation of abstract method
        return "ConcreteClass2";
    }

    public function prefixValue($prefix) {   //implementation of abstract method
        return "{$prefix}ConcreteClass2";
    }
}

$class1 = new ConcreteClass1;
//$class1->getValue();  // throws error because its implementation in ConcreteClass1 is protected and so can't be accessed outside the class
$class1->printOut();                          //non-abstract method of the abstract class
echo $class1->prefixValue('FOO_') ."\n";      //abstract method implemented in ConcreteClass1
echo PHP_EOL;

$class2 = new ConcreteClass2;
$class2->getValue();                          //abstract method implemented in ConcreteClass1
$class2->printOut();                          //non-abstract method of the abstract class
echo $class2->prefixValue('FOO_') ."\n";      //abstract method implemented in ConcreteClass1
echo PHP_EOL;


abstract class AbstractClassA
{
    // Our abstract method only needs to define the required arguments
    abstract protected function prefixName($name);    //abstract method that takes one parameter

}

class ConcreteClassA extends AbstractClassA
{
    // Our child class may define optional arguments not in the parent's signature
    public function prefixName($name, $separator = ".") {    //implementation of abstract class
        if ($name == "Pacman") {
            $prefix = "Mr";
        } elseif ($name == "Pacwoman") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }
        return "{$prefix}{$separator} {$name}";
    }
}

$class = new ConcreteClassA;
echo $class->prefixName("Pacman"), "\n";   //call the prefixName method of the extended class
echo $class->prefixName("Pacwoman"), "\n"; //passing the name parameter