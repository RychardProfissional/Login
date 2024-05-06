const DB = require("../connection")

const User = {
    create({username, email, password, leveAccess = 0}) {
        return new Promise((resolve, reject) => {
            DB.connect()
            
            const sql = 'INSERT INTO `users` (username, email, password, levelAccess) VALUES (?, ?, ?, ?)'

            DB.conn.query(sql, [username, email, password, leveAccess], (err, result) => {
                if (err) {
                    console.error("Erro ao tentar inserir usuário no banco de dados", err)
                    DB.disconnect()
                    resolve(true)
                }
                else {
                    DB.disconnect()
                    resolve(false)
                }
            })
        })
    },

    exist({email, password}) {
        return new Promise((resolve, reject) => {
            DB.connect()
    
            const sql = "SELECT `id` FROM `users` WHERE `email` = ? AND `password` = ?"
            DB.conn.query(sql, [email, password], (err, row) => {
                if (err) {
                    console.error('DB.exit() error: ', err.sqlMessage)
                    DB.disconnect()
                    resolve(false)
                }
                else {
                    DB.disconnect()
                    resolve(!!row.length)
                }
            })
    
        })        
    },
}

module.exports = User