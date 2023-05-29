<?php

class User
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insert($email, $access)
    {
        $email = mysqli_real_escape_string($this->conn, $email);
        $access = mysqli_real_escape_string($this->conn, $access);

        $qry = "INSERT INTO user (email, access) VALUES ('$email', '$access')";


        $res = mysqli_query($this->conn, $qry);

        if ($res) {
            echo "Data Inserted";
        } else {
            echo "Problem in Inserted";
        }
    }

    public function getData($email)
    {
        $email = mysqli_real_escape_string($this->conn, $email);
        $qry = "SELECT * from USER where email='$email'";

        $res = mysqli_query($this->conn, $qry);

        $data = mysqli_fetch_assoc($res);

        return $data;
    }


}

?>