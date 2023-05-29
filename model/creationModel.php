<?php

class Creation
{

    public function migration($conn)
    {
        
        
        $qry = "create table user(
            id int primary key auto_increment,
            email varchar(40) unique not null,
            access enum('customer','admin')
        );";

        $result = mysqli_query($conn, $qry);

        if ($result) {
            echo "User Table Created";
        } else {
            echo "Error in User Table Creation";
        }

        $qry2 = "create table product(
            id int primary key auto_increment,
            description varchar(80) ,
            price int
            
        );";

        $result2 = mysqli_query($conn, $qry2);

        if ($result2) {
            echo "Product Table Created";
        } else {
            echo "Error in Product Table Creation";
        }
        $qry3 = "create table category(
            id int primary key auto_increment,
            name varchar(80)
        );";

        $result3 = mysqli_query($conn, $qry3);

        if ($result3) {
            echo "Category Table Created";
        } else {
            echo "Error in Category Table Creation";
        }

        $qry4="CREATE TABLE `order` (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(40),
            users_id INT,
            products_id INT,
            FOREIGN KEY (users_id) REFERENCES `user` (id),
            FOREIGN KEY (products_id) REFERENCES product (id)
        )";
        
          $result4 = mysqli_query($conn, $qry4);

        if ($result4) {
            echo "Order Table Created";
        } else {
            echo "Error in order Table Creation";
        }

    }
    // public function tableExists($table,$table1,$conn)
    //     {
    //        $sql="SHOW TABLES FROM $conn->db LIKE '$table','$table1'";
    //        $result = mysqli_query($conn, $sql);
    //        if($result){
    //           if($result->num_rows==1){
    //           return true;
    //     }
    // }

}

?>