<?php 
//http://localhost:8085/claseJuevesVat/momento3/properties/addprop.php
$method = $_SERVER['REQUEST_METHOD'];
        if($method === 'POST'){

            include_once('../db_connection.php');
            $request= file_get_contents('php://input');
            $data = json_decode($request);

            $Proprietary_document = "";
            $Location = "";
            $Type = "";
            $Adress = "";
            $Rooms = "";
            $Price = "";
            $Area = "";

           if(isset($data->Proprietary_document) && isset($data->Location) && isset($data->Type) && isset($data->Adress) && isset($data->Rooms) && isset($data->Price) && isset($data->Area)){

            $Proprietary_document = $data ->Proprietary_document;
            $Location = $data ->Location;
            $Type = $data ->Type;
            $Adress = $data ->Adress;
            $Rooms = $data ->Rooms;
            $Price = $data ->Price;
            $Area = $data ->Area;

                if($Proprietary_document == "" || $Location == "" || $Type == "" || $Adress == "" || $Rooms == "" || $Price == "" || $Area == "" || strlen($Proprietary_document)>10){
                    echo json_encode(array('response' => 'invalid format', 'state'=> false));
                }
                else{

                        $sql = "INSERT INTO properties (Proprietary_document, Location, Type, Adress, Rooms, Price, Area) values ('($Proprietary_document)','($Location)','($Type)','($Adress)','($Rooms)','($Price)','($Area)')";
                        $result = $conn->query($sql);
                        echo json_encode(array('response' => 'properties added successfully'));
                }
           }
           else{
                echo json_encode(array('response' => 'invalid format', 'state'=> false));
           }
           

        }

       
?>