<?php 
//http://localhost:8085/claseJuevesVat/momento3/properties/updateprop.php

$method = $_SERVER['REQUEST_METHOD'];
        if($method === 'PUT'){
            //CONEXION A LA BD Y COMANDO SQL
            include_once('../db_connection.php');            
            $request= file_get_contents('php://input');           
            $data = json_decode($request);    

            $id = $data ->id;       
            $Proprietary_document = $data ->Proprietary_document;
            $Location = $data ->Location;
            $Type = $data ->Type;
            $Adress = $data ->Adress;
            $Rooms = $data ->Rooms;
            $Price = $data ->Price;
            $Area = $data ->Area;
             
            if($Proprietary_document == "" || $Location == "" || $Type == "" || $Adress == "" || $Rooms == "" || $Price == "" || $Area == "" || strlen($Proprietary_document)>16){
                echo json_encode(array('response' => 'invalid format', 'state'=> false));
            }
            else{
          
            $sql = "UPDATE properties SET Proprietary_document='{$Proprietary_document}', Location='{$Location}', Type='{$Type}', Adress='{$Adress}', Rooms='{$Rooms}', Price='{$Price}', Area='{$Area}' WHERE ID={$id}";        
            $result = $conn->query($sql);
            echo json_encode(array('response' => 'task added successfully'));
            }
        }

       
?>