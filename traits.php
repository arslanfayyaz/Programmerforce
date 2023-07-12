<?php
trait hello{
    public function hiEveryOne(){
        echo "hi everyone";
    }
    public function sayHello(){
        echo "hello everyone";
    }
}
trait Bye{
    public function sayBye(){
        echo "Bye BYE everyone";
    }
}
class base{
   use hello,Bye;
}
class base1{
    use hello;
}
$base=new base();
$base1=new base1();
$base->hiEveryOne();
$base->sayBye();
echo "</br>";
$base1->hiEveryOne();
//trait is a commont funtion which we used in more then one classes.
?>
