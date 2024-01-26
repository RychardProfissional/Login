<?php

class UserExceptions extends Exception{
    const CONNECT = 1; // Erro de conexão

    const CREATE = 2; // Erro ao tentar criar um usuário
    const READ = 3; // Erro ao tentar ler um usuário
    const UPDATE = 4; // Erro ao tentar atualizar um usuário
    const DELETE = 5; // Erro ao tentar deletar um usuário

    const USER_ALREADY_EXIST = 6; // Erro ao tentar criar usuário que já existe
    const USER_NOT_FOUND = 7;
}