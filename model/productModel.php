<?php

class Product
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($desc, $price)
    {
        $desc = mysqli_escape_string($this->conn, $desc);
        $price = mysqli_escape_string($this->conn, $price);

        $qry = "INSERT INTO PRODUCT (description,price) values ('$desc',$price);";

        $res = mysqli_query($this->conn, $qry);

        if ($res) {
            echo "Product Inserted";
        } else {
            echo "Error in Product";
        }
    }

    public function getData()
    {
        $qry = "SELECT * from PRODUCT";

        $result = mysqli_query($this->conn, $qry);

        return $result;
    }


    public function delete($id){
            $id= mysqli_escape_string($this->conn,$id);
            $sql= "DELETE FROM PRODUCT WHERE id=$id";

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
        $sql1= "UPDATE PRODUCT SET description='$decsr' WHERE id=$id";
        $result = mysqli_query($this->conn, $sql1);
            if($result){
                echo "PRODUC id is updated";
            }else{
                echo "Error in query";
            }

    }
}

?>