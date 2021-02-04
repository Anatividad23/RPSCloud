<?php
namespace App\Services\Business;

use App\Models\CalculatorModel;

class CalculatorService
{
    /**
     * This method will look at which operation the calculator model has
     * depending on which it is it will preform the proper function with the calulator models operand values
     * it will return the result.
     * @param CalculatorModel $calculator
     * @return number|mixed
     */
    public function calculate(CalculatorModel $calculator){
        //Check for Addition
        if($calculator->getOperation()=="Add"){
            $op1 = $calculator->getOperand1();
            $op2 = $calculator->getOperand2();
            $result = $op1+$op2;
            $calculator->setResult($result);
            
            return $calculator->getResult();
        //Check for Subtraction
        }elseif ($calculator->getOperation()=="Subtract"){
            $op1 = $calculator->getOperand1();
            $op2 = $calculator->getOperand2();
            $result = $op1-$op2;
            $calculator->setResult($result);
            
            return $calculator->getResult();
        }
        //Check for Multiplication
        elseif ($calculator->getOperation()=="Multiply"){
            $op1 = $calculator->getOperand1();
            $op2 = $calculator->getOperand2();
            $result = $op1*$op2;
            $calculator->setResult($result);
            
            return $calculator->getResult();
        }
        //Division
        else{
            $op1 = $calculator->getOperand1();
            $op2 = $calculator->getOperand2();
            $result = $op1/$op2;
            $calculator->setResult($result);
            
            return $calculator->getResult();
        }
    }
}

