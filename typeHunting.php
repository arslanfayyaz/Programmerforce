<?php
  
  class cls{
      public $sentence="Hi welcome to php world";
  }
  
  function display(cls $var1){
      echo $var1->sentence;
  }
  
  display(new cls());

//   function add(array $numbers){
//     $sum=0;
//     foreach($numbers as $item){
//         $sum=$sum+$item;
//     }
//     echo $sum;
// }

// add(array(10,10));

function sum(int $v){
    echo $V+1;
}

sum("hello");
?>