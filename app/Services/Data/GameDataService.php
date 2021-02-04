<?php
namespace App\Services\Data;
use App\Models\Game;
use mysqli;


class GameDataService{
    private $conn;
    
    function __construct(mysqli $conn){
        
        $this->conn =$conn;
    }
    public function addGame(){
        return true;
    }
    public function updateGame(){
        //INSERT INTO `cst256`.`game` (`ID`, `NAME`, `WIN`, `LOSS`) VALUES ('1', 'Anthony', '0', '0')
        return true;
    }
    public function findGame(){
        return true;
    }
    public function deleteGame(){
        return true;
    }
}