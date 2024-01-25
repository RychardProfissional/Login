<?php

require_once __DIR__.'/../database/connect.php';
require_once __DIR__.'/../database/user.php';

class ActionUser {
    private static $user;

    public static function check($name, $password){
        self::connect();
        return self::$user->read($name, $password, 'id');
    }

    public static function register($name, $password, $levelAcess = 0){
        self::connect();

        if(!!self::$user->read($name, $password)) {
            throw new Exception("Usuário já existe");
        }

        return self::$user->create($name, $password, $levelAcess);
    }

    private static function connect(){
        if (!self::$user){
            self::$user = new User(Connect::getConn());
        }
    }
}
