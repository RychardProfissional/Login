require('dotenv').config({ path: '.env.development' })

mysql = require('mysql')

function createConnDB() {
    return mysql.createConnection({
        host: process.env.DB_HOST,
        user: process.env.DB_USER,
        password: process.env.DB_PASSWORD,
        database: process.env.DATABASE,
    }) 
}

module.exports = createConnDB