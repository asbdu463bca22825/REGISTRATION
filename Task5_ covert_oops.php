<?php

class Database
{
    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect(
            "localhost",
            "root",
            "",
            "student_db"
        );
    }
}

$db = new Database();

?>