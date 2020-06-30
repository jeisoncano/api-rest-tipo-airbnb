     
<?php 
//http://localhost:8085/claseJuevesVat/momento3/getSortedProperties.php
$method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET'){
            include_once('db_connection.php');
            $sql = "SELECT * FROM properties ORDER BY Price";
            $result = $conn->query($sql);
            $properties= array();
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $properties[]= $row;
                }
                echo json_encode(array('tasks' => $properties));
            }
        }

        else{
            echo json_encode(array('response'=> 'BAD REQUEST, TRY AGAIN'));
        }

?>
          
           
        

