<?php
namespace App\Services\Business;
use App\Models\Game;
use App\Services\Data\GameDataService;
use mysqli;
use \PDO;
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
   /*     //get database credentials
        $servername= config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
       //$servername = "localhost:3308";
      */  
        //Create connection
       // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn = mysqli_connect($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname,3308);
        $this->dataService = new GameDataService($this->conn);
        
    }
    function getConnection(){
        
        //get and check connection
        $conn= mysqli_connect($this->dbservername,$this->dbusername,$this->dbpassword,$this->dbname,3308);
        
        if($conn->connect_error){
            die("Connection failed" . $conn->connect->error);
        }
        return $conn;
    }
    public function getGame(){
        $game =  $this->dataService->findGame();
        return $game;
    }
    
    public function playGame(Game $game){
     
        
       $move = $game->getMove();
       $comMove = rand(1,3);
       ///////
       if($comMove == 1){ // win
           $game->setResult("Win");
           $game->setWin($game->getWin()+1);
       } else { // lose
           $game->setResult("Loss");
           $game->setLoss($game->getLoss()+1);
       }
       $this->dataService->updateGame($game);
       return $game;
       
       ////////
     /*  if($move == 1){
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
       }*/
       
    }


}