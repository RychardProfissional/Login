const app = require('express')()
const auth = require('./controllers/authController')

app.post("/auth/register", auth.register)
app.post("/auth/login", auth.login)
app.get("/auth/check", auth.check)
app.get("/auth/logoff", auth.logoff)

module.exports = app