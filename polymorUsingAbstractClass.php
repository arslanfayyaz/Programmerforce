<?php
abstract class Language  
// parent class  
{  
    abstract public function greet();  // child class implement these methods
}  
  
class English extends Language  
// child class that will inherit the properties  
{  
    public function greet()  
    {  
        return 'Hello!';  
    }  
}  
  
class Spanish extends Language  
{  
// child class that will inherit the properties  
  
    public function greet()  
    {  
        return 'Hola!';  
    }  
}  
  
class French extends Language  
{  
// child class that will inherit the properties  
  
    public function greet()  
    {  
        return 'Bonjour!';  
    }  
}  
  
function greeting($people)  
{  
    foreach ($people as $person) {  
        echo $person->greet() . '<br>';  
    }  
}  
  
$people = [  
    new English(),  
    new spanish(),  
    new French()  
];  
  
greeting($people);  
?>  



?>