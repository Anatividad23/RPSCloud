<?php
namespace App\Services\Data;

use App\Models\UserModel;
use Http\Client\Exception;
use PDO;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Log;
use PDOException;
use App\Services\Utility\DatbaseException;
use App\User;

// Bad nameing convention should be named User DAO or something similar
class SecurityDAO
{

    private $conn = NULL;

    // BEST PRACTICE do no create database connections in a DAO
    // so you cann support Atomic Database transactions
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function findAllUsers()
    {
        Log::info("Entering SecurityDAO findAllUsers()");
        try {
            // Select all users
            $sth = $this->conn->prepare('SELECT ID, FIRSTNAME, LASTNAME FROM ica4.users');
            $sth->execute();

            // return Array of UserModel
            if ($sth->rowCount() == 0) {
                Log::info("Exit SecurityDAO findAllUsers() if row returned is 0");
                return array();
            } else {
                Log::info("Exit SecurityDAO findAllUsers() if rows returned is 1+");
                $index = 0;
                $users = array();
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $user = new UserModel($row["ID"], $row["FIRSTNAME"], $row["LASTNAME"]);
                    $users[$index ++] = $user;
                }
                return $users;
            }
        } catch (Exception $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatbaseException("Database Exception: ", $e->getMessage(), 0);
        }
    }

    public function findUserById($id)
    {
        Log::info("Entering SecurityDAO findUserById()");
        try {
            // Select all users
            $sth = $this->conn->prepare('SELECT ID, FIRSTNAME, LASTNAME FROM ica4.users WHERE ID = :id');
            $sth->bindParam(':id', $id);
            $sth->execute();

            // return Array of UserModel
            if ($sth->rowCount() == 0) {
                Log::info("Exit SecurityDAO findfindUserById() if row returned is 0");
                return null;
            } else {
                Log::info("Exit SecurityDAO findfindUserById() if rows returned is 1+");
                
                $row = $sth->fetch(PDO::FETCH_ASSOC);
                $user = new UserModel($row["ID"], $row["FIRSTNAME"], $row["LASTNAME"]);

                return $user;
            }
        } catch (Exception $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatbaseException("Database Exception: ", $e->getMessage(), 0);
        }
    }

    public function findByUSer(UserModel $user)
    {
        Log::info("Entering SecurityDAO findByUser()");
        try {
            // Select username and password and see if this row exists
            $name = $user->getUsername();
            $pw = $user->getPassword();
            $sth = $this->conn->prepare('SELECT ID, FIRSTNAME, LASTNAME FROM ica4.users WHERE FIRSTNAME = :username AND LASTNAME = :password');
            $sth->bindParam(':username', $name);
            $sth->bindParam(':password', $pw);
            $sth->execute();

            // See if user existed and return true if goune else return false if not found
            // BAD PRACTICE this if statement is a business rule should go into Business service
            // should return number(integer) of rows to a business service and in there should decide whether true or false
            if ($sth->rowCount() == 1) {
                Log::info("Exit SecurityDAO findByUser() with true");
                return true;
            } else {
                Log::info("Exit SecurityDAO findByUser() with false");
                return false;
            }
        } catch (Exception $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatbaseException("Database Exception: ", $e->getMessage(), 0);
        }

        // Ask about try catch
    }
}

