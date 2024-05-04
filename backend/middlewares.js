require('dotenv').config({ path: '../.env.development' })

const session = require('express-session')
const express = require('express')
const cors = require('cors')
const bodyParser = require('body-parser')
const app = express()

const MySQLStore = require('express-mysql-session')(session)

const options = {
	host: 'localhost',
	port: 3306,
	user: 'root',
	password: '',
	database: 'login',
}

app.use(cors())
app.use(bodyParser.json())
app.use(session({
    secret: process.env.SECRET_SESSION,
    resave: false,
    saveUninitialized: false,
    store: new MySQLStore(options)
}))

module.exports = app