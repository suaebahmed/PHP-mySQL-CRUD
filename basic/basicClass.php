<?php

class Person{
    public $age = 4;
    public function speack(){
        // this->$age ==> $this->age
        
        echo $this->age;
        echo "hello";
    }
    public function __construct(){
        echo "__construct is called";
    }
    // public function __destruct(){
    //     echo "__destruct is called";
    // }
}

$obj = new Person();
$obj->speack();

echo "<hr>";

class A{
    public function fun(){
        echo "<p>I am fun method in parents class</p>";
    }
}
class B extends A{

}
// interface
// abstract
$b1 = new B();
$b1->fun();

class myClass{
    static $myVar = 30;
    static function myMethod(){
        echo self::$myVar."<br>";
    }
}
echo myClass::$myVar;
myClass::myMethod();
?>


<?php
    $myObj = new myClass();
    $myObj->myMethod();
?>