<?php
trait hello{
    private function sayHello(){
        echo "hello from hello trait";
    }
}
class base{
    use hello{
        hello::sayHello as public newHello;
    }
}
$base=new base();
$base->newHello();

?>