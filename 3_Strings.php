<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 5/15/2015
 * Time: 2:51 PM
 */

$a = "dangerous\name";      //be careful when escaping namespaces
echo $a."\n";
$a = "dangerous\\name";
echo $a."\n";


echo PHP_EOL.PHP_EOL;


$me = 'Davey';
$names = array ('Smith', 'Jones', 'Jackson');
echo "There cannot be more than two {$me}s!";     //you can use curly braces to escape tricky formatting
echo PHP_EOL;
echo "Citation: {$names[1]}[1987]";
echo PHP_EOL.PHP_EOL;


echo 'This is \'my\' string';                   //here we escape single quote characters inside a string
echo PHP_EOL.PHP_EOL;


$a = 10;
echo "The value of \$a is \"$a\".";    //here we escape the $ dollar sign so its not seen as a variable
echo PHP_EOL.PHP_EOL;                          //and we escape the double quotes inside a string.


echo "Here’s an escaped backslash:  \ ";    // here backslash is just itself.
echo PHP_EOL.PHP_EOL;


$string = 'abcdef';
echo $string[1]."\n";      //here we access the characters of a string as if they were members of an array.


$s = 'abcdef';
for ($i = 0; $i < strlen ($s); $i++) {     //scan a string one character at a time.
    if ($s[$i] > 'c') {                    //only displaying letters greater than c
        echo $s[$i];
    }
}
echo PHP_EOL.PHP_EOL;


$string = '123aa';         // The string equals 123
if ($string == 123) {
    echo "the comparison was true due to type juggling even though the strings are different";
}
echo PHP_EOL.PHP_EOL;
if ($string === 123) {
    echo "Won\'t hit here as the identity operator is used";
}
else
    echo "The comparison is now false as the identity operator is used for exact comparison \n";

echo PHP_EOL.PHP_EOL;


$var1 = "Hello";
$var2 = "hello";
if (strcmp($var1, $var2) !== 0) {       // here 0 signifies true
    echo "$var1 is not equal to $var2 in a strcmp() case sensitive string comparison \n";
}
echo PHP_EOL;
if (strcasecmp($var1, $var2) === 0) {    // here 0 signifies true
    echo "$var1 is equal to $var2 in a strcasecmp() case insensitive string comparison \n";
}

echo PHP_EOL.PHP_EOL;


// Example 1
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);    //split a string into an array nbased on where the space are
echo $pieces[0]."\n"; // piece1
echo $pieces[1].PHP_EOL; // piece2

echo PHP_EOL;

$pizzapieces = implode(",", $pieces);    //implode the array back into one string.
print_r($pizzapieces);

echo PHP_EOL.PHP_EOL;

// Example 2
$data = "foo:*:1023:1000::/home/foo:/bin/sh";   //list() assigns variables to the array returned by explode
list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(":", $data);
echo $user."\n"; // foo
echo $pass.PHP_EOL; // *

