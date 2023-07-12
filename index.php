<?php
class person  
{  
public $name;  
public $age;
private $sellery;  
function __construct($n, $a,$s)  
{  
$this->name=$n;  
$this->age=$a; 
$this->setSellery($s); 
}  
public function setAge($ag)  
 {  
   
$this->age=$ag;  
   
}  
public function setName($nam)  
 {  
   
$this->name=$nam;  
   
} 
private function setSellery($sellry)  
 {  
   
$this->sellery=$sellry;  
echo $this->sellery;
   
} 
   
public function display()  
   
{  
   
echo  "welcome ".$this->name."<br/>";  
   
return $this->age;;  
   
}  
   
}  
   
$person=new person("sonoo",28,40000);  
   
$person->setAge(20);  
// $person->setSellery(40);
   
echo "You are ".$person->display()." years old";  
   
?>  
