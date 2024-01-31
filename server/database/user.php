<?php

require_once __DIR__.'/../exception-handling/userExceptions.php';

class User{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function create($username, $password, $levelAccess){
        try {
            $query = $this->conn->prepare("INSERT INTO users(`username`, `password`, `levelAccess`) VALUES (:username, :password, :levelAccess)");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':levelAccess', $levelAccess, PDO::PARAM_INT);
            
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

    public function read($username = null, $password = null, $column = '*', $id = null) {
        try {
            if(!in_array($column, ['*', 'username', 'password', 'id'])) {
                throw new PDOException('invalid column');
            }
            if($id != null){
                $query = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
                $query->bindParam(':id', $id, PDO::PARAM_INT);
            }
            else{
                $query = $this->conn->prepare("SELECT $column FROM users WHERE username = :username AND password = :password");
                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
            }
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e){
            throw new UserExceptions($e->getMessage(), UserExceptions::READ);
        }
    }
}