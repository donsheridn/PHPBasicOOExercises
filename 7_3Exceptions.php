<?php

//Access this at http://localhost:8000/2ObjectOriented/7_3Exceptions.php
//and            http://localhost:8000/2ObjectOriented-Ans/7_3Exceptions.php

function inverse($x) {
    if (!$x) {
        throw new Exception('Division by zero.');
    }
    return 1/$x;
}

try {
    echo inverse(5) . "\n";
} catch (Exception $e) {
    echo '<pre>';
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    echo '</pre>';
}

try {
    echo '<pre>';
    echo inverse(0) . "\n";
} catch (Exception $e) {
    echo '<pre>';
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    echo '</pre>';
}

// Continue execution
echo '<pre>';
echo "Hello World\n";
echo "\n";
echo PHP_EOL;
echo '</pre>';

// Nested Exception Example
class MyException extends Exception{}

class TestClass{

    public function testMethod(){
        try{
            try{
                throw new MyException('this is MyException!');
            }
            catch(MyException $e){
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                echo "Going to re-throw MyException so it is caught by the outer catch \n";
                throw $e;
            }
        }
        catch(Exception $e){
            echo "In the outer catch block, caught the Exception again!\n";
            echo $e->getMessage().PHP_EOL;
//            var_dump($e->getMessage());
        }
    }
}

$testcase = new TestClass();
$testcase->testMethod();