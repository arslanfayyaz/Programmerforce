
<?php
// Parent class
abstract class Car {
  public $name;
  public function __construct($name) {
    $this->name = $name;
  }
  abstract protected function intro(); 
}

// Child classes
class Audi extends Car {
  public function intro() {
    echo " $this->name!"; 
  }
}

class mehran extends Car {
  public function intro()  {
    echo  " $this->name!"; 
  }
}

class Citroen extends Car {
  public function intro()  {
    echo " $this->name!"; 
  }
}

// Create objects from the child classes
$audi = new audi("Audi");
 $audi->intro();
echo "<br>";

$mehran = new mehran("Mehran");
 $mehran->intro();
echo "<br>";

$citroen = new citroen("Civic");
echo $citroen->intro();
?>
 