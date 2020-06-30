<?php 

$host = 'localhost';
$username = 'root';
$password ='';
$dbName ='last_real_estate_hope';
$conn = new mysqli($host, $username, $password, $dbName);
     if ($conn->connect_error){
            die($conn->connect_error);
     }

?>