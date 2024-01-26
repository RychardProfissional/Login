<?php

require_once __DIR__.'/../database/connect.php';
require_once __DIR__.'/../database/user.php';
require_once __DIR__.'/../exception-handling/userExceptions.php';

class ActionUser {
    private static $user;

    public static function check($name, $password){
        self::connect();
        $user = self::$user->read($name, $password, 'id'); 
        if (is_array($user)){
            return $user['id'];
        }
        else {
            throw new UserExceptions("Usuário não encontrado", UserExceptions::USER_NOT_FOUND);
        }
    }

    public static function register($name, $password, $levelAcess = 0){
        self::connect();

        if(!!self::$user->read($name, $password)) {
            throw new UserExceptions("Usuário já existe", UserExceptions::USER_ALREADY_EXIST);
        }

        return self::$user->create($name, $password, $levelAcess);
    }

    private static function connect(){
        try{
            if (!self::$user){
                self::$user = new User(Connect::getConn());
            }
        }
        catch(PDOException $e){
            throw new UserExceptions("Não foi possivel conectar-se ao banco de dados", UserExceptions::CONNECT);
        }
    }
}
