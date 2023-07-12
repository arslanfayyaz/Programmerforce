<?php
class migration{
   private $servername;
   private $username;
   private $password;
   private $database;
   private $conn;
   function __construct($ser,$user,$pass,$data)
   {
      $this->servername=$ser; 
      $this->username=$user;
      $this->password=$pass;
      $this->database=$data;
   }
   function checkConnection(){
        $this->conn = mysqli_connect( $this->servername,$this->username,$this->password,$this->database);
        
        if($this->conn->connect_error)
        {
        die("Connection failed: " . $this->conn->connect_error);
        }
   }
  function createMigrations(){
    $sql="CREATE TABLE Customer(
        c_id INT NOT NULL PRIMARY KEY,
        c_name VARCHAR(50) NOT NULL,
        c_adress VARCHAR(50) NOT NULL ,
        c_phone INT NOT NULL
 
     )";
 
     if ($this->conn->query($sql) === true) 
     {
       echo "Table 'Customer' created successfully<br>";
 
     } 
     $sql1= "CREATE TABLE Product(
       product_id INT NOT NULL PRIMARY KEY,
       product_name VARCHAR(50) NOT NULL,
       product_price INT NOT NULL,
       product_description VARCHAR(50)
     
     )";
     if ($this->conn->query($sql1) === true) 
     {
       echo "Table 'Product' created successfully<br>";
     
     } 
     
     $sql2= "CREATE TABLE Category(
       category_id INT NOT NULL PRIMARY KEY,
       category_name VARCHAR(50) NOT NULL,
       category_date INT NOT NULL,
       
       FOREIGN KEY (category_id) REFERENCES Customer(c_id)
     
     )";
     if ($this->conn->query($sql2) === true) 
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
     if ($this->conn->query($sql3) === true) 
     {
       echo "User created successfully<br>";
     
     }
  }
}

?>