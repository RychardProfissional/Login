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

        $this->conn = new PDO("psql:host=$HOSTNAME;dbname=$DATABASE", $USERNAME, $PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConn(){
        if(!self::$instance){
            self::$instance = new self();
        }
        
        return self::$instance->conn;
    }
}