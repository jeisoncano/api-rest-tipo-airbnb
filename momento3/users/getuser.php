<?php 
//http://localhost:8085/claseJuevesVat/momento3/users/getuser.php
$method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET'){
            include_once('../db_connection.php');
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
            $user= array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $user[]= $row;
                }
                echo json_encode(array('tasks' => $user));
            }
        }

        else{
            echo json_encode(array('response'=> 'BAD REQUEST, TRY AGAIN'));
        }

?>