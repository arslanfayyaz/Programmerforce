<!DOCTYPE html>
<html>
<body>
<?php
class Calculator{
  public $operand1;
  public $operand2;
  public $operartor;
  public $result;
  
  function __construct($userInput1,$userInput2,$oper) {
    $this->operand1=$userInput1;
    $this->operand2=$userInput2;
    $this->operartor=$oper; 
  }
  function calculate_result()
  {
           
         $object=new Calculator($this->operand1,$this->operand2,$this->operartor);
         $object->result();
  }

  function result(){
    switch($this->operartor){
        case '+':
          $this->result= $this->operand1+$this->operand2;
           // $object->result($result);
           break;
       case '-':
            $this->result= $this->operand1-$this->operand2;
           // $object->result($result);
           break;
       case '*':
            $this->result= $this->operand1*$this->operand2;
           // $object->result($result);
           break;
       case '/':
           if($this->operand2!=0){
            $this->result= $this->operand1/$this->operand2;
           }else{
               return -1;
           }
           // $object->result($result);
           break;
       default:
            $this->result=0;

  }

        return $this->result;
}
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];
    
    $cal = new Calculator($num1, $num2, $operator);
     echo $cal->result();
}
?>

<h1>Calculator</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="num1">Enter Operand 1:</label>
        <input type="number" id="num1" name="num1" value="<?php echo $num1; ?>" required>
        <br><br>
        <label for="num2">Enter Operand 2:</label>
        <input type="number" id="num2" name="num2" value="<?php echo $num2; ?>" required>
        <br><br>
        <label for="operator">Operator:</label>
        <select id="operator" name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br><br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>