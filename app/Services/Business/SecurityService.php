<?php
namespace App\Services\Business;

use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use \PDO;
use App\Services\Data\SecurityDAO;
class SecurityService
{
    /**
     * 
     * @param UserModel $user
     * @return boolean
     */
    public function login(UserModel $user){
        Log::info("Entering SecurityService login()");
        //BEST PRACTICE Externalize your application configuration
        //Get credentials for accessing the database
        
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $servername = "localhost:3308";
        

       
       //return false;
       
        //BEST PRACTICE: Do not create database connections in a DAO
        // $conn = new \PDO("mysql:host=$servername;$dbname",$username,$password);
        //Create a connection
        $conn = new \PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Create a Security Service DAO with this connection
        //and try to find the password in User
        $service = new SecurityDAO($conn);
        $flag = $service->findByUSer($user);
        
        //close connection
        $service = null;
        //return the finder result
        return $flag;
    }
    public function getAllUsers(){
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $servername = "localhost:3308";
        
        //return false;
        
        //BEST PRACTICE: Do not create database connections in a DAO
        // $conn = new \PDO("mysql:host=$servername;$dbname",$username,$password);
        //Create a connection
        $conn = new \PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Create a Security Service DAO with this connection
        //and try to find the password in User
        $service = new SecurityDAO($conn);
        
        $result = $service->findAllUsers();
        
        return $result;
        
    }
    
    public function getUser($id){
        
        $servername = config("database.connections.mysql.host");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        $servername = "localhost:3308";
        
        //return false;
        
        //BEST PRACTICE: Do not create database connections in a DAO
        // $conn = new \PDO("mysql:host=$servername;$dbname",$username,$password);
        //Create a connection
        $conn = new \PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //Create a Security Service DAO with this connection
        //and try to find the password in User
        $service = new SecurityDAO($conn);
        
        $result = $service->findUserById($id);
        
        return $result;
        
    }
}

