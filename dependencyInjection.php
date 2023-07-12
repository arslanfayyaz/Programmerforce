<?php
// dependecy injection is a technique to inject one class to another class through construc
//tor or setter fucntion. 

//constructor dependency  Injection 
//if firstClass has protected members instead of public memeber then we can not access it 
//through secondClass .
//protected member only accessed through inheritence;
class firstClass{
    public $var="First Class Value:";
    public function getValue(){
        return $this->var;
    }

}
class secondClass{
    public $var1="";
    public function __construct(firstClass $class) {
       //$this->var1=$class->var ;
       echo $class->getValue();
      }
}
$class1=new firstClass();
$class2=new secondClass($class1);
// $class2->$var1;




?>