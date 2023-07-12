<?php
interface A {
    function Hello();
 }
 interface B{
    function Display();
    function Bye();
 }

class C implements A,B {
    public function Hello(){
        echo "this is interface A";
    }
    public function  Display(){
        echo "this is interface B";
    }
    public function Bye(){
        echo " Bye Bye ";
    }
    public function childClass(){
        echo "This is inherited or child class";
    }
}
$c=new C();
$c->Hello();
$c->Bye();
$c->childClass();

?>