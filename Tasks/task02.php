<!DOCTYPE html>
<html>
<body>
<?php

$count=0;
function countDivisibleBy3($x) {
    for($i=0;$i<count($x);$i++)
   {
     if($x[$i]<300)
    {
      if ($x[$i]%3==0)
      {
        global $count;
        $count++;
      }
   }
   else{
     return 0;
   }
}
}
$x=array(300,200,5,4);
countDivisibleBy3($x);
echo $count;

?>


</body>
</html>