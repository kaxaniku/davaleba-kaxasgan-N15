<?php
//1.
class Person {
    public $name = "(your name here)";
    public $age = 0;

    // function __construct($name) {
    //     $this->name = $name;
    // }

    public function getNA(){
        echo "hello, my name is " . $this->name . ", im " . $this->age . " years old";
    }
}

$Person = new person;

$Person->getNA();
echo "<br>";
//2.
class MyClass {
    function __construct(){
        echo "MyClass class has initialized";
    }
}

$MyClass = new MyClass;
echo "<br>";
//3.
class Calc {
    public $Fnum;
    public $Snum;
    function __construct($Fnum , $Snum){
        $this->Fnum = $Fnum;
        $this->Snum = $Snum;
    }
    public function add(){
        echo $this->Fnum + $this->Snum;
    }
    public function remove(){
        echo $this->Fnum - $this->Snum;
    }
    public function multiply(){
        echo $this->Fnum * $this->Snum;
    }
    public function divide(){
        echo $this->Fnum / $this->Snum;
    }
}

$Calc = new Calc(3,3);
$Calc->add();
echo "<br>";
$Calc->remove();
echo "<br>";
$Calc->multiply();
echo "<br>";
$Calc->divide();