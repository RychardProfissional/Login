import { useState } from "react"
import { Link, useNavigate } from "react-router-dom"

export default function Login() {
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')
    const navigate = useNavigate()    

    const urlServer = new URL(window.location.href)
    urlServer.port = 3002
    urlServer.pathname = '/auth/login'

    const handleSubmit = (e) => {
        e.preventDefault()
        fetch(urlServer.href, {
            method: 'POST', 
            headers: {
              'Content-Type': 'application/json' 
            },
            body: JSON.stringify({email, password})
        }).then(res => {
            if (!res.ok) {
                throw new Error('erro ao tentar fazer a solicitação')
            }
            return res.json()   
        }).then(res => {
            console.log(res.message)
            navigate("/dashboard")
        }).catch(error => {
            console.log(error)
        })
    }

    return (
        <main>
            <div>
                <form onSubmit={handleSubmit}>
                    <label htmlFor='email'>
                        <span>Email: </span>
                        <input 
                            id="email" 
                            name="email" 
                            type="text" 
                            value={email}
                            onChange={e => setEmail(e.target.value)}
                            
                        />
                    </label>
                    <label htmlFor='password'>
                        <span>Senha: </span>
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            
                        />
                    </label>

                    <button type="submit">Entrar</button>
                </form>

                <Link to={"/register"}>Cadastrar-se</Link>
            </div>
        </main>
    )
}