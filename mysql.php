<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<?php
$serverErr=$userErr=$passErr=$dbErr="";
$sname=$username=$password=$database="";

if(isset($_POST['myButton'])) {
     
  if(empty($_POST['servername']))
  {
    $serverErr="Server name is required";
  }
  else
  {
    $sname=$_POST['servername'];
  }
  if(empty($_POST['username']))
  {
    $userErr="Username is required";
  } 
  else
  {
    $username=$_POST['username'];
  }
  if(empty($_POST['password']))
  {
    $passErr="Password is required";
  }
  else
  {
    $password=$_POST['password'];
  }
  if(empty($_POST['database']))
  {
    $dbErr="database name is required";
  }
  else
  {
    $database=$_POST['database'];
  }
  if (!empty($sname) && !empty($username) && !empty($database)){
      $conn = mysqli_connect( $sname, $username, $password,$database );
      
      if($conn->connect_error)
      {
      die("Connection failed: " . $conn->connect_error);
      }

    $sql="CREATE TABLE Customer(
       c_id INT NOT NULL PRIMARY KEY,
       c_name VARCHAR(50) NOT NULL,
       c_adress VARCHAR(50) NOT NULL ,
       c_phone INT NOT NULL

    )";

    if ($conn->query($sql) === true) 
    {
      echo "Table 'Customer' created successfully<br>";

    } 
    $sql1= "CREATE TABLE Product(
      product_id INT NOT NULL PRIMARY KEY,
      product_name VARCHAR(50) NOT NULL,
      product_price INT NOT NULL,
      product_description VARCHAR(50)
    
    )";
    if ($conn->query($sql1) === true) 
    {
      echo "Table 'Product' created successfully<br>";
    
    } 
    
    $sql2= "CREATE TABLE Category(
      category_id INT NOT NULL PRIMARY KEY,
      category_name VARCHAR(50) NOT NULL,
      category_date INT NOT NULL,
      
      FOREIGN KEY (category_id) REFERENCES Customer(c_id)
    
    )";
    if ($conn->query($sql2) === true) 
    {
      echo "Category created successfully<br>";
    
    } 
    
    $sql3= "CREATE TABLE User(
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
      Category_id INT ,
      product_id INT ,
      FOREIGN KEY (Category_id) REFERENCES Category(category_id),
      FOREIGN KEY (product_id) REFERENCES Product(product_id)
    
    )";
    if ($conn->query($sql3) === true) 
    {
      echo "User created successfully<br>";
    
    }
}else{
        echo 'Please fill in all fields before submitting.';
      
}

    
  }
?>


<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  ServerName: <input type="text" name="servername" value="<?php echo $sname;?>">
  <span class="error">* <?php echo $serverErr;?></span>
  <br><br>
  UserName: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $userErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passErr;?></span>
  <br><br>
  DatabaseName: <input type="text" name="database" value="<?php echo $database;?>">
  <span class="error">* <?php echo $dbErr;?></span>
  <br><br>
  <button type="submit" name="myButton">Click Me</button>
</form>

</body>
</html>