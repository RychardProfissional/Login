<?php

class Connect{
    private static $instance;
    private $conn;
    
    private function __construct()
    {
        $HOSTNAME = '';
        $USERNAME = '';
        $PASSWORD = '';
        $DATABASE = '';

        try{
            $this->conn = new PDO("mysql:host=$HOSTNAME;dbname=$DATABASE", $USERNAME, $PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public static function getConn(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance->conn;
    }
}