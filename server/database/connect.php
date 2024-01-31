<?php

class Connect{
    private static $instance;
    private $conn;
    
    private function __construct()
    {
        if (!extension_loaded('pdo_mysql')) {
            die('O módulo PDO para MySQL não está habilitado.');
        }
        $HOSTNAME = 'localhost:3306';
        $USERNAME = 'root';
        $PASSWORD = '';
        $DATABASE = 'login';

        $this->conn = new PDO("mysql:host=$HOSTNAME;dbname=$DATABASE", $USERNAME, $PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConn(){
        if(!self::$instance){
            self::$instance = new self();
        }
        
        return self::$instance->conn;
    }
}