<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/19/2015
 * Time: 4:10 PM
 */
class MyClass{

    private $store1;
    private $store2;

    /**
     * @return mixed
     */
    public function getStore1()
    {
        return $this->store1;
    }

    /**
     * @param mixed $store1
     */
    public function setStore1($store1)
    {
        $this->store1 = $store1;
    }

    /**
     * @return mixed
     */
    public function getStore2()
    {
        return $this->store2;
    }

    /**
     * @param mixed $store2
     */
    public function setStore2($store2)
    {
        $this->store2 = $store2;
    }

}

$obj1 = new MyClass();
$obj1->setStore1(11);
$obj1->setStore2(22);
echo "The first property is ".$obj1->getStore1().PHP_EOL;
echo "The second property is ".$obj1->getStore2().PHP_EOL;

//

//I vote for a third solution. I use this in my projects and Symfony uses something like this too:

//public function __call($val, $x) {
//    if(substr($val, 0, 3) == 'get') {
//        $varname = strtolower(substr($val, 3));
//    }
//    else {
//        throw new Exception('Bad method.', 500);
//    }
//    if(property_exists('Yourclass', $varname)) {
//        return $this->$varname;
//    } else {
//        throw new Exception('Property does not exist: '.$varname, 500);
//    }
//}
//This way you have automated getters (you can write setters too), and you only have to
// write new methods if there is a special case for a member variable.


//Mixing magicmethods __set and __get with setters and getters
//
//class MyClass {
//    private $firstField;
//    private $secondField;
//    private $thirdField;
//
//    public function __get( $name ) {
//        if( method_exists( $this , $method = ( 'get' . ucfirst( $name  ) ) ) )
//            return $this->$method();
//        else
//            throw new Exception( 'Can\'t get property ' . $name );
//    }
//
//    public function __set( $name , $value ) {
//        if( method_exists( $this , $method = ( 'set' . ucfirst( $name  ) ) ) )
//            return $this->$method( $value );
//        else
//            throw new Exception( 'Can\'t set property ' . $name );
//    }
//
//    public function __isset( $name )
//    {
//        return method_exists( $this , 'get' . ucfirst( $name  ) )
//        || method_exists( $this , 'set' . ucfirst( $name  ) );
//    }
//
//    public function getFirstField() {
//        return $this->firstField;
//    }
//
//    protected function setFirstField($x) {
//        $this->firstField = $x;
//    }
//
//    private function getSecondField() {
//        return $this->secondField;
//    }
//}
//
//$obj = new MyClass();
//
//echo $obj->firstField; // works
//$obj->firstField = 'value'; // works
//
//echo $obj->getFirstField(); // works
//$obj->setFirstField( 'value' ); // not works, method is protected
//
//echo $obj->secondField; // works
//echo $obj->getSecondField(); // not works, method is private
//
//$obj->secondField = 'value'; // not works, setter not exists
//
//echo $obj->thirdField; // not works, property not exists
//
//isset( $obj->firstField ); // returns true
//isset( $obj->secondField ); // returns true
//isset( $obj->thirdField ); // returns false






//I do a mix of edem's answer and your second code. This way, I have the benefits of
// common getter/setters (code completion in your IDE), ease of coding if I want,
// exceptions due to inexistent properties (great for discovering typos: $foo->naem
// instead of $foo->name), read only properties and compound properties.

//class Foo
//{
//    private $_bar;
//    private $_baz;
//
//    public function getBar()
//    {
//        return $this->_bar;
//    }
//
//    public function setBar($value)
//    {
//        $this->_bar = $value;
//    }
//
//    public function getBaz()
//    {
//        return $this->_baz;
//    }
//
//    public function getBarBaz()
//    {
//        return $this->_bar . ' ' . $this->_baz;
//    }
//
//    public function __get($var)
//    {
//        $func = 'get'.$var;
//        if (method_exists($this, $func))
//        {
//            return $this->$func();
//        } else {
//            throw new InexistentPropertyException("Inexistent property: $var");
//        }
//    }
//
//    public function __set($var, $value)
//    {
//        $func = 'set'.$var;
//        if (method_exists($this, $func))
//        {
//            $this->$func($value);
//        } else {
//            if (method_exists($this, 'get'.$var))
//            {
//                throw new ReadOnlyException("property $var is read-only");
//            } else {
//                throw new InexistentPropertyException("Inexistent property: $var");
//            }
//        }
//    }
//}