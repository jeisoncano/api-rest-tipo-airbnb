<?php 

//http://localhost:8085/claseJuevesVat/momento3/users/deleteuser.php
$method = $_SERVER['REQUEST_METHOD'];
        if($method === 'DELETE'){
            //CONEXION A LA BD Y COMANDO SQL
            include_once('../db_connection.php');            
            $request= file_get_contents('php://input');           
            $data = json_decode($request);    
            $ID = $data ->ID;              
            $sql = "DELETE FROM user WHERE ID={$ID}";        
            $result = $conn->query($sql);
            echo json_encode(array('response' => 'user deleted successfully'));
        }

       
?>