<?php

require_once __DIR__.'/../exception-handling/userExceptions.php';

class User{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function create($name, $password, $levelAccess){
        try {
            $query = $this->conn->prepare("INSERT INTO user VALUES (null, :name, :password, :levelAccess)");
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':levelAccess', $levelAccess, PDO::PARAM_STR);
            
            $success = $query->execute();

            if (!$success) {
                $errorInfo = $query->errorInfo();
                throw new PDOException($errorInfo[2]);
            }

            return $this->conn->lastInsertId();
        }
        catch(PDOException $e){
            throw new UserExceptions($e->getMessage(), UserExceptions::CREATE);
        }
    }

    public function read($username, $password, $column = '*') {
        try {
            $query = $this->conn->prepare("SELECT :column FROM user WHERE username = :username AND password = :password");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':column', $column, PDO::PARAM_STR);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            throw new UserExceptions($e->getMessage(), UserExceptions::READ);
        }
    }
}