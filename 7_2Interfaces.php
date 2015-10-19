<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/2/2015
 * Time: 7:40 PM
 */
interface IDataMaintainance {

    public function setData($index, $value);
    public function replaceIndex($searcharray);

}

class DataMaintainance implements IDataMaintainance {

    private $array = [];

    public function setData($index, $value){

        $this->array[$index] = $value;

    }

    public function replaceIndex($searcharray){

        foreach($this->array as $ind => $val){
            if ($searcharray === $val){
                echo "the index is $ind, while its value is $val \n";
                echo "found the name, now I'm going to make the name the index as well! \n";

                $ind = $val;

                echo "the index is now $ind, while its value is $val \n";
            }
            $newarray[$ind] = $val;
        }
        $this->array = $newarray;
    }

    public function displayArray(){
        foreach($this->array as $ind => $val){
            echo "the index is $ind, while the value is $val \n";
        }
    }

}

$object = new DataMaintainance();
$object->setData(1,'one');
$object->setData(2,'two');
$object->setData(3,'three');
$object->setData(4,'four');
$object->setData(5,'five');

echo PHP_EOL;

$object->displayArray();

echo PHP_EOL;

$object->replaceIndex('three');

echo PHP_EOL;

$object->displayArray();

echo PHP_EOL;


//next example

interface Hello {

    const hola = 'Hola en espanol';

    public function sayHello();

}

interface Display extends Hello{

    public function displayNumbers(array $storenumbers);

}

class Communication implements Display{

    public function sayHello(){

        echo "Hello next we will access your numbers. \n";

    }

    public function displayNumbers(array $storenumbers){

        foreach ($storenumbers as $index => $value){
            echo "the number's index is $index, while its value is $value. \n";
        }

    }

}

class StoreNumbers{

    protected $numbers = [];

    public function setNumbers($num){

        $this->numbers[] = $num;

    }

    public function returnNumbers(){

        $storeNumbers = $this->numbers;
        return $storeNumbers;
    }

}

$obj = new StoreNumbers();
$obj->setNumbers('one');
$obj->setNumbers('two');
$obj->setNumbers('three');
$obj->setNumbers('four');
$obj->setNumbers('five');

//$array = $obj->returnNumbers();
//print_r($array);
//echo PHP_EOL;

print_r($obj->returnNumbers());
echo PHP_EOL;

$obj1 = new Communication();
$obj1->sayHello();
echo PHP_EOL;

$numbersarray = $obj->returnNumbers();

$obj1->displayNumbers($numbersarray);

echo PHP_EOL;

echo Hello::hola.PHP_EOL;

echo Communication::hola.PHP_EOL;

