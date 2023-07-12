<?php
trait hello{
    public function sayHello(){
        echo "hello from hello trait";
    }
}
trait hi{
    public function sayHello(){
        echo "hello from hi trait";
    }
}
// class base{
//     public function sayHello(){
//         echo "hello from baseclass";
//     }
// }
// class child extends base{
//     use hello;
//     public function sayHello(){
//         echo "hello from childclass";
//     }
// }
class base{
    use hello,hi{
        hello::sayHello insteadOf hi;
        hi::sayHello as newHello;
    }
}
// $child=new  child();
// $child->sayHello();//priority milay ge trait ko aur trait wala sayHello print ho ga
//agr child class main b wohe function hain to child class wala function ko sb say zyada priority milay ge
$base=new base();
$base->sayHello();
$base->newHello();
?>