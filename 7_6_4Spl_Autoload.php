<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/12/2015
 * Time: 9:30 PM
 */
//Works now after I added use App\Classlib1\MyClass1 as MC; + /vagrant/2ObjectOriented/app/Classlib1/

use App\Classlib1\MyClass1 as MC;

//Note, that the default autoload implementation is written in C land and is always
//slightly faster then the custom __autoload functions that you write in native PHP
//Here is a trick to use default implementation with any configuration:
//This also works with namespaces out of the box. So you can write code like
//"use My\Name\Object" and it will map to "class/My/Name/Object.class.php" file path!

//Your custom class dir
//define('CLASS_DIR', 'class/');    //this defines a constant called CLASS_DIR in
                                  //the global namespace and gives it the value
                                  //class/ which is appended below to the
                                  //include_path
define('CLASS_DIR', '/vagrant/2ObjectOriented/app/Classlib1/');

    //Add your class dir to include path, so when require/include are called to
    //load a file by Spl_autoload, PHP will know where to look for your Class files

    echo PHP_EOL."This is the include path ".get_include_path().PHP_EOL;
    echo "This is the path separator ".PATH_SEPARATOR.PHP_EOL;
    echo "This is the CLASS_DIR ".CLASS_DIR.PHP_EOL."\n";

    set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);

    echo "This is the new include path ".get_include_path().PHP_EOL."\n";

    //register the .class.php file extension so when Spl_autoload is called with
    //a classname it will know what file extension the class file has,
    //that it is looking for. This overwrites whatever extensions were in the
    //list previously so be careful to check what was there first
    //These only last for the duration of the script
    echo "These are the file extensions spl_autoload will load ".spl_autoload_extensions().PHP_EOL;
    spl_autoload_extensions('.inc,.php,.class.php');
    echo "These are the file extensions spl_autoload will load ".spl_autoload_extensions().PHP_EOL;

    //Use default autoload implementation, when spl_autoload_register() is
    //called without any parameters its default implementation is used
    //spl_autoload ( string $class_name [, string $file_extensions = spl_autoload_extensions() ] )
    //so spl_autoload is called to load a class, it has the classname,
    //and searches the include_path for the file extensions you have registered
    //to be used for your classes
    spl_autoload_register();

$obj = new MC();
//$obj = new myclass();
//$obj = new App\Classlib1\MyClass1();
echo $obj->WhoAmI1().PHP_EOL;     //should return the method path of this method