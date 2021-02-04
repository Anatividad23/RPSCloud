<?php

require_once 'Autoloader.php';

class BankBusinessService
{
    function getCheckingBalance(){
        //get database connection
        $db = new Database();
        $conn = $db->getConnection();
        
        //get checking balance
        $checking = new CheckingsAccountDataService($conn);
        $balanceChecking = $checking->getBalance();
        
        //close connection
        $conn->close();
        //return balance
        return $balanceChecking;
    }
        
    function getSavingsBalance(){
        //get database connection
        $db = new Database();
        $conn = $db->getConnection();
        
        //get checking balance
        $savings = new SavingsAccountDataService($conn);
        $balanceChecking = $savings->getBalance();
        
        //close connection
        $conn->close();
        //return balance
        return $balanceChecking;
    }
    
    function transaction(){
        //get db connection
        $db = new Database();
        $conn = $db->getConnection();
        
        //Turn off autocommit so we can run ACID transaction and start transaction
        $conn->autocommit(FALSE);
        $conn->begin_transaction();
        
        //Get the checkbalance and remove $100
        $checking = new CheckingsAccountDataService($conn);
        $balanceChecking = $checking->getBalance()-100;
        $okChecking = $checking->updateBalance($balanceChecking);
        
        //Add 100 to savings
        
        $savings = new SavingsAccountDataService($conn);
        $balanceSavings = $savings->getBalance()+100;
        $okSavings = $savings->updateBalance($balanceSavings);
        
        //If update from bothe wer good then commit transaction
        if($okChecking && $okSavings){
            $conn->commit();
        }
        else{
            $conn->rollback();
        }
        $conn->close();
    }
}

