<?php


use mysqli;

require_once 'Autoloader.php';

class SavingsAccountDataService
{
    private $conn;
    
    function __construct(mysqli $conn){
        $this->conn =$conn;
    }
    function getBalance(){
        $sql = "SELECT BALANCE FROM SAVINGS";
        $result = $this->conn->query($sql);
        if($result->num_rows ==0){
            return-1;
        }else{
            $row = $result->fetch_assoc();
            $balance = $row["BALANCE"];
            return $balance;
        }
    }
    function updateBalance($balance){
        $sql = "UPDATE SAVINGS SET BALANCE=$balance";
        if($this->conn->query($sql)==TRUE){
            return 1;
        }else{
            return 0;
        }
    }
}

