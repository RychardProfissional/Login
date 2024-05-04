require('dotenv').config({ path: '../.env.development' })

mysql = require('mysql')

const DB = {
    conn: null,

    createConnDB() {
        this.conn = mysql.createConnection({
            host: process.env.DB_HOST,
            user: process.env.DB_USER,
            password: process.env.DB_PASSWORD,
            database: process.env.DATABASE,
        }) 
    },

    connect() {
        !this.conn && this.createConnDB()

        this.conn.connect((err) => {
            err && console.error('Erro ao conectar ao banco de dados:', err)
        })
    },

    disconnect() {
        !this.conn && this.conn.end((err) => {
            err && console.error('Erro ao tentar desconectar o banco de dados:', err)
        })

        this.conn = null
    },
}


module.exports = DB