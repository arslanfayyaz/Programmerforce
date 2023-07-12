<?php

// polymorphysm means multiple forms of same thing
// there are two types of polymorphysm
// 1. compile time polymorphysm// method overloading
// 2. run time polymorphysm// method overriding
class base{

   public $name="This is parent class";
   public function calc($a,$b){// method overriding;
     return $a * $b;
   }
}


class derived extends base{
    public $name="This is child class";// properties overriding;
    public function calc($a,$b){
        return $a + $b;
      }
}
// if derived class has no calc method then call goes to parnet version of calc;



$child=new derived();
echo $child->name;
echo $child->calc(5,10);// calls the child class fucntion










?>