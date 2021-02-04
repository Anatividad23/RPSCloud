<?php
namespace App\Models;

class CalculatorModel
{
    private $operand1;
    private $operand2;
    private $operation;
    private $result;
    
    /**
     * @return mixed
     */
    public function getOperand1()
    {
        return $this->operand1;
    }

    /**
     * @return mixed
     */
    public function getOperand2()
    {
        return $this->operand2;
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @param mixed $operand1
     */
    public function setOperand1($operand1)
    {
        $this->operand1 = $operand1;
    }

    /**
     * @param mixed $operand2
     */
    public function setOperand2($operand2)
    {
        $this->operand2 = $operand2;
    }

    /**
     * @param mixed $operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;
    }
    
    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }
    
    /**
     * @param mixed $result
     */
    public function getResult()
    {
        return $this->result;
    }
    public function __construct($operand1,$operand2,$operation) {
        $this->operand1=$operand1;
        $this->operand2=$operand2;
        $this->operation=$operation;
        $this->result = 0;
    }
    
}

