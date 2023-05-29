<?php

class Order
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($name,$product_id,$user_id)
    {
        $name = mysqli_escape_string($this->conn,$name);
        $product_id = mysqli_escape_string($this->conn,$product_id);
        $user_id = mysqli_escape_string($this->conn,$user_id);

        $qry = "INSERT INTO ORDER (description,price) values ('$name','$user_id','$product_id');";

        $res = mysqli_query($this->conn, $qry);

        if ($res) {
            echo "Order Inserted";
        } else {
            echo "Error in Product";
        }
    }

    public function getData()
    {
        $qry = "SELECT * from ORDER";

        $result = mysqli_query($this->conn, $qry);

        return $result;
    }


    public function delete($id){
            $id= mysqli_escape_string($this->conn,$id);
            $sql= "DELETE FROM ORDER WHERE id=$id";

            $result = mysqli_query($this->conn, $sql);
            if($result){
                echo "PRODUC id deleted";
            }else{
                echo "Error in query";
            }


    }
    public function update($id,$decsr){
        $id= mysqli_escape_string($this->conn,$id);
        $decsr= mysqli_escape_string($this->conn,$decsr);
        $sql1= "UPDATE ORDER SET name='$decsr' WHERE id=$id";
        $result = mysqli_query($this->conn, $sql1);
            if($result){
                echo "PRODUC id is updated";
            }else{
                echo "Error in query";
            }

    }
}

?>