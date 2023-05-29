<?php

class Category
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($name)
    {
        $name = mysqli_escape_string($this->conn, $name);

        $qry = "INSERT INTO CATEGORY (name) values ('$name');";

        $res = mysqli_query($this->conn, $qry);

        if ($res) {
            echo "Category Inserted";
        } else {
            echo "Error in Category";
        }
    }

    public function getData()
    {
        $qry = "SELECT * from CATEGORY";

        $result = mysqli_query($this->conn, $qry);

        return $result;
    }


    public function delete($id){
            $id= mysqli_escape_string($this->conn,$id);
            $sql= "DELETE FROM CATEGORY WHERE id=$id";

            $result = mysqli_query($this->conn, $sql);
            if($result){
                echo "Category id deleted";
            }else{
                echo "Error in query";
            }


    }
    public function update($id,$decsr){
        $id= mysqli_escape_string($this->conn,$id);
        $decsr= mysqli_escape_string($this->conn,$decsr);
        $sql1= "UPDATE CATEGORY SET name='$decsr' WHERE id=$id";
        $result = mysqli_query($this->conn, $sql1);
            if($result){
                echo "Category id is updated";
            }else{
                echo "Error in query";
            }

    }
}

?>