require('dotenv').config({ path: '../.env.development' })

const express = require('express')
const middlewares = require('./middlewares')
const router = require('./router')
const PORT = parseInt(process.env.SERVER_PORT, 10) || 300

const app = express()

app.use(middlewares)
app.use(router)

app.listen(PORT, () => {
    console.log(`Servidor backend rodando na porta ${PORT}`)
})
