<?php 

//http://localhost:8085/claseJuevesVat/momento3/users/updateuser.php
$method = $_SERVER['REQUEST_METHOD'];
        if($method === 'PUT'){
            //CONEXION A LA BD Y COMANDO SQL
            include_once('../db_connection.php');            
            $request= file_get_contents('php://input');           
            $data = json_decode($request);    

            $ID = $data ->ID;       
            $Document = $data ->Document;
            $DocumentType = $data ->DocumentType;
            $Name = $data ->Name;
            $LastName = $data ->LastName;
            $Email = $data ->Email;
            $Password = $data ->Password;
             
            if($ID == "" ||$Document == "" || $DocumentType == "" || $Name == "" || $LastName == "" || $Email == "" || $Password == "" || strlen($Password)<8 || strlen($Password)>16 || strlen($Document)>10){
                echo json_encode(array('response' => 'invalid format', 'state'=> false));
            }
            else{
          
            $sql = "UPDATE user SET Document='{$Document}', DocumentType='{$DocumentType}', Name='{$Name}', LastName='{$LastName}', Email='{$Email}', Password='{$Password}' WHERE ID={$ID}";        
            $result = $conn->query($sql);
            echo json_encode(array('response' => 'user added successfully'));
            }
        }

       
?>