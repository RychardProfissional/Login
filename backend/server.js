require('dotenv').config({ path: '.env.development' })

const app = require('express')()
const auth = require('./controllers/authController')

// AUTENTICAÇÃO
app.post("/auth/register", auth.register)
app.post("/auth/login", auth.login)
app.post("/auth/check", auth.check)

const PORT = parseInt(process.env.APP_PORT, 10) || 300

app.listen(PORT, () => {
    console.log(`Servidor backend rodando na porta ${PORT}`)
})
