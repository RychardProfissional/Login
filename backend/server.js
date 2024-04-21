require('dotenv').config({ path: '.env.development' })

const session = require('express-session')
const express = require('express')
const con = require('./conection')()

con.connect((err) => {
    if (err) throw err
    console.log('Conexão com banco de dados feita com sucesso!!!')
})

const app = express()

app.use(session({
    secret: process.env.SECRET_SESSION,
    resave: false,
    saveUninitialized: true,
}))

app.use(["/auth/login", "/auth/register"], (req, res, next) => {
    const user = req.session.user
    
    if(user) {
        res.send('hello world')
    }  
    else next()
})

app.post("/auth/login", (req, res) => {
    res.send('logando...')
})

app.post("/auth/register", (req, res) => {
    res.send('criando cadastro...')
})

app.listen(parseInt(process.env.APP_PORT, 10), () => {
    console.log('teste')
})
