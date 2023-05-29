<?php

class Connection
{
    private $db;
    private $user;
    private $host;
    private $password;
    private $conn;

    public function __construct($db, $user, $host, $pass)
    {
        $this->db = $db;
        $this->user = $user;
        $this->password = $pass;
        $this->host = $host;
    }

    public function makeConnection()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db);
        if ($this->conn) {
            echo "Connection Created";
            return $this->conn;
        } else {
            echo "Recheck Connection String";
            return null;
        }
    }
    public function display()
    {
        echo "User is $this->user, DB is $this->db, Host is $this->host, Password is $this->password";
    }
}

?>