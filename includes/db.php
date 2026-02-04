<?php

$host = "localhost";
$username = "root";
$dbname = "employee_management";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn-> connect_error) {
    die("connection failed: ". $conn->connect_error);
                                
}

//echo "connected succesfully";
$conn->set_charset("utf8");
?>