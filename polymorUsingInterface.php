<?php
interface Area {  // parent class
    function calcArea();  // implementation in child classes 
 }  

 class Circle implements Area {  // child class

    private $radius;  
    public function __construct($radius){  
       $this -> radius = $radius;  
    }  

    public function calcArea(){  // implementation must be necessary
       return $this -> radius * $this -> radius * pi();  
    }  
 }  
 class Rectangle implements Area { // child class

    private $width;  
    private $height;  

    public function __construct($width, $height){  
       $this -> width = $width;  
       $this -> height = $height;  
    }  

    public function calcArea(){  
       return $this -> width * $this -> height;  
    }  
 }  
//  $mycirc = new Circle(3);  
//  $myrect = new Rectangle(3,4);  


$Val=array(2);    // make array and store adresses of above objects
    
$Val[0] = new Circle(3);    
$Val[1] = new Rectangle(3,4); 
for($i=0;$i<2;$i++)    
{    
   echo $Val[$i]->calcArea(); // call the same function but behaviour change and output different
   echo "<br>";   
}      
  


?>