function register(req, res) {
    const reqNewUser = req.body


    const newUser = 0;
    res.status(200).json({sucess: true, data: newUser})
}

function login(req, res) {
    const user = req.body
    const userFound = {};
    res.status(200).json({sucess: true, data: userFound})
}

function check(req, res) {

}

module.exports = {register, login, check}