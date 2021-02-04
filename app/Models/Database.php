<?php

use mysqli;

class Database
{
    private $dbservername = 'localhost';
    private $dbusername = 'root';
    private $dbpassword = 'root';
    private $dbname = 'cst256';
    
    function getConnection(){
        
        //get and check connection
        $conn= new mysqli($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname,3308);
        
        if($conn->connect_error){
            die("Connection failed" . $conn->connect->error);
        }
        return $conn;
    }
}

