<?php
/**
 * Created by PhpStorm.
 * User: Don
 * Date: 3/13/2015
 * Time: 5:33 PM
 */
class A {
    public static function who() {
        echo __CLASS__.PHP_EOL;
    }
    public static function test() {
        static::who();  //static ensures the correct name is displayed when called
    }                   //from an extended class, as thename is resolved at runtime
                        //as opposed to compile time
    public static function test1() {
        self::who();    //using self
    }
}

class B extends A {
    public static function who() {
        echo __CLASS__.PHP_EOL;
    }
}

B::test1();               //This incorrectly displays Class B when called by the self.
B::test();
echo PHP_EOL;

class C {
//class C extends D{
    private function foo() {
        echo "successC!\n";
    }
    public function test() {
        $this->foo();
        self::foo();
//        parent::who();      //this will throw an error when not accessed using an extended class.

        static::foo();      //this fails when called from class E because static resolves
                            //to the class where its called from. It works for class D
                            //because it doesn't overide the original foo() method, so
                            //maintaining it's scope in class C
    }
}

class D extends C {
    /* foo() will be copied to D, hence its scope will still be C and
     * the call be successful */
}

class E extends C {
    private function foo() {
        /* original method is replaced; the scope of the new one is E */
        //so because the foo() method is redefined, it's scope becomes that of
        //class E meaning when you call $c->test() below and trigger static::foo()
        //$this no longer works because it references the empty foo() function of
        //E and not the one of class C.
        echo "successE!\n";   //this doesn't work either because your trying to call
                                //the class e private method from classC
    }
}

$d = new D();
$d->test();

echo PHP_EOL;

$e = new E();
$e->test();   //fails