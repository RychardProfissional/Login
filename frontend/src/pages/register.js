import { useState } from "react"
import { Link } from "react-router-dom"

export default function Register() {
    const [username, setUsername] = useState('')
    const [email, setEmail] = useState('')
    const [password, setPassword] = useState('')

    const urlServer = new URL(window.location.href)
    urlServer.port = 3002
    urlServer.pathname = '/auth/register'

    const handleSubmit = (e) => {
        e.preventDefault()
        fetch(urlServer.href, {
            method: 'POST', 
            headers: {
              'Content-Type': 'application/json' 
            },
            body: JSON.stringify({username, email, password})
        }).then(res => {
            if (!res.ok) {
                throw new Error('erro ao tentar fazer a solicitação')
            }
            return res.json()
        }).then(res => {
            console.log(res)
        }).catch(reason => {
            console.log(reason)
        })
    }

    return(
        <main>
            <div>
                <form onSubmit={handleSubmit}>
                    <label>
                        <span>Nome: </span>
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            value={username}
                            onChange={e => setUsername(e.target.value)}
                        />
                    </label>
                    <label>
                        <span>Email: </span>
                        <input 
                            type="text" 
                            name="email" 
                            id="email"
                            value={email}
                            onChange={e => setEmail(e.target.value)}
                        />
                    </label>
                    <label>
                        <span>Senha: </span>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            value={password}
                            onChange={e => setPassword(e.target.value)}
                        />
                    </label>
                    <button type="submit">Entrar</button>
                </form>
                <Link to={"/login"}>Logar</Link>
            </div>
        </main>
    )
}