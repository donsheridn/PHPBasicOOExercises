<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/5/2015
 * Time: 12:56 PM
 */

$array = ['$_SERVER'=>$_SERVER,'$_GET'=>$_GET,'$_POST'=>$_POST,'$_FILES'=>$_FILES,
    '$_COOKIE'=>$_COOKIE,'$_REQUEST'=>$_REQUEST,'$_SESSION'=>$_SESSION,'$_ENV'=>$_ENV
//            '$GLOBALS'=>$GLOBALS,
];

foreach($array as $index => $value){

    echo "Up next is the $index array: \n";

    switch($index){
        case '$_SERVER':
            echo 'The $_SERVER array contains information from the web server, such as headers,
                 paths, and script locations';
            break;
        case '$_GET':
            echo 'The $_GET array contains information passed using the get method and URL parameters';
            break;
        case '$_POST':
            echo 'The $_POST array contains information passed using the post method';
            break;
        case '$_FILES':
            echo 'The $_FILES array contains information uploaded using the post method';
            break;
        case '$_COOKIE':
            echo 'The $_COOKIE array contains information passed using the HTTP cookies';
            break;
        case '$_REQUEST':
            echo 'The $_REQUEST array contains an amalgam of the $_GET, $_POST, and $_COOKIE arrays';
            break;
        case '$_SESSION':
            echo 'The S_SESSION array contains session variables available to the current script.';
            break;
        default:
            echo 'The $GLOBALS array contains an amalgam of all the other arrays';
            break;
    }

    print_r($value);
    echo "That was the $index array \n";
    echo PHP_EOL;

}

//

$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;        //global is used here to import variables from global scope
                          //so they can be used withing the function.

    $b = $a + $b;         //the math here is done using variables with class scope
}                         //so $b is available outside the function

Sum();
echo $b."\n".PHP_EOL;

//Example2
$a = 1;
$b = 2;

function Sum1()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b']; //using the $GLOBALS superglobal array
}                                                  //to access variables with global scope
                                                   //inside the function (same as above)
Sum();
echo $b."\n".PHP_EOL;

//Example3
$HTTP_POST_VARS['name']='Ron';
$_POST['name']='Don';
function test_global()
{
    // Most predefined variables aren't "super" and require
    // 'global' to be available to the functions local scope.
    global $HTTP_POST_VARS;

    echo $HTTP_POST_VARS['name']."\n";

    // Superglobals are available in any scope and do
    // not require 'global'. Superglobals are available
    // as of PHP 4.1.0, and HTTP_POST_VARS is now
    // deemed deprecated.

    // global $_POST['name'];      //$_POST is already a superglobal so doesn't need global
    echo $_POST['name']."\n";
}

test_global();

echo PHP_EOL;


