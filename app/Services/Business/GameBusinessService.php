<?php
namespace App\Services\Business;
use App\Models\Game;
use App\Services\Data\GameDataService;
use mysqli;
//use App\Models\Database;
//require_once 'Autoloader.php';
class GameBusinessService{
    private $dbservername = 'localhost';
    private $dbusername = 'root';
    private $dbpassword = 'root';
    private $dbname = 'cst256';
    private $dataService;
    private $conn;
    
    function __construct(){
        $this->conn = new mysqli($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname,3308);
        $this->dataService = new GameDataService($this->conn);
    }
 /*   function getConnection(){
        
        //get and check connection
        $conn= new mysqli($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname,3308);
        
        if($conn->connect_error){
            die("Connection failed" . $conn->connect->error);
        }
        return $conn;
    }
    */
    public function playGame(Game $game){
     
        
       $move = $game->getMove();
       $comMove = rand(1,3);
       
       if($move == 1){
           if($comMove == 1){
               $game->setResult("Loss");
               $game->setWin($game->getLoss()+1);
               $this->dataService->updateGame($game);
               return $game;
           }else if($comMove == 2){
               $game->setResult("Win");
               $game->setWin($game->getWin()+1);
               $this->dataService->updateGame($game);
               return $game;
           }else{
               $game->setResult("Loss");
               $game->setWin($game->getLoss()+1);
               $this->dataService->updateGame($game);
               return $game;
           }
       }else if($move ==2){
           if($comMove == 1){
               $game->setResult("Loss");
               $game->setWin($game->getLoss()+1);
               $this->dataService->updateGame($game);
               return $game;
           }else if($comMove == 2){
               $game->setResult("Loss");
               $game->setWin($game->getLoss()+1);
               $this->dataService->updateGame($game);
               return $game;
           }else{
               $game->setResult("Win");
               $game->setWin($game->getWin()+1);
               $this->dataService->updateGame($game);
               return $game;
           }
       }else{
           if($comMove == 1){
               $game->setResult("Win");
               $game->setWin($game->getWin()+1);
               $this->dataService->updateGame($game);
               return $game;
           }else if($comMove == 2){
               $game->setResult("Loss");
               $game->setWin($game->getLoss()+1);
               $this->dataService->updateGame($game);
               return $game;
           }else{
               $game->setResult("Loss");
               $game->setWin($game->getLoss()+1);
               $this->dataService->updateGame($game);
               return $game;
           }
       }
    }


}