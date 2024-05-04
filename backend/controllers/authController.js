const User = require("../models/user")

function register(req, res) {
    if (User.create(req.body)) {
        req.session.logged = true
        res.status(201).json({message: "Usuário cadastrado com sucesso"})
        return
    }
    res.status(400).json({error: "Erro ao tentar cadastrar novo usuário"})
}

function login(req, res) {
    if(User.exist(req.body)) {
        req.session.logged = true
        res.status(200).json({message: "Login efetuado com sucesso"})
        return
    }
    
    res.status(401).json({error: "Credenciais inválidas"})
}

function check(req, res) {
    if(req.session.logged) {
        res.status(200).json({message: "O usuário está logado"})
        return
    }

    res.status(401).json({error: "O usuário não esta logado"})
}

function logoff() {
    res.session.logged = false
    res.status(200).json({message: "O usuário foi deslogado"})
}

module.exports = {register, login, check, logoff}