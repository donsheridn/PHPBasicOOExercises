<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/12/2015
 * Time: 1:05 PM
 */
header('Content-type: text/plain');

use App\Classlib1\MyClass1 as MC;

// autoload function
function __autoload($class) {

    echo "This is whats passed to __autoload ".$class.PHP_EOL;
    // convert namespace to full file path
    //$class = 'classes\' . str_replace('\\', '/', $class) . '.php';
    //This line was wrong in the example, so I changed it to whats below
//    $class = "/vagrant/ObjectedOriented/" . str_replace("\\", "/", $class) . '.php';
    //this still didn't work, because Nameapp5.php is in /vagrant/ObjectedOriented/
    //so I was running it from /vagrant/2ObjectOriented which meant when the str_replace
    //took place it was trying to require  '/vagrant/ObjectedOriented/App/Namelib1/MyClass.php'
    //which couldn't be found in /vagrant/ObjectedOriented
    //so I changed it to
    $class = str_replace("\\", "/", $class) . '.php';
    echo "This is what it gets converted to ".$class.PHP_EOL."\n";
    require_once($class);     //load the class once you have the linux file path

}

$obj = new MC();     //__autoload() is called when you try to use a class that hasn't been loaded
echo $obj->WhoAmI1().PHP_EOL;
