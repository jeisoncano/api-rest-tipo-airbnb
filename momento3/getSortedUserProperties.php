

<?php     

     //http://localhost:8085/claseJuevesVat/momento3/getSortedUserProperties.php
     $method = $_SERVER['REQUEST_METHOD'];
     
             if ($method === 'GET'){
                 include_once('db_connection.php');
                 $request= file_get_contents('php://input');
                 $data = json_decode($request);
                $Proprietary_document=$data->Proprietary_document;
                $sql = "SELECT * FROM properties WHERE Proprietary_document = '{$Proprietary_document}'";
                $result = $conn->query($sql);               
                //$properties= array();            
                if($result->num_rows > 0){                
                    while($row = $result->fetch_assoc()){
                        $properties[]= $row;
                    }
                    echo json_encode(array('properties' => $properties));
                }
                else{
                    echo json_encode(array('response'=> 'BAD REQUEST, TRY AGAIN jj'));
                } 
            }
         
             else{
                 echo json_encode(array('response'=> 'BAD REQUEST, TRY AGAIN aa'));
             }  

          

?>