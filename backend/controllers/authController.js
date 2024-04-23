function validaEntradaDados({name, email, password}) {
    if (User.checkUnique({email: email})) {
        return {email: 'Email já existe!'}
    }
}

function register(req, res) {
    const reqNewUser = req.body

    var error = validaEntradaDados(reqNewUser)
    if (!error) {
        const newUser = User.create(reqNewUser)

        if (newUser) {
            res.status(200).json({sucess: true, data: newUser})
        }

        error = newUser.error
    }

    res.status(401).json({sucess: false, error: error})
}

function login(req, res) {
    const user = req.body
    const userFound = {};
    res.status(200).json({sucess: true, data: userFound})
}

function check(req, res) {

}

module.exports = {register, login, check}