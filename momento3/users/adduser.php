<?php 
//http://localhost:8085/claseJuevesVat/momento3/users/adduser.php
$method = $_SERVER['REQUEST_METHOD'];
        if($method === 'POST'){

            include_once('../db_connection.php');
            $request= file_get_contents('php://input');
            $data = json_decode($request);

            $Document = "";
            $DocumentType = "";
            $Name = "";
            $LastName = "";
            $Email = "";
            $Password = "";


           if(isset($data->Document) && isset($data->DocumentType) && isset($data->Name) && isset($data->LastName) && isset($data->Email) && isset($data->Password)){

                $Document = $data ->Document;
                $DocumentType = $data ->DocumentType;
                $Name = $data ->Name;
                $LastName = $data ->LastName;
                $Email = $data ->Email;
                $Password = $data ->Password;

                    if($Document == "" || $DocumentType == "" || $Name == "" || $LastName == "" || $Email == "" || $Password == "" || strlen($Name)>20 || strlen($Password)<8 || strlen($Password)>16 || strlen($Document)>10){
                        echo json_encode(array('response' => 'invalid format', 'state'=> false));
                    }
                    else{   
                        
                        $caracter= "¡, @, #, $, %, &, ?, ¿, ¡";
                        $validName = "preg_match($Name, $caracter)";
                        $validLastName = "preg_match($LastName, $caracter)";

                            if($validName ="" || $validLastName=""){
                                echo json_encode(array('response' => 'invalid format ss', 'state'=> false));                              
                            }
                            else{

                                    if(filter_var($Email, FILTER_VALIDATE_EMAIL)){
                                        
                                        if(is_numeric($Document) &&  $DocumentType == "cc"){
                                            $sql = "INSERT INTO user (Document, DocumentType, Name, LastName, Email, Password) values ('($Document)','($DocumentType)','($Name)','($LastName)','($Email)','($Password)')";
                                            $result = $conn->query($sql);
                                            echo json_encode(array('response' => 'user added successfully'));
                                        }
                                        else{
                                            if($DocumentType == "pas"){
                                                $sql = "INSERT INTO user (Document, DocumentType, Name, LastName, Email, Password) values ('($Document)','($DocumentType)','($Name)','($LastName)','($Email)','($Password)')";
                                                $result = $conn->query($sql);
                                                echo json_encode(array('response' => 'user added successfully'));
                                            }
                                            else{
                                                echo json_encode(array('response' => 'invalid format jj', 'state'=> false));
                                            }
                                        }
                                        
                                    }
                                    else{
                                        
                                        echo json_encode(array('response' => 'invalid format @', 'state'=> false));

                                    }
                            

                            }
                    }

            }            
            else{
                 echo json_encode(array('response' => 'invalid format', 'state'=> false));              

            }
           

        }

       
?>

