<?php
    //http://localhost:8085/claseJuevesVat/momento3/login.php
    $method = $_SERVER['REQUEST_METHOD'];
     
    if ($method === 'GET'){
        include_once('db_connection.php');
        $request= file_get_contents('php://input');
        $data = json_decode($request);
       $Document=$data->Document;
       $sql = "SELECT * FROM user WHERE Document = '{$Document}'";
       $result = $conn->query($sql);               
       //$user= array();            
       if($result->num_rows > 0){                
           while($row = $result->fetch_assoc()){
               $user[]= $row;
           }
           echo json_encode(array('response' => 'user exist' ,'properties' => $user));
       }
       else{
           echo json_encode(array('response'=> 'BAD REQUEST, TRY AGAIN jj'));
       } 
   }

    else{
        echo json_encode(array('response'=> 'BAD REQUEST, TRY AGAIN aa'));
    }
?>