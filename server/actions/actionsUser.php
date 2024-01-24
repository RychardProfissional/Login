<?php

require_once '../database/user.php';
require_once '../database/connect.php';

class ActionUser {
    private static $user;

    public static function check($name, $password){
        self::connect();
        return !!self::$user->read($name, $password);
    }

    private static function connect(){
        if (!self::$user){
            self::$user = new User(Connect::getConn());
        }
    }
}
