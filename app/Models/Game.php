<?php

namespace App\Models;
class Game{
    private $move;
    private $result;
    private $win;
    private $loss;
    
    public function __construct($move,$result,$win,$loss){
        
    }
    /**
     * @return mixed
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @return mixed
     */
    public function getWin()
    {
        return $this->win;
    }

    /**
     * @return mixed
     */
    public function getLoss()
    {
        return $this->loss;
    }

    /**
     * @param mixed $move
     */
    public function setMove($move)
    {
        $this->move = $move;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @param mixed $win
     */
    public function setWin($win)
    {
        $this->win = $win;
    }

    /**
     * @param mixed $loss
     */
    public function setLoss($loss)
    {
        $this->loss = $loss;
    }

    
    
}
