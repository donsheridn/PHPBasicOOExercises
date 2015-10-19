<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/13/2015
 * Time: 2:07 PM
 */
// 7_6_4Spl_Autoload.php uses the default spl_autoload_register(); implementation, which
// automatically uses the spl_autoload() function.
// However this file Spl_Autoload2.php uses my own custom my_autoload function, I use
// spl_autoload_register(my_autoload); to register this as the autoloader to be used for this file.

// This did work before I created my own my_autoload() function, when the
// use App\Namelib1\MyClass1 as MC; line was included, and using spl_autoload_register(); to
// to invoke the default spl_autoload(). However when you remove the
// use App\Namelib1\MyClass1 as MC; it stops working! Because the name passed
// to the standard __autoload function would have been AppNamelib1MyClass1WhoAmI1 and
// without it, its just WhoAmI, so spl_autoload() doesn't know what file to look for
// only the WhoAmI1 method, and WhoAmI1 doesn't exist in the global namespace.
// However it still doesn't work even if I supply MyClass1 as the namespace MC,
// so it looks like the included filepath doesn't work!

// I altered the original program to make it work, so now I define my own __autoload
// function and register it with spl_autoload_register() so now when I try to use the
// class using the fully qualified namespace my __autoload function can replace the
// backslashes with forward slashes for Linux. Linux is case sensitive, so be aware
// that spl_autoload() lowercases the class names sent to it.


use App\Classlib1\MyClass1 as MC;
//use MyClass1 as MC;

//Note, that the default autoload implementation is written in C land and is always
//slightly faster then the custom __autoload functions that you write in native PHP
//Here is a trick to use default implementation with any configuration:
//This also works with namespaces out of the box. So you can write code like
//"use My\Name\Object" and it will map to "class/My/Name/Object.class.php" file path!

//Your custom class dir
define('CLASS_DIR', '/vagrant/2ObjectOriented/app/Classlib1/');    //this defines a constant called CLASS_DIR in
                                  //the global namespace and gives it the value
                                  //class/ which is appended below to the
                                  //include_path

    //Add your class dir to include path, so when require/include are called to
    //load a file by Spl_autoload, PHP will know where to look for your Class files
    echo PHP_EOL."This is the include path ".get_include_path().PHP_EOL;
    echo "This is the path separator ".PATH_SEPARATOR.PHP_EOL;
    echo "This is the CLASS_DIR ".CLASS_DIR.PHP_EOL;

    set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);

    echo "This is the new include path ".get_include_path().PHP_EOL;
    //register the .class.php file extension so when Spl_autoload is called with
    //a classname it will know what file extension the class file has,
    //that it is looking for. This overwrites whatever extensions were in the
    //list previously so be careful to check what was there first
    //These only last for the duration of the script
    echo "These are the file extensions spl_autoload will load ".spl_autoload_extensions().PHP_EOL;
    spl_autoload_extensions('.inc,.php,.class.php');  //the order matters here
    echo "These are the file extensions spl_autoload will load ".spl_autoload_extensions().PHP_EOL;

function my_autoload($class) {

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
    echo "This is what it gets converted to ".$class.PHP_EOL;
    require_once($class);

}

    //Use default autoload implementation, when spl_autoload_register() is
    //called without any parameters its default implementation is used
    //spl_autoload ( string $class_name [, string $file_extensions = spl_autoload_extensions() ] )
    //so spl_autoload is called to load a class, it has the classname,
    //and searches the include_path for the file extensions you have registered
    //to be used for your classes
//Spl_autoload()
    spl_autoload_register(my_autoload);  //this throws an error but works anyway, just ignore error.


$obj = new MC();
//$obj = new myclass();
//$obj = new App\Classlib1\MyClass1();
echo $obj->WhoAmI1().PHP_EOL;     //should return the method path of this method