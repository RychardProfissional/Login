<?php

require_once './connect.php';

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
            
            return $query->exec();
        }
        catch(PDOException $e){
            die('[ERRO]: não foi possivel registrar o usuário: '.$e->getMessage());
        }
    }

    public function read($username, $password) {
        try {
            $query = $this->conn->prepare("SELECT * FROM 'user' WHERE username = :username, password = :password");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);

            return $query->exec();
        }
        catch(PDOException $e){
            die('[ERRO]: não foi possivel ler o usuário: '.$e->getMessage());
        }
    }
}