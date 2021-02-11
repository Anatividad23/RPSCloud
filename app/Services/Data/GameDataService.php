<?php
namespace App\Services\Data;

use App\Models\Game;
use Exception;
use mysqli;

class GameDataService
{

    private $conn;

    function __construct(mysqli $conn)
    {
        $this->conn = $conn;
    }

    public function addGame()
    {
        try {
            // INSERT INTO STATEMENT
            $query = "INSERT INTO `cst256`.`game` (`ID`, `NAME`, `WIN`, `LOSS`) VALUES ('1', 'Anthony', '{$win}', '{$loss}')";
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        ;
    }

    public function updateGame(Game $game)
    {
        // UPDAT INTO `cst256`.`game` (`ID`, `NAME`, `WIN`, `LOSS`) VALUES ('1', 'Anthony', '0', '0')
        try {
            // INSERT INTO STATEMENT
            $query = "UPDATE `game` SET `WIN`={$game->getWin()},`LOSS`={$game->getLoss()} WHERE ID=1;";
            $result = mysqli_query($this->conn, $query);

            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        ;
    }

    public function findGame()
    {
        $game = new Game(0,"undecided",0,0);
        
        try {
            // SELECT STATEMENT
            $query = "SELECT  SUM(`WIN`), SUM(`LOSS`) FROM `game` WHERE ID=1";
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_row($result);
                $game->setWin($row[0]);
                $game->setLoss($row[1]);
                return $game;
            } else {
                return $game;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        ;
    }

    public function deleteGame()
    {
        try {
            // DELETe STATEMENT
            $query = "INSERT INTO `cst256`.`game` (`ID`, `NAME`, `WIN`, `LOSS`) VALUES ('1', 'Anthony', '{$win}', '{$loss}')";
            $result = mysqli_query($this->conn, $query);
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        ;
    }
}