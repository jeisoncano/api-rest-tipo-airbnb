<?php 

//http://localhost:8085/claseJuevesVat/momento3/properties/deleteprop.php
$method = $_SERVER['REQUEST_METHOD'];
        if($method === 'DELETE'){
            //CONEXION A LA BD Y COMANDO SQL
            include_once('../db_connection.php');            
            $request= file_get_contents('php://input');           
            $data = json_decode($request);    
            $id = $data ->id;              
            $sql = "DELETE FROM properties WHERE ID={$id}";        
            $result = $conn->query($sql);
            echo json_encode(array('response' => 'properties deleted successfully'));
        }

       
?>