const DB = require("../connection")

const User = {
    create({username, email, password, leveAccess = 0}) {
        DB.connect()
        
        const sql = 'INSERT INTO `users` (username, email, password, levelAccess) VALUES (?, ?, ?, ?)'
        let error = false

        DB.conn.query(sql, [username, email, password, leveAccess], (err, result) => {
            if (err) {
                console.error("Erro ao tentar inserir usuário no banco de dados", err)
                error = true
            }
        })

        DB.disconnect()

        return error
    },

    exist({email, password}) {
        let e = false;
        
        DB.connect()

        const sql = "SELECT `id` FROM `users` WHERE `email` = ? AND `password` = ?"
        DB.conn.query(sql, [email, password], (err, row) => {
            if (err) {
                console.error('', err)
            }
            e = !!row.lenght
        })

        DB.disconnect()

        return e
    },
}

module.exports = User