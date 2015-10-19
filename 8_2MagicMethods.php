<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/17/2015
 * Time: 12:57 PM
 */

class Device {
    public $name;           // the name of the device
    public $battery;        // holds a Battery object
    public $data = array(); // stores misc. data in an array
    public $connection;     // holds some connection resource

    public function  __construct(Battery $battery, $name) {
        // $battery can only be a valid Battery object
        $this->battery = $battery;
        $this->name = $name;
        // connect to the network
        $this->connect();                   //calls the connect method below
    }

    protected function connect() {
        // connect to some external network
        $this->connection = 'resource';           //sets connection to resource
        echo $this->name . ' connected' . PHP_EOL; //tells you you are connected
    }

    protected function disconnect() {
        // safely disconnect from network
        $this->connection = null;
        echo $this->name . ' disconnected' . PHP_EOL;
    }

    public function __get($name) {
        // check if the named key exists in our array
        if(array_key_exists($name, $this->data)) {
            // then return the value from the array
            return $this->data[$name];
        }
        return null;
    }

    public function  __set($name, $value) {
        // use the property name as the array key
        $this->data[$name] = $value;
    }

    public function  __isset($name) {
        // you could also use isset() here
        return array_key_exists($name, $this->data);
    }

    public function  __unset($name) {
        // forward the unset() to our array element
        unset($this->data[$name]);
    }

    public function  __destruct() {
        // disconnect from the network
        $this->disconnect();          //calls disconnect to free up the connection resource
        echo $this->name . ' was destroyed' . PHP_EOL;  //tells yu the device object was destroyed
    }
}

class Battery {            //doesn't take any values
    private $charge = 0;

    public function setCharge($charge) {
        $charge = (int)$charge;
        if($charge < 0) {
            $charge = 0;
        }
        elseif($charge > 100) {
            $charge = 100;
        }
        $this->charge = $charge;
    }

    public function  __get($name) {
        if(isset($this->$name)) {      //note the use of variable variables to dynamically
            return $this->$name;       //access a property. The Battery object exists as part
        }                              //of the Device object so has scope to access the
        return null;                   //Device->name using object notation.
    }

//    public static function  __set_state(array $array) {
//        $obj = new self();
//        $obj->setCharge($array['charge']);
//        return $obj;
//    }

//    public function __clone() {      //didn't get this working, didn't appear to get called
//        // copy our Battery object
//        $this->battery = clone $this->battery;
//    }

}

$device = new Device(new Battery(), 'iMagic');  //create a device object and a Battery object
                                              //calls the __construct() magic method with the
                                              //Battery object and name
echo $device->name."\n".PHP_EOL;     //as the $name property has been initialized already
                                     //you can access it without using the __get magic method

$device->user = 'Steve';        //call the __set() magic method to set data[$name] = Steve

echo $device->user.PHP_EOL;             //call the __get() magic method

print_r($device->data);         //print the array, uses the __get magic method
var_dump(isset($device->user)); //call the isset() magic method to check if a user is set

echo 'unsetting the data[$name] field = Steve'.PHP_EOL;

unset($device->user);            //call the __unset() magic method to clear data[$name] = Steve

$device->user = 'Ronny';

var_dump(isset($device->user));  //call the isset() magic method to check if a user is set
//print_r(isset($device->user));

print_r($device->data);          //print the array, uses the __get magic method
echo PHP_EOL;

echo $device."\n";                  //this will throw an erorr unless there is a __toString magic
//method defined.
print_r($device);              //print out the object in human readable format with data types.
//var_dump($device);           //prints out the object unformatted without data types.

//var_dump($device->battery);
//var_export($device->battery);  //similar to var_dump() except it calls the __set_state() magic
//method if defined

$device('test');        // equiv to $device->__invoke('test'), Outputs: test

unset($device);               //automatically calls the __destruct() magic method.
